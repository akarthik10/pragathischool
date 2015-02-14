<?php

/**
 * This is the model class for table "guardians".
 *
 * The followings are the available columns in table 'guardians':
 * @property integer $id
 * @property string $tenant
 * @property integer $uid
 * @property integer $ward_id
 * @property string $first_name
 * @property string $last_name
 * @property string $sur_name
 * @property string $id_passport_number
 * @property string $relation
 * @property string $email
 * @property string $skype_name
 * @property string $office_phone1
 * @property string $office_phone2
 * @property string $mobile_phone
 * @property string $home_number
 * @property string $office_address_line1
 * @property string $office_address_line2
 * @property string $suburb
 * @property string $city
 * @property string $state
 * @property integer $country_id
 * @property string $pin_code
 * @property integer $postal_country_id
 * @property string $postal_state
 * @property string $postal_city
 * @property string $postal_suburb
 * @property string $postal_street_address_line1
 * @property string $postal_street_address_line2
 * @property string $postal_pin_code
 * @property string $dob
 * @property integer $age
 * @property string $birth_place
 * @property string $gender
 * @property integer $nationality_id
 * @property string $religion
 * @property string $marital_status
 * @property string $emp_name
 * @property string $emp_position
 * @property string $emp_period
 * @property string $emp_gross_income
 * @property string $emp_net_income
 * @property string $sm_fullname
 * @property string $sm_relation
 * @property string $sm_dob
 * @property string $sm_id_passport_number
 * @property string $sm_mobile_number
 * @property string $sm_home_number
 * @property string $sm_work_number
 * @property string $sm_email
 * @property string $sm_skype_name
 * @property string $occupation
 * @property string $income
 * @property string $education
 * @property string $created_at
 * @property string $updated_at
 */
