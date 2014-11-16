<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property string $updated_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property ProductCategories[] $productCategories
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, status, updated_at, created_at', 'safe', 'on'=>'search'),
            array('updated_at','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'update'
            ),
            array('created_at, updated_at','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'insert'
            )
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'product' => array(self::MANY_MANY, 'Product', 'product_categories(category_id, product_id)'),
			'productCategories' => array(self::HAS_MANY, 'ProductCategories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'status' => 'Status',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Retorna as categorias juntamente com o id da relação entre produtos e categorias (product_categories)
     *
     * @return Array
     * @author Wilton Garcia
     **/
    public function getCategories($id)
    {
        $connection = Yii::app()->db;
        $dependency = new CDbCacheDependency('SELECT MAX(c.updated_at),MAX(p.updated_at) FROM categories AS c, product_categories as p');
        $command = $connection->cache(1000, $dependency)->createCommand("SELECT c.id, c.title, pc.id AS relation_id FROM categories AS c LEFT JOIN product_categories AS pc ON pc.category_id = c.id AND pc.product_id = {$id}");

        return $command->queryAll();
    }

    /**
     * Retorna as categorias com o total de projetos
     *
     * @return Category
     * @author Wilton Garcia
     **/
    public function getCategoriesWithTotal()
    {
        $connection = Yii::app()->db;
        $dependency = new CDbCacheDependency('SELECT MAX(c.updated_at),MAX(p.updated_at) FROM categories AS c, product_categories as p');
        $command = $connection->cache(1000, $dependency)->createCommand("SELECT c.id, c.title, COUNT(pc.id) AS products_total FROM categories AS c LEFT JOIN product_categories AS pc ON pc.category_id = c.id GROUP BY c.id ORDER BY c.title");

        return $command->queryAll();
    }  
}
