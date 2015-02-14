<?php

/**
 * This is the model class for table "admin_service_student".
 *
 * The followings are the available columns in table 'admin_service_student':
 * @property integer $id
 * @property string $tenant
 * @property integer $student_id
 * @property integer $service_id
 */
class ServiceStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdminServiceStudent the static model class
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
		return 'admin_service_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_id', 'required'),
			array('student_id, service_id', 'numerical', 'integerOnly'=>true),
			array('tenant', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tenant, student_id, service_id', 'safe', 'on'=>'search'),
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
			'service_id' => 'Service',
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
		$criteria->compare('service_id',$this->service_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}