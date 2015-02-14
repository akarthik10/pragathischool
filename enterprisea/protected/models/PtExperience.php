<?php

/**
 * This is the model class for table "center_experience".
 *
 * The followings are the available columns in table 'center_experience':
 * @property integer $id
 * @property integer $center_id
 * @property string $year
 * @property string $province
 * @property string $university
 * @property string $degree
 * @property string $contact_person
 * @property string $contact_no
 */
class PtExperience extends CActiveRecord
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
			array('year, province, university, degree, contact_person, contact_no', 'required'),
			array('center_id', 'numerical', 'integerOnly'=>true),
			array('year', 'length', 'max'=>40),
			array('province, university, degree, contact_person, contact_no', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, center_id, year, province, university, degree, contact_person, contact_no', 'safe', 'on'=>'search'),
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
			'year' => 'Year',
			'province' => 'Province',
			'university' => 'University',
			'degree' => 'Degree',
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
		$criteria->compare('year',$this->year,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_no',$this->contact_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}