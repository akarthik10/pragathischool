<?php

/**
 * This is the model class for table "center".
 *
 * The followings are the available columns in table 'center':
 * @property integer $id
 * @property integer $provider_id
 * @property integer $course_category_id
 * @property integer $course_id
 * @property string $center_name
 * @property string $pd_title
 * @property string $name
 * @property string $m_name
 * @property string $surname
 * @property string $marital_status
 * @property string $dob
 * @property integer $age
 * @property string $birth_place
 * @property string $nationality
 * @property string $ethnicity
 * @property string $passport_id
 * @property string $tax_no
 * @property string $gender
 * @property string $language
 * @property string $religion
 * @property string $spouse_name
 * @property string $spouse_dob
 * @property string $spouse_passport_id
 * @property string $ph_country
 * @property string $ph_province
 * @property string $ph_city
 * @property string $ph_suburb
 * @property string $ph_zipcode
 * @property string $ph_address1
 * @property string $ph_address2
 * @property string $ph_address3
 * @property string $ph_home_no
 * @property string $ph_office_no
 * @property string $ph_cell_no
 * @property string $po_country
 * @property string $po_province
 * @property string $po_city
 * @property string $po_suburb
 * @property string $po_zipcode
 * @property string $po_box
 * @property string $email
 * @property string $skype
 * @property string $occupation
 * @property string $qualification
 * @property integer $timing
 * @property integer $registered_sace
 * @property string $sace_number
 * @property integer $support_center
 * @property integer $sc_students
 * @property integer $sc_tutors
 * @property string $grades
 * @property string $achievements
 */
