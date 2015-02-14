<?php

/**
 * This is the model class for table "center_course".
 *
 * The followings are the available columns in table 'center_course':
 * @property integer $id
 * @property integer $center_id
 * @property integer $course_id
 */
class PtCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CenterCourse the static model class
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
		return 'center_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('center_id, course_id', 'required'),
			array('center_id, course_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, center_id, course_id', 'safe', 'on'=>'search'),
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
		 'cat_name'    => array(self::BELONGS_TO, 'CourseCategory','course_id'),
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
			'course_id' => 'Course',
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
		$criteria->compare('course_id',$this->course_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getcategoryname()
	{
		return $this->cat_name->category;
	}
}