class Guardians extends CActiveRecord
{
	public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Guardians the static model class
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
		return 'guardians';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relation, first_name, sur_name, id_passport_number, dob, mobile_phone, email, pin_code, country_id, state, city, pin_code, office_address_line1, postal_country_id, postal_state, postal_city, postal_street_address_line1, postal_pin_code, age, birth_place, gender, nationality_id, religion, marital_status, emp_name, emp_position, emp_period, emp_gross_income, emp_net_income', 'required'),
			array('uid, ward_id, country_id, postal_country_id, age, nationality_id', 'numerical', 'integerOnly'=>true),
			array('email, sm_email', 'email'),
			array('email', 'check'),
			array('tenant', 'length', 'max'=>120),
			array('first_name, last_name, sur_name, id_passport_number, relation, email, skype_name, office_phone1, office_phone2, mobile_phone, home_number, office_address_line1, office_address_line2, suburb, city, state, pin_code, postal_state, postal_city, postal_suburb, postal_street_address_line1, postal_street_address_line2, postal_pin_code, birth_place, gender, religion, marital_status, emp_name, emp_position, emp_period, emp_gross_income, emp_net_income, sm_fullname, sm_relation, sm_id_passport_number, sm_mobile_number, sm_home_number, sm_work_number, sm_email, sm_skype_name, occupation, income, education', 'length', 'max'=>255),
			array('sm_fullname, sm_relation, sm_dob, sm_id_passport_number, sm_mobile_number, sm_home_number, sm_work_number, sm_email, sm_skype_name', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tenant, uid, ward_id, first_name, last_name, sur_name, id_passport_number, relation, email, skype_name, office_phone1, office_phone2, mobile_phone, home_number, office_address_line1, office_address_line2, suburb, city, state, country_id, pin_code, postal_country_id, postal_state, postal_city, postal_suburb, postal_street_address_line1, postal_street_address_line2, postal_pin_code, dob, age, birth_place, gender, nationality_id, religion, marital_status, emp_name, emp_position, emp_period, emp_gross_income, emp_net_income, sm_fullname, sm_relation, sm_dob, sm_id_passport_number, sm_mobile_number, sm_home_number, sm_work_number, sm_email, sm_skype_name, occupation, income, education, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'ward_id' => 'Ward',
			'first_name' => 'Name',
			'last_name' => 'Middle Name',
			'sur_name' => 'Surname',
			'id_passport_number' => 'ID/Passport Number',
			'relation' => 'Relation',
			'email' => 'E-mail address',
			'skype_name' => 'Skype Name',
			'office_phone1' => 'Work Number',
			'office_phone2' => 'Office Phone2',
			'mobile_phone' => 'Cell number',
			'home_number' => 'Home Number',
			'office_address_line1' => 'Street address 1',
			'office_address_line2' => 'Street address 2',
			'suburb' => 'Suburb',
			'city' => 'City / Town',
			'state' => 'Province / State',
			'country_id' => 'Country',
			'pin_code' => 'Postal / Zip Code',
			'postal_country_id' => 'Country',
			'postal_state' => 'Province / State',
			'postal_city' => 'City / Town',
			'postal_suburb' => 'Suburb',
			'postal_street_address_line1' => 'Street address 1',
			'postal_street_address_line2' => 'Street address 2',
			'postal_pin_code' => 'Postal / Zip Code',
			'dob' => 'Date of Birth',
			'age' => 'Age',
			'birth_place' => 'Birth Place',
			'gender' => 'Gender',
			'nationality_id' => 'Nationality',
			'religion' => 'Religion',
			'marital_status' => 'Marital Status',
			'emp_name' => 'Employer Name',
			'emp_position' => 'Position',
			'emp_period' => 'Period',
			'emp_gross_income' => 'Gross Income',
			'emp_net_income' => 'Net Income',
			'sm_fullname' => 'Fullname',
			'sm_relation' => 'Relation',
			'sm_dob' => 'Date of birth',
			'sm_id_passport_number' => 'ID / Passport Number',
			'sm_mobile_number' => 'Cell number',
			'sm_home_number' => 'Home Number',
			'sm_work_number' => 'Work Number',
			'sm_email' => 'E-mail address',
			'sm_skype_name' => 'Skype Name',
			'occupation' => 'Occupation',
			'income' => 'Income',
			'education' => 'Education',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('ward_id',$this->ward_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('sur_name',$this->sur_name,true);
		$criteria->compare('id_passport_number',$this->id_passport_number,true);
		$criteria->compare('relation',$this->relation,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype_name',$this->skype_name,true);
		$criteria->compare('office_phone1',$this->office_phone1,true);
		$criteria->compare('office_phone2',$this->office_phone2,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('home_number',$this->home_number,true);
		$criteria->compare('office_address_line1',$this->office_address_line1,true);
		$criteria->compare('office_address_line2',$this->office_address_line2,true);
		$criteria->compare('suburb',$this->suburb,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('pin_code',$this->pin_code,true);
		$criteria->compare('postal_country_id',$this->postal_country_id);
		$criteria->compare('postal_state',$this->postal_state,true);
		$criteria->compare('postal_city',$this->postal_city,true);
		$criteria->compare('postal_suburb',$this->postal_suburb,true);
		$criteria->compare('postal_street_address_line1',$this->postal_street_address_line1,true);
		$criteria->compare('postal_street_address_line2',$this->postal_street_address_line2,true);
		$criteria->compare('postal_pin_code',$this->postal_pin_code,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('emp_name',$this->emp_name,true);
		$criteria->compare('emp_position',$this->emp_position,true);
		$criteria->compare('emp_period',$this->emp_period,true);
		$criteria->compare('emp_gross_income',$this->emp_gross_income,true);
		$criteria->compare('emp_net_income',$this->emp_net_income,true);
		$criteria->compare('sm_fullname',$this->sm_fullname,true);
		$criteria->compare('sm_relation',$this->sm_relation,true);
		$criteria->compare('sm_dob',$this->sm_dob,true);
		$criteria->compare('sm_id_passport_number',$this->sm_id_passport_number,true);
		$criteria->compare('sm_mobile_number',$this->sm_mobile_number,true);
		$criteria->compare('sm_home_number',$this->sm_home_number,true);
		$criteria->compare('sm_work_number',$this->sm_work_number,true);
		$criteria->compare('sm_email',$this->sm_email,true);
		$criteria->compare('sm_skype_name',$this->sm_skype_name,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('income',$this->income,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function check($attribute,$params)
    {
		if(Yii::app()->controller->action->id!='update' and $this->$attribute!='')
		{
		$validate = User::model()->findByAttributes(array('email'=>$this->$attribute));
		if($validate!=NULL)
		{
        
            $this->addError($attribute,'Email already in use');
		}
		}
    }
}