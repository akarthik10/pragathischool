<?php

/**
 * This is the model class for table "student_previous_datas".
 *
 * The followings are the available columns in table 'student_previous_datas':
 * @property integer $id
 * @property string $tenant
 * @property integer $student_id
 * @property string $institution
 * @property string $year
 * @property string $course
 * @property string $total_mark
 * @property string $contact_person
 * @property string $contact_number
 */
class StudentPreviousDatas extends CActiveRecord
{
	public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentPreviousDatas the static model class
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
		return 'student_previous_datas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, institution, year, course, total_mark, contact_person, contact_number', 'required'),
			array('student_id, total_mark', 'numerical', 'integerOnly'=>true),
			array('year', 'date', 'format'=>'mm/yyyy'),
			array('tenant', 'length', 'max'=>120),
			array('achievements, disciplinary_history', 'safe'),
			array('institution, year, course, total_mark, contact_person, contact_number', 'length', 'max'=>255),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tenant, student_id, institution, year, course, total_mark, contact_person, contact_number', 'safe', 'on'=>'search'),
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
			'tenant' => 'Tenant',
			'student_id' => 'Student',
			'institution' => 'School / Center',
			'year' => 'Year',
			'course' => 'Grade',
			'total_mark' => 'Total Mark',
			'contact_person' => 'Contact Person',
			'contact_number' => 'Contact Number',
			'achievements'=>'Academic & Cultural Achievements',
			'disciplinary_history'=>'Disciplinary History',
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
		$criteria->compare('tenant',$this->tenant,true);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('course',$this->course,true);
		$criteria->compare('total_mark',$this->total_mark,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_number',$this->contact_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}	
}