<?php

/**
 * This is the model class for table "center_location".
 *
 * The followings are the available columns in table 'center_location':
 * @property integer $id
 * @property integer $center_id
 * @property string $name
 * @property string $business_format
 * @property string $registration_no
 * @property string $tax_no
 * @property string $vat_no
 * @property integer $is_new
 * @property string $opertaing_from
 * @property string $center_tutors_no
 * @property string $students_no
 * @property string $comp_literate
 * @property string $ms_level
 * @property string $computer_no
 * @property integer $is_connected
 * @property string $isp
 * @property string $internet_type
 * @property string $internet_speed
 * @property integer $is_capped
 * @property integer $is_cam
 * @property integer $is_headset
 * @property integer $is_multifunction
 * @property string $multifunction
 * @property integer $is_projector
 * @property integer $is_board
 */
class SharedTutorLocation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CenterLocation the static model class
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
		return 'center_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('center_id,  opertaing_from,  comp_literate, ms_level, computer_no, isp, internet_type, internet_speed, is_capped, is_cam, is_headset, is_multifunction, is_projector', 'required'),
			array('center_id, is_new, is_connected, is_capped, is_cam, is_headset, is_multifunction, is_projector, is_board', 'numerical', 'integerOnly'=>true),
			array('name, business_format, registration_no, opertaing_from, comp_literate, ms_level, isp, internet_type, internet_speed, multifunction', 'length', 'max'=>255),
			array('tax_no, vat_no', 'length', 'max'=>160),
			array('center_tutors_no, students_no, computer_no', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, center_id, name, business_format, registration_no, tax_no, vat_no, is_new, opertaing_from, center_tutors_no, students_no, comp_literate, ms_level, computer_no, is_connected, isp, internet_type, internet_speed, is_capped, is_cam, is_headset, is_multifunction, multifunction, is_projector, is_board', 'safe', 'on'=>'search'),
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
			'business_format' => 'Business Format',
			'registration_no' => 'Registration No',
			'tax_no' => 'Tax No',
			'vat_no' => 'Vat No',
			'is_new' => 'New',
			'opertaing_from' => 'Opertaing From',
			'center_tutors_no' => 'Center Tutors No',
			'students_no' => 'Students No',
			'comp_literate' => 'Computer Literate',
			'ms_level' => 'Ms Level',
			'computer_no' => 'Computer No',
			'is_connected' => 'Connected',
			'isp' => 'Internet Service Provider',
			'internet_type' => 'Internet Type',
			'internet_speed' => 'Internet Speed',
			'is_capped' => 'Capped',
			'is_cam' => 'Cam',
			'is_headset' => 'Headset',
			'is_multifunction' => 'Do you have printer, scanner and copier?',
			'multifunction' => '',
			'is_projector' => 'Projector',
			'is_board' => 'Board',
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
		$criteria->compare('business_format',$this->business_format,true);
		$criteria->compare('registration_no',$this->registration_no,true);
		$criteria->compare('tax_no',$this->tax_no,true);
		$criteria->compare('vat_no',$this->vat_no,true);
		$criteria->compare('is_new',$this->is_new);
		$criteria->compare('opertaing_from',$this->opertaing_from,true);
		$criteria->compare('center_tutors_no',$this->center_tutors_no,true);
		$criteria->compare('students_no',$this->students_no,true);
		$criteria->compare('comp_literate',$this->comp_literate,true);
		$criteria->compare('ms_level',$this->ms_level,true);
		$criteria->compare('computer_no',$this->computer_no,true);
		$criteria->compare('is_connected',$this->is_connected);
		$criteria->compare('isp',$this->isp,true);
		$criteria->compare('internet_type',$this->internet_type,true);
		$criteria->compare('internet_speed',$this->internet_speed,true);
		$criteria->compare('is_capped',$this->is_capped);
		$criteria->compare('is_cam',$this->is_cam);
		$criteria->compare('is_headset',$this->is_headset);
		$criteria->compare('is_multifunction',$this->is_multifunction);
		$criteria->compare('multifunction',$this->multifunction,true);
		$criteria->compare('is_projector',$this->is_projector);
		$criteria->compare('is_board',$this->is_board);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}