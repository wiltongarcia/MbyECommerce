<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $sex
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $status
 * @property string $updated_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Addresses[] $addresses
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
    }

    /**
     * salt estatico para criptografia da senha
     *
     * @var string
     **/
    protected $staticSalt = '_*X3gHU*+;3+W|*u_!zu';

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sex, email, password', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
            array('name, email, password, salt', 'length', 'max'=>255),
            array('email','email'),
			array('sex', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, sex, email, password, salt, status, updated_at, created_at', 'safe', 'on'=>'search'),
            array('salt','default',
                'value'=>crypt(uniqid()),
                'setOnEmpty'=>true,'on'=>'insert'
            ),
            array('updated_at','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'update'
            ),
            array('created_at, updated_at','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'insert'
            ),
            array('password', 'cryptPassword', 'on' =>'insert'),
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
			'addresses' => array(self::HAS_MANY, 'Addresses', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'sex' => 'Sex',
			'email' => 'Email',
			'password' => 'Password',
			'salt' => 'Salt',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * criptografa a senha usando 2 salts um dinamico salvo no banco e outro estático definido nesse Model
     *
     * @return void
     * @author Wilton Garcia
     **/
    public function cryptPassword()
    {
        $this->password = crypt($this->password, crypt($this->staticSalt, $this->salt));    
    }
}
