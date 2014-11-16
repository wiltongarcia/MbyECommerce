<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $price
 * @property integer $status
 * @property string $updated_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property OrderItems[] $orderItems
 * @property ProductCategories[] $productCategories
 * @property ProductCharacteristics[] $productCharacteristics
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, price', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			array('created_at', 'safe'),
            array('image', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, image, price, status, updated_at, created_at', 'safe', 'on'=>'search'),
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
			'orderItem' => array(self::HAS_MANY, 'OrderItem', 'product_id'),

            'category' => array(self::MANY_MANY, 'Category', 'product_categories(product_id, category_id)'),
			'characteristic' => array(self::MANY_MANY, 'Characteristic', 'product_characteristics(product_id, characteristic_id)'),

            'productCategories' => array(self::HAS_MANY, 'ProductCategories', 'product_id'),
			'productCharacteristics' => array(self::HAS_MANY, 'ProductCharacteristics', 'product_id'),
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
			'image' => 'Image',
			'price' => 'Price',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeDelete()
    {
        foreach($this->characteristic as $c)
            $c->delete();
        foreach($this->category as $c)
            $c->delete();
        foreach($this->orderItem as $c)
            $c->delete();
        return parent::beforeDelete();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
