<?php

/**
 * This is the model class for table "student_subjects".
 *
 * The followings are the available columns in table 'student_subjects':
 * @property integer $id
 * @property integer $student_id
 * @property integer $batch_id
 * @property integer $subject_id
 */
class StudentSubjects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentSubjects the static model class
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
		return 'student_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, batch_id, subject_id', 'required'),
			array('student_id, batch_id, subject_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, student_id, batch_id, subject_id', 'safe', 'on'=>'search'),
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
			'student_id' => 'Student',
			'batch_id' => 'Grade',
			'subject_id' => 'Subject',
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
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('subject_id',$this->subject_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}