<?php

/**
 * This is the model class for table "Cities".
 *
 * The followings are the available columns in table 'Cities':
 * @property integer $id
 * @property integer $country_id
 * @property integer $province_id
 * @property string $name
 * @property string $Latitude
 * @property string $Longitude
 * @property string $TimeZone
 * @property integer $DmaId
 * @property string $Code
 */
class Cities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cities the static model class
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
		return 'cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' province_id,name', 'required'),
			array('country_id, province_id, DmaId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('Latitude', 'length', 'max'=>11),
			array('Longitude', 'length', 'max'=>10),
			array('TimeZone', 'length', 'max'=>6),
			array('Code', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_id, province_id, name, Latitude, Longitude, TimeZone, DmaId, Code', 'safe', 'on'=>'search'),
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
			'country_id' => 'Country',
			'province_id' => 'Province',
			'name' => 'Name',
			'Latitude' => 'Latitude',
			'Longitude' => 'Longitude',
			'TimeZone' => 'Time Zone',
			'DmaId' => 'Dma',
			'Code' => 'Code',
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
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('Latitude',$this->Latitude,true);
		$criteria->compare('Longitude',$this->Longitude,true);
		$criteria->compare('TimeZone',$this->TimeZone,true);
		$criteria->compare('DmaId',$this->DmaId);
		$criteria->compare('Code',$this->Code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getprovincename(){
		$province	= Provinces::model()->findByPk($this->province_id);
		if($province!=NULL)
			return $province->name;
		return NULL;
	}
}