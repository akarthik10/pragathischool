<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CourseForm extends CFormModel
{
	public $grade;
	public $batch;
	public $subject;
	public $category_id;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('grade, batch,subject', 'required'),
			

			
			
		);
	}

	
	public function checkMyUniquness($attribute,$params) {
		$criteria = new CDbCriteria();
		$criteria->condition = "course_name =:name";
		$criteria->params = array(':name' => $this->grade);
		$model = Courses::model()->findAll($criteria);
		if(count($model)>0) {
			$this->addError( $attribute, "$attribute must be unique !" );
		}
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		
	}
}