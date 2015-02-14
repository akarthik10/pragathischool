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
 * @property integer $support_center
 * @property integer $sc_students
 * @property integer $sc_tutors
 * @property string $grades
 * @property string $achievements
 * @property integer $status
 * @property integer $is_deleted
 * @property string $date
 */
class CenterSearch extends CActiveRecord
{
	public $center;
	public $center_type_id;
	public $tutor;
	public $tutor_type_id;
	public $grade;
	public $course_type;
	public $course_category;
	public $course_name;
	public $curriculum_provider;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Center the static model class
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
		return 'center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	

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
			'id' => 'Center Name',
			'tenant' => 'Tenant',
			'type_id' => 'School Type',
			'center_name' => 'Center Name',
			'pd_title' => 'Pd Title',
			'name' => 'Name',
			'm_name' => 'M Name',
			'l_name' => 'L Name',
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
			'ph_province' => 'Province / State',
			'ph_city' => 'City / Town',
			'ph_suburb' => 'Suburb',
			'ph_zipcode' => 'Ph Zipcode',
			'ph_address1' => 'Ph Address1',
			'ph_address2' => 'Ph Address2',
			'pp_country' => 'Pp Country',
			'pp_province' => 'Pp Province',
			'pp_city' => 'Pp City',
			'pp_suburb' => 'Pp Suburb',
			'pp_address1' => 'Pp Address1',
			'pp_address2' => 'Pp Address2',
			'pp_zipcode' => 'Pp Zipcode',
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
			'support_center' => 'Support Center',
			'sc_students' => 'Sc Students',
			'sc_tutors' => 'Sc Tutors',
			'grades' => 'Grades',
			'achievements' => 'Achievements',
			'status' => 'Status',
			'is_deleted' => 'Is Deleted',
			'date' => 'Date',
			'center' => 'Support Center',
			'center_type_id' => 'Support Center Type',
			'tutor' => 'Private Tutor',
		  	'tutor_type_id' => 'Private Tutor Type',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function gettypename()
	{
		return $this->type->type;
	}
}