<?php

/**
 * This is the model class for table "admin_service_center".
 *
 * The followings are the available columns in table 'admin_service_center':
 * @property integer $id
 * @property integer $sevice_id
 * @property integer $center_id
 * @property string $fees
 */
class ServiceCenter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceCenter the static model class
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
		return 'admin_service_center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_id, fees', 'required'),
			array('service_id, center_id', 'numerical', 'integerOnly'=>true),
			array('fees', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_id, center_id, fees', 'safe', 'on'=>'search'),
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
		'service'=>array(self::HAS_ONE, 'Service', 'service_id'),
		'center'=>array(self::HAS_ONE, 'Center', 'center_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_id' => 'Product & Services',
			'center_id' => 'Center',
			'fees' => 'Fees',
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
		$criteria->compare('service_id',$this->sevrice_id);
		$criteria->compare('center_id',$this->center_id);
		$criteria->compare('fees',$this->fees,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}