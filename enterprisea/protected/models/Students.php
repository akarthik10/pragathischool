<?php

/**
 * This is the model class for table "students".
 *
 * The followings are the available columns in table 'students':
 * @property integer $id
 * @property string $tenant
 * @property integer $uid
 * @property integer $parent_id
 * @property string $admission_no
 * @property string $class_roll_no
 * @property string $admission_date
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sur_name
 * @property integer $batch_id
 * @property string $date_of_birth
 * @property integer $age
 * @property string $gender
 * @property string $blood_group
 * @property string $medical_history
 * @property string $birth_place
 * @property string $id_passport_number
 * @property integer $nationality_id
 * @property string $language
 * @property string $religion
 * @property integer $student_category_id
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $suburb
 * @property string $state
 * @property string $pin_code
 * @property integer $country_id
 * @property string $phone1
 * @property string $phone2
 * @property integer $postal_country_id
 * @property string $postal_state
 * @property string $postal_city
 * @property string $postal_suburb
 * @property string $postal_postbox
 * @property string $postal_private_bag
 * @property string $postal_zip_code
 * @property string $fathers_cell_number
 * @property string $mothers_cell_number
 * @property string $email
 * @property string $skype_name
 * @property integer $registered_with_doe
 * @property string $doe_date
 * @property string $doe_register_number
 * @property integer $registered_with_cp
 * @property string $registered_cp_name
 * @property string $registered_cp_client_number
 * @property integer $immediate_contact_id
 * @property integer $is_sms_enabled
 * @property string $photo_file_name
 * @property string $photo_content_type
 * @property string $photo_data
 * @property string $status_description
 * @property integer $is_active
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $has_paid_fees
 * @property integer $photo_file_size
 * @property integer $user_id
 */
