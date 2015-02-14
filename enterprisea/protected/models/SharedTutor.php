<?php

/**
 * This is the model class for table "center".
 *
 * The followings are the available columns in table 'center':
 * @property integer $id
 * @property string $tenant
 * @property integer $type_id
 * @property string $center_name
 * @property string $pd_title
 * @property string $name
 * @property string $m_name
 * @property string $l_name
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
 * @property integer $is_bilingual
 * @property string $religion
 * @property string $spouse_name
 * @property string $spouse_dob
 * @property string $spouse_passport_id
 * @property string $spouse_cell_no
 * @property string $spouse_home_no
 * @property string $spouse_work_no
 * @property string $spouse_email
 * @property string $spouse_skype
 * @property string $ph_country
 * @property string $ph_province
 * @property string $ph_city
 * @property string $ph_suburb
 * @property string $ph_zipcode
 * @property string $ph_address1
 * @property string $ph_address2
 * @property string $pp_country
 * @property string $pp_province
 * @property string $pp_city
 * @property string $pp_suburb
 * @property string $pp_address1
 * @property string $pp_address2
 * @property string $pp_zipcode
 * @property string $website
 * @property string $center_no
 * @property string $home_no
 * @property string $office_no
 * @property string $cell_no
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
 * @property integer $is_criminal
 * @property integer $criminal_details
 * @property integer $sc_tutors
 * @property string $grades
 * @property string $achievements
 * @property integer $status
 * @property integer $is_deleted
 * @property string $date
 */
