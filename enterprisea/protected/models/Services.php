<?php

/**
 * This is the model class for table "admin_services".
 *
 * The followings are the available columns in table 'admin_services':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $fees
 * @property string $description
 * @property integer $is_editable
 */
class Services extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Services the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, name, fees, description', 'required'),
			array('category_id, is_editable', 'numerical', 'integerOnly'=>true),
			array('fees', 'numerical', 'integerOnly'=>false),
			array('name', 'length', 'max'=>255),
			array('fees', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, name, fees, description, is_editable', 'safe', 'on'=>'search'),
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
				'category'=>array(self::BELONGS_TO, 'ServiceCategory', 'category_id'),
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'name' => 'Name',
			'fees' => 'Fees',
			'description' => 'Description',
			'is_editable' => 'Is Editable',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_editable',$this->is_editable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}