class Center extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Center the static model class
	 */
	public $verifyCode;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id,  center_name, pd_title, name, m_name, surname, marital_status, dob, age, birth_place, nationality, ethnicity, passport_id, tax_no, gender, language, religion,  ph_country, ph_province, ph_city, ph_suburb, ph_zipcode, ph_address1, ph_address2, ph_address3, ph_home_no, ph_office_no, ph_cell_no, po_country, po_province, po_city, po_suburb, po_zipcode, po_box, email, skype, occupation, qualification, timing, registered_sace, sace_number, support_center, sc_students, sc_tutors, grades','required'),
			array('type_id, age, timing, registered_sace, support_center, sc_students, sc_tutors', 'numerical', 'integerOnly'=>true),
			array('center_name, pd_title, name, m_name, surname, marital_status, birth_place, nationality, ethnicity, passport_id, tax_no, gender, language, religion, spouse_name, spouse_dob, spouse_passport_id, ph_country, ph_province, ph_city, ph_suburb, ph_address1, ph_address2, ph_address3, po_country, po_province, po_city, po_suburb, po_box, email, skype, occupation, qualification, sace_number', 'length', 'max'=>255),
			array('ph_zipcode, ph_home_no, ph_office_no, ph_cell_no, po_zipcode, grades', 'length', 'max'=>45),
			array('dob, achievements', 'safe'),
			array('email', 'email'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id,  center_name, pd_title, name, m_name, surname, marital_status, dob, age, birth_place, nationality, ethnicity, passport_id, tax_no, gender, language, religion, spouse_name, spouse_dob, spouse_passport_id, ph_country, ph_province, ph_city, ph_suburb, ph_zipcode, ph_address1, ph_address2, ph_address3, ph_home_no, ph_office_no, ph_cell_no, po_country, po_province, po_city, po_suburb, po_zipcode, po_box, email, skype, occupation, qualification, timing, registered_sace, sace_number, support_center, sc_students, sc_tutors, grades, achievements,status,is_deleted,date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		 'type'    => array(self::BELONGS_TO, 'SchoolTypes','type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Type',
			
			
			'center_name' => 'Center Name',
			'pd_title' => 'Title',
			'name' => 'Name',
			'm_name' => 'Middle Name',
			'surname' => 'Surname',
			'marital_status' => 'Marital Status',
			'dob' => 'Date of Birth',
			'age' => 'Age',
			'birth_place' => 'Birth Place',
			'nationality' => 'Nationality',
			'ethnicity' => 'Ethnicity',
			'passport_id' => 'Passport',
			'tax_no' => 'Tax No',
			'gender' => 'Gender',
			'language' => 'Language',
			'religion' => 'Religion',
			'spouse_name' => 'Spouse Name',
			'spouse_dob' => 'Spouse Date of Birth',
			'spouse_passport_id' => 'Spouse Passport',
			'ph_country' => 'Phsical Country',
			'ph_province' => 'Phsical Province',
			'ph_city' => 'Phsical City',
			'ph_suburb' => 'Phsical Suburb',
			'ph_zipcode' => 'Phsical Zipcode',
			'ph_address1' => 'Phsical Address1',
			'ph_address2' => 'Phsical Address2',
			'ph_address3' => 'Phsical Address3',
			'ph_home_no' => 'Phsical Home No',
			'ph_office_no' => 'Phsical Office No',
			'ph_cell_no' => 'Phsical Cell No',
			'po_country' => 'Postal Country',
			'po_province' => 'Postal Province',
			'po_city' => 'Postal City',
			'po_suburb' => 'Postal Suburb',
			'po_zipcode' => 'Postal Zipcode',
			'po_box' => 'Postal Box',
			'email' => 'Email',
			'skype' => 'Skype',
			'occupation' => 'Occupation',
			'qualification' => 'Qualification',
			'timing' => 'Timing',
			'registered_sace' => 'Registered SACE',
			'sace_number' => 'SACE Number',
			'support_center' => 'Support Center',
			'sc_students' => 'No of Students',
			'sc_tutors' => 'No of Tutors',
			'grades' => 'Grades',
			'achievements' => 'Achievements',
			'verifyCode'=>'Verification Code',
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
		
		
		
		$criteria->compare('center_name',$this->center_name,true);
		$criteria->compare('pd_title',$this->pd_title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('ethnicity',$this->ethnicity,true);
		$criteria->compare('passport_id',$this->passport_id,true);
		$criteria->compare('tax_no',$this->tax_no,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('spouse_name',$this->spouse_name,true);
		$criteria->compare('spouse_dob',$this->spouse_dob,true);
		$criteria->compare('spouse_passport_id',$this->spouse_passport_id,true);
		$criteria->compare('ph_country',$this->ph_country,true);
		$criteria->compare('ph_province',$this->ph_province,true);
		$criteria->compare('ph_city',$this->ph_city,true);
		$criteria->compare('ph_suburb',$this->ph_suburb,true);
		$criteria->compare('ph_zipcode',$this->ph_zipcode,true);
		$criteria->compare('ph_address1',$this->ph_address1,true);
		$criteria->compare('ph_address2',$this->ph_address2,true);
		$criteria->compare('ph_address3',$this->ph_address3,true);
		$criteria->compare('ph_home_no',$this->ph_home_no,true);
		$criteria->compare('ph_office_no',$this->ph_office_no,true);
		$criteria->compare('ph_cell_no',$this->ph_cell_no,true);
		$criteria->compare('po_country',$this->po_country,true);
		$criteria->compare('po_province',$this->po_province,true);
		$criteria->compare('po_city',$this->po_city,true);
		$criteria->compare('po_suburb',$this->po_suburb,true);
		$criteria->compare('po_zipcode',$this->po_zipcode,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('qualification',$this->qualification,true);
		$criteria->compare('timing',$this->timing);
		$criteria->compare('registered_sace',$this->registered_sace);
		$criteria->compare('sace_number',$this->sace_number,true);
		$criteria->compare('support_center',$this->support_center);
		$criteria->compare('sc_students',$this->sc_students);
		$criteria->compare('sc_tutors',$this->sc_tutors);
		$criteria->compare('grades',$this->grades,true);
		$criteria->compare('achievements',$this->achievements,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	//Populate default data................
	
	public function add_settings($tenant)
	{
		$default = Configurations::model()->findAllByAttributes(array('tenant'=>NULL));
		foreach($default as $var)
		{
			$new = new Configurations;
			$new->attributes = $var->attributes;
			$new->id = $var->id;
			$new->tenant = $tenant;
			$new->save();
		}
		
	}
	
	public function add_weekdays($tenant)
	{
		
		$default = Weekdays::model()->findAllByAttributes(array('tenant'=>NULL,'batch_id'=>NULL));
		foreach($default as $var)
		{
			$new = new Weekdays;
			$new->attributes = $var->attributes;
			$new->id = $var->id;
			$new->tenant = $tenant;
			$new->save();
		}
		
	}
	public function add_grading_levels($tenant)
	{
		$default = GradingLevels::model()->findAllByAttributes(array('tenant'=>NULL,'batch_id'=>NULL));
		foreach($default as $var)
		{
			$new = new GradingLevels;
			$new->attributes = $var->attributes;
			$new->id = $var->id;
			$new->tenant = $tenant;
			$new->save();
		}
		
	}
	public function add_admin($tenant,$id)
	{
		//adding admin user
		$center = Center::model()->findByAttributes(array('id'=>$id));
		$user=new User;
		$profile=new Profile;
		$user->tenant = $tenant;
		$user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
		$user->email = $center->email;
		$user->activkey=UserModule::encrypting(microtime().$center->name);
		$password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
		$user->password=UserModule::encrypting($password);
		$user->superuser=0;
		$user->status=1;
		
		if($user->save())
		{
		
			//assign role
			$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
			$authorizer->authManager->assign('admin', $user->id); 
			
			//profile
			$profile->firstname = $center->name.' '.$center->m_name;
			$profile->lastname = $center->surname;
			$profile->user_id=$user->id;
			$profile->save();
		}
	}
	public function gettypename()
	{
		return $this->type->type;
	}
}