class SharedTutor extends CActiveRecord
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
			array('type_id,name,m_name,l_name,surname,dob,birth_place,gender,age,nationality,email,pp_country,pp_province,pp_city,pp_suburb,pp_address1,pp_zipcode', 'required'),
			array('type_id, age, is_bilingual, timing, registered_sace, is_criminal, status, is_deleted', 'numerical', 'integerOnly'=>true),
			array('tenant, spouse_cell_no, spouse_home_no, spouse_work_no, spouse_email, spouse_skype, pp_zipcode', 'length', 'max'=>120),
			array('center_name, pd_title, name, m_name, l_name, surname, marital_status, birth_place, nationality, ethnicity, passport_id, tax_no, gender, language, religion, spouse_name, spouse_dob, spouse_passport_id, ph_country, ph_province, ph_city, ph_suburb, ph_address1, ph_address2, pp_country, pp_province, pp_city, pp_suburb, pp_address1, pp_address2, website, center_no, po_country, po_province, po_city, po_suburb, po_box, email, skype, occupation, qualification, sace_number', 'length', 'max'=>255),
			array('ph_zipcode, home_no, office_no, cell_no, po_zipcode', 'length', 'max'=>45),
			array('dob, achievements,user_type', 'safe'),
			array('email,spouse_email', 'email'),
			array('email','check'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tenant, type_id, center_name, pd_title, name, m_name, l_name, surname, marital_status, dob, age, birth_place, nationality, ethnicity, passport_id, tax_no, gender, language, is_bilingual, religion, spouse_name, spouse_dob, spouse_passport_id, spouse_cell_no, spouse_home_no, spouse_work_no, spouse_email, spouse_skype, ph_country, ph_province, ph_city, ph_suburb, ph_zipcode, ph_address1, ph_address2, pp_country, pp_province, pp_city, pp_suburb, pp_address1, pp_address2, pp_zipcode, website, center_no, home_no, office_no, cell_no, po_country, po_province, po_city, po_suburb, po_zipcode, po_box, email, skype, occupation, qualification, timing, registered_sace, sace_number, is_criminal, criminal_details, achievements, status, is_deleted, date,medical_history,qualification_year,sace_date,heard_of,user_type,location_long,location_lat', 'safe', 'on'=>'search'),
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
	 
	//check email is unique............
	
	public function check($attribute,$params)
    {
		if((Yii::app()->controller->action->id!='update') and $this->$attribute!='')
		{
			$validate = User::model()->findByAttributes(array('email'=>$this->$attribute));
			if($validate!=NULL)
			{
			
				$this->addError($attribute,'Email already in use');
			}
		}
    }
	
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tenant' => 'Tenant',
			'type_id' => 'Type',
			'center_name' => 'Center Name',
			'pd_title' => 'Pd Title',
			'name' => 'First Name',
			'm_name' => 'Second Name',
			'l_name' => 'Third Name',
			'surname' => 'Surname',
			'marital_status' => 'Marital Status',
			'dob' => 'Dob',
			'age' => 'Age',
			'birth_place' => 'Birth Place',
			'nationality' => 'Nationality',
			'ethnicity' => 'Ethnicity',
			'passport_id' => 'Passport',
			'tax_no' => 'Tax No',
			'gender' => 'Gender',
			'language' => 'Language',
			'is_bilingual' => 'Is Bilingual',
			'religion' => 'Religion',
			'spouse_name' => 'Spouse Name',
			'spouse_dob' => 'Spouse Dob',
			'spouse_passport_id' => 'Spouse Passport',
			'spouse_cell_no' => 'Spouse Cell No',
			'spouse_home_no' => 'Spouse Home No',
			'spouse_work_no' => 'Spouse Work No',
			'spouse_email' => 'Spouse Email',
			'spouse_skype' => 'Spouse Skype',
			'ph_country' => 'Country',
			'ph_province' => 'Province',
			'ph_city' => 'City',
			'ph_suburb' => 'Suburb',
			'ph_zipcode' => 'Zipcode',
			'ph_address1' => 'Address1',
			'ph_address2' => 'Address2',
			'pp_country' => 'Country',
			'pp_province' => 'Province',
			'pp_city' => 'City',
			'pp_suburb' => 'Suburb',
			'pp_address1' => 'Address1',
			'pp_address2' => 'Address2',
			'pp_zipcode' => 'Zipcode',
			'website' => 'Website',
			'center_no' => 'Center No',
			'home_no' => 'Home No',
			'office_no' => 'Office No',
			'cell_no' => 'Cell No',
			'po_country' => 'Po Country',
			'po_province' => 'Po Province',
			'po_city' => 'Po City',
			'po_suburb' => 'Po Suburb',
			'po_zipcode' => 'Po Zipcode',
			'po_box' => 'Po Box',
			'email' => 'Email',
			'skype' => 'Skype',
			'occupation' => 'Occupation',
			'qualification' => 'Qualification',
			'timing' => 'Timing',
			'registered_sace' => 'Registered Sace',
			'sace_number' => 'Sace Number',
			'is_criminal' => 'Do you have a criminal record?',
			'criminal_details' => 'Criminal Details',
			'heard_of' => 'How have you heard of us?',
			'achievements' => 'Achievements',
			'status' => 'Status',
			'is_deleted' => 'Is Deleted',
			'date' => 'Date',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('center_name',$this->center_name,true);
		$criteria->compare('pd_title',$this->pd_title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('l_name',$this->l_name,true);
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
		$criteria->compare('is_bilingual',$this->is_bilingual);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('spouse_name',$this->spouse_name,true);
		$criteria->compare('spouse_dob',$this->spouse_dob,true);
		$criteria->compare('spouse_passport_id',$this->spouse_passport_id,true);
		$criteria->compare('spouse_cell_no',$this->spouse_cell_no,true);
		$criteria->compare('spouse_home_no',$this->spouse_home_no,true);
		$criteria->compare('spouse_work_no',$this->spouse_work_no,true);
		$criteria->compare('spouse_email',$this->spouse_email,true);
		$criteria->compare('spouse_skype',$this->spouse_skype,true);
		$criteria->compare('ph_country',$this->ph_country,true);
		$criteria->compare('ph_province',$this->ph_province,true);
		$criteria->compare('ph_city',$this->ph_city,true);
		$criteria->compare('ph_suburb',$this->ph_suburb,true);
		$criteria->compare('ph_zipcode',$this->ph_zipcode,true);
		$criteria->compare('ph_address1',$this->ph_address1,true);
		$criteria->compare('ph_address2',$this->ph_address2,true);
		$criteria->compare('pp_country',$this->pp_country,true);
		$criteria->compare('pp_province',$this->pp_province,true);
		$criteria->compare('pp_city',$this->pp_city,true);
		$criteria->compare('pp_suburb',$this->pp_suburb,true);
		$criteria->compare('pp_address1',$this->pp_address1,true);
		$criteria->compare('pp_address2',$this->pp_address2,true);
		$criteria->compare('pp_zipcode',$this->pp_zipcode,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('center_no',$this->center_no,true);
		$criteria->compare('home_no',$this->home_no,true);
		$criteria->compare('office_no',$this->office_no,true);
		$criteria->compare('cell_no',$this->cell_no,true);
		$criteria->compare('po_country',$this->po_country,true);
		$criteria->compare('po_province',$this->po_province,true);
		$criteria->compare('po_city',$this->po_city,true);
		$criteria->compare('po_suburb',$this->po_suburb,true);
		$criteria->compare('po_zipcode',$this->po_zipcode,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype',$this->skype,true);
	
		$criteria->compare('qualification',$this->qualification,true);
		
		$criteria->compare('registered_sace',$this->registered_sace);
		$criteria->compare('sace_number',$this->sace_number,true);
		$criteria->compare('is_criminal',$this->is_criminal);
		$criteria->compare('criminal_details',$this->criminal_details);
		
		$criteria->compare('achievements',$this->achievements,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('date',$this->date,true);

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
		$center = SharedTutor::model()->findByAttributes(array('id'=>$id));
		$user=new User;
		$profile=new Profile;
		$user->tenant = $tenant;
		$user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
		$user->email = $center->email;
		$user->activkey=UserModule::encrypting(microtime().$center->name);
		$password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
		$user->password=UserModule::encrypting($password);
		$user->superuser=1;
		$user->status=1;
		
		if($user->save())
		{
		
			//assign role
			$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
			$authorizer->authManager->assign('shared_tutor', $user->id); 
			
			//profile
			$profile->firstname = $center->name.' '.$center->m_name;
			$profile->lastname = $center->surname;
			$profile->user_id=$user->id;
			$profile->save();
			
			
			$subject = "Your are registered to StudyPro Multischool";
			$message = "Please login to your account with your email id as username and password ".$password;
			UserModule::sendMail($user->email,$subject,$message);
			
			return $user->id;
		}
		return 0;
	}
	public function gettypename()
	{
		return $this->type->type;
	}
	public function getfullname()
	{
		return ucfirst($this->name.' '.$this->m_name.' '.$this->l_name);
	}
}