class Students extends CActiveRecord
{
	public $other_language;
	public $i_agree;
	public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Students the static model class
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
		return 'students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		if(Yii::app()->controller->id=="studentEnrollment" and Yii::app()->controller->action->id=="step6"){
			return array(
				array('how_heard_about_us', 'required'),
				array('i_agree', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditons.'),
				array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			);
		}
		else if(Yii::app()->controller->id=="studentEnrollment" and Yii::app()->controller->action->id=="step7"){
			return array(
				array('has_paid_fees', 'required', 'requiredValue' => 1, 'message' => 'Please pay the fees.'),
				array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			);
		}
		else if(Yii::app()->controller->id=="studentEnrollment" and (Yii::app()->controller->action->id=="step3" or Yii::app()->controller->action->id=="step4")){
			return array(
				array('first_name, sur_name,  age, birth_place, date_of_birth, nationality_id, gender, language, religion, id_passport_number, phone1, fathers_cell_number, email, country_id, state, city, address_line1, postal_country_id, postal_state, postal_city, postal_postbox,  created_at', 'required'),
				array('email', 'email'),
				array('email', 'check'),
				array('doe_date, doe_register_number', 'checkifok', 'item'=>'registered_with_doe'),
				array('registered_cp_name, registered_cp_client_number', 'checkifok', 'item'=>'registered_with_cp'),
				array('other_language', 'other_language'),
				array('uid, parent_id, batch_id, age, nationality_id, student_category_id, country_id, postal_country_id, registered_with_doe, registered_with_cp, immediate_contact_id, is_sms_enabled, is_active, is_deleted, has_paid_fees, photo_file_size, user_id', 'numerical', 'integerOnly'=>true),
				array('tenant', 'length', 'max'=>120),
				array('admission_no, class_roll_no, first_name, middle_name, last_name, sur_name, gender, blood_group, birth_place, id_passport_number, language, religion, address_line1, address_line2, city, suburb, state, pin_code, phone1, phone2, postal_state, postal_city, postal_suburb, postal_postbox, postal_private_bag, postal_zip_code, fathers_cell_number, mothers_cell_number, email, skype_name, doe_register_number, registered_cp_name, registered_cp_client_number, photo_file_name, photo_content_type, status_description', 'length', 'max'=>255),
				array('admission_date, medical_history, suburb, postal_suburb, doe_date, photo_data, pin_code, postal_zip_code, updated_at, registration_completed, tenant, uid, parent_id, how_heard_about_us', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, tenant, uid, parent_id, admission_no, class_roll_no, admission_date, first_name, middle_name, last_name, sur_name, batch_id, date_of_birth, age, gender, blood_group, medical_history, birth_place, id_passport_number, nationality_id, language, religion, student_category_id, address_line1, address_line2, city, suburb, state, pin_code, country_id, phone1, phone2, postal_country_id, postal_state, postal_city, postal_suburb, postal_postbox, postal_private_bag, postal_zip_code, fathers_cell_number, mothers_cell_number, email, skype_name, registered_with_doe, doe_date, doe_register_number, registered_with_cp, registered_cp_name, registered_cp_client_number, immediate_contact_id, is_sms_enabled, photo_file_name, photo_content_type, photo_data, status_description, is_active, is_deleted, created_at, updated_at, has_paid_fees, photo_file_size, user_id', 'safe', 'on'=>'search'),
			);
		}
		else{
			return array(
				array('first_name, sur_name, student_category_id, age, birth_place, date_of_birth, nationality_id, gender, language, religion, id_passport_number, phone1, fathers_cell_number, email, country_id, state, city, address_line1, pin_code, postal_country_id, postal_state, postal_city, postal_postbox, postal_zip_code, created_at', 'required'),
				array('email', 'email'),
				array('email', 'check'),
				array('doe_date, doe_register_number', 'checkifok', 'item'=>'registered_with_doe'),
				array('registered_cp_name, registered_cp_client_number', 'checkifok', 'item'=>'registered_with_cp'),
				array('other_language', 'other_language'),
				array('uid, parent_id, batch_id, age, nationality_id, student_category_id, country_id, postal_country_id, registered_with_doe, registered_with_cp, immediate_contact_id, is_sms_enabled, is_active, is_deleted, has_paid_fees, photo_file_size, user_id', 'numerical', 'integerOnly'=>true),
				array('tenant', 'length', 'max'=>120),
				array('admission_no, class_roll_no, first_name, middle_name, last_name, sur_name, gender, blood_group, birth_place, id_passport_number, language, religion, address_line1, address_line2, city, suburb, state, pin_code, phone1, phone2, postal_state, postal_city, postal_suburb, postal_postbox, postal_private_bag, postal_zip_code, fathers_cell_number, mothers_cell_number, email, skype_name, doe_register_number, registered_cp_name, registered_cp_client_number, photo_file_name, photo_content_type, status_description', 'length', 'max'=>255),
				array('admission_date, medical_history, suburb, postal_suburb, doe_date, photo_data, updated_at, registration_completed, tenant, uid, parent_id, how_heard_about_us', 'safe'),
				array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, tenant, uid, parent_id, admission_no, class_roll_no, admission_date, first_name, middle_name, last_name, sur_name, batch_id, date_of_birth, age, gender, blood_group, medical_history, birth_place, id_passport_number, nationality_id, language, religion, student_category_id, address_line1, address_line2, city, suburb, state, pin_code, country_id, phone1, phone2, postal_country_id, postal_state, postal_city, postal_suburb, postal_postbox, postal_private_bag, postal_zip_code, fathers_cell_number, mothers_cell_number, email, skype_name, registered_with_doe, doe_date, doe_register_number, registered_with_cp, registered_cp_name, registered_cp_client_number, immediate_contact_id, is_sms_enabled, photo_file_name, photo_content_type, photo_data, status_description, is_active, is_deleted, created_at, updated_at, has_paid_fees, photo_file_size, user_id', 'safe', 'on'=>'search'),
			);
		}
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
			'parent_id' => 'Parent',
			'admission_no' => 'Admission No',
			'class_roll_no' => 'Class Roll No',
			'admission_date' => 'Admission Date',
			'first_name' => 'First Name',
			'middle_name' => 'Second Name',
			'last_name' => 'Third Name',
			'sur_name' => 'Surname',
			'batch_id' => 'Batch',
			'date_of_birth' => 'Date Of Birth',
			'age' => 'Age',
			'gender' => 'Gender',
			'blood_group' => 'Blood Group',
			'medical_history' => 'Medical History - Brief description',
			'birth_place' => 'Place of Birth',
			'id_passport_number' => 'ID/Passport Number',
			'nationality_id' => 'Nationality',
			'language' => 'Preferred Language',
			'religion' => 'Religion',
			'student_category_id' => 'Student Category',
			'address_line1' => 'Street address 1',
			'address_line2' => 'Street address 2',
			'city' => 'City / Town',
			'suburb' => 'Suburb',
			'state' => 'Province / State',
			'pin_code' => 'Postal / Zip Code',
			'country_id' => 'Country',
			'phone1' => 'Home number',
			'phone2' => 'Own Cell number',
			'postal_country_id' => 'Country',
			'postal_state' => 'Province / State',
			'postal_city' => 'City / Town',
			'postal_suburb' => 'Suburb',
			'postal_postbox' => 'PO Box',
			'postal_private_bag' => 'Private Bag (if applicable)',
			'postal_zip_code' => 'Postal / Zip Code',
			'fathers_cell_number' => 'Father\'s Cell Number',
			'mothers_cell_number' => 'Mother\'s Cell Number',
			'email' => 'E-mail address',
			'skype_name' => 'Skype Name',
			'registered_with_doe' => 'Registered With Doe',
			'doe_date' => 'Date of Registration',
			'doe_register_number' => 'DOE Register Number',
			'registered_with_cp' => 'Registered With Cp',
			'registered_cp_name' => 'Registered Curriculum Provider',
			'registered_cp_client_number' => 'Curriculum Provider Client Number',
			'immediate_contact_id' => 'Immediate Contact',
			'is_sms_enabled' => 'Is Sms Enabled',
			'photo_file_name' => 'Photo File Name',
			'photo_content_type' => 'Photo Content Type',
			'photo_data' => 'Photo Data',
			'status_description' => 'Status Description',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'has_paid_fees' => 'Has Paid Fees',
			'photo_file_size' => 'Photo File Size',
			'user_id' => 'User',
			'how_heard_about_us'=>'How have you heard of us?',
			'i_agree'=>'I agree your terms and conditions'
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('admission_no',$this->admission_no,true);
		$criteria->compare('class_roll_no',$this->class_roll_no,true);
		$criteria->compare('admission_date',$this->admission_date,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('sur_name',$this->sur_name,true);
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('blood_group',$this->blood_group,true);
		$criteria->compare('medical_history',$this->medical_history,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('id_passport_number',$this->id_passport_number,true);
		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('student_category_id',$this->student_category_id);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('suburb',$this->suburb,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pin_code',$this->pin_code,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('postal_country_id',$this->postal_country_id);
		$criteria->compare('postal_state',$this->postal_state,true);
		$criteria->compare('postal_city',$this->postal_city,true);
		$criteria->compare('postal_suburb',$this->postal_suburb,true);
		$criteria->compare('postal_postbox',$this->postal_postbox,true);
		$criteria->compare('postal_private_bag',$this->postal_private_bag,true);
		$criteria->compare('postal_zip_code',$this->postal_zip_code,true);
		$criteria->compare('fathers_cell_number',$this->fathers_cell_number,true);
		$criteria->compare('mothers_cell_number',$this->mothers_cell_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype_name',$this->skype_name,true);
		$criteria->compare('registered_with_doe',$this->registered_with_doe);
		$criteria->compare('doe_date',$this->doe_date,true);
		$criteria->compare('doe_register_number',$this->doe_register_number,true);
		$criteria->compare('registered_with_cp',$this->registered_with_cp);
		$criteria->compare('registered_cp_name',$this->registered_cp_name,true);
		$criteria->compare('registered_cp_client_number',$this->registered_cp_client_number,true);
		$criteria->compare('immediate_contact_id',$this->immediate_contact_id);
		$criteria->compare('is_sms_enabled',$this->is_sms_enabled);
		$criteria->compare('photo_file_name',$this->photo_file_name,true);
		$criteria->compare('photo_content_type',$this->photo_content_type,true);
		$criteria->compare('photo_data',$this->photo_data,true);
		$criteria->compare('status_description',$this->status_description,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('has_paid_fees',$this->has_paid_fees);
		$criteria->compare('photo_file_size',$this->photo_file_size);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function checkifok($attribute, $params){
		if($this->$params['item']==1 and ($this->$attribute == '' or $this->$attribute == NULL)){
			$this->addError($attribute, $this->getAttributeLabel($attribute).' can\'t be blank');
		}
	}
	
	public function other_language($attribute, $params){
		if($this->language=="-1"){
			if($this->other_language==NULL)			
				$this->addError('language', 'Language can\'t be blank');
		}
	}
	
	public function check($attribute,$params)
    {
		if(Yii::app()->controller->action->id!='update' and $this->$attribute!=''){
			$criteria	= new CDbCriteria;
			$criteria->condition	= '`email`=:email';
			$criteria->params		= array(':email'=>$this->$attribute);
			if($this->uid!=NULL){
				 $criteria->condition		.= ' AND `id`<>:id';
				 $criteria->params[':id']	= $this->uid;
			}
			$validate	= User::model()->find($criteria);
			if($validate!=NULL){			
				$this->addError($attribute,'Email already in use');
			}
		}
    }
}