<?php

/**
 * This is the model class for table "center_experience".
 *
 * The followings are the available columns in table 'center_experience':
 * @property integer $id
 * @property integer $center_id
 * @property string $name
 * @property string $location
 * @property string $period
 * @property string $position
 * @property string $gross_income
 * @property string $net_income
 * @property string $contact_person
 * @property string $contact_no
 */
class CenterExperience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CenterExperience the static model class
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
		return 'center_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array(' name, location, period, position, gross_income, net_income, contact_person, contact_no', 'required'),
			array('center_id', 'numerical', 'integerOnly'=>true),
			array('name, location, period, position, gross_income, net_income, contact_person, contact_no', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, center_id, name, location, period, position, gross_income, net_income, contact_person, contact_no', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'center_id' => 'Center',
			'name' => 'Name',
			'location' => 'Location',
			'period' => 'Period',
			'position' => 'Position',
			'gross_income' => 'Gross Income',
			'net_income' => 'Net Income',
			'contact_person' => 'Contact Person',
			'contact_no' => 'Contact No',
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
		$criteria->compare('center_id',$this->center_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('period',$this->period,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('gross_income',$this->gross_income,true);
		$criteria->compare('net_income',$this->net_income,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_no',$this->contact_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}