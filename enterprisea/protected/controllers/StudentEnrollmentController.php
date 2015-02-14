<?php

class StudentEnrollmentController extends Controller
{
	public $layout	='public';
	
	public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }
	
	public function actionIndex()
	{
		$model	= new CenterSearch;
		$model->user_type	= 1;
		$this->render('index', array('model'=>$model));
	}
	
	public function actionSearch()
	{		
		$criteria		= new CDbCriteria;
		$criteria->join	= "";
		if(isset($_POST['CenterSearch']['user_type'])){
			$criteria->compare('t.user_type',$_POST['CenterSearch']['user_type']);
			/*if($_POST['CenterSearch']['user_type']==0){
				if(isset($_POST['CenterSearch']['center'])){
					$criteria->compare('id',$_POST['CenterSearch']['center']);
				}
				if(isset($_POST['CenterSearch']['center_type_id']) and $_POST['CenterSearch']['center_type_id']!=NULL){
					$criteria->compare('type_id',$_POST['CenterSearch']['center_type_id']);
				}
			}*/
			if($_POST['CenterSearch']['user_type']==1){
				if(isset($_POST['CenterSearch']['center'])){
					$criteria->compare('t.id',$_POST['CenterSearch']['center']);
				}
			}
			if($_POST['CenterSearch']['user_type']==2){
				if(isset($_POST['CenterSearch']['tutor'])){
					$criteria->compare('t.id',$_POST['CenterSearch']['tutor']);
				}
			}
		}
		if(isset($_POST['CenterSearch']['course_type']) and $_POST['CenterSearch']['course_type']!=NULL){
			$criteria->compare('t.type_id',$_POST['CenterSearch']['course_type']);
		}
		if(isset($_POST['CenterSearch']['course_category']) and $_POST['CenterSearch']['course_category']!=NULL){
			$criteria->join	.= ' JOIN `center_course` `cc` ON `cc`.`center_id`=`t`.`id`';
			$criteria->compare('cc.course_id',$_POST['CenterSearch']['course_category']);
		}
		if(isset($_POST['CenterSearch']['course_name']) and $_POST['CenterSearch']['course_name']!=NULL){
			$criteria->join	.= ' JOIN `courses` `cr` ON `cr`.`tenant`=`t`.`tenant`';
			$criteria->compare('cr.admin_id',$_POST['CenterSearch']['course_name']);
		}
		if(isset($_POST['CenterSearch']['curriculum_provider']) and $_POST['CenterSearch']['curriculum_provider']!=NULL){
			$criteria->join	.= ' JOIN `batches` `bt` ON `bt`.`tenant`=`t`.`tenant`';
			$criteria->compare('bt.admin_id',$_POST['CenterSearch']['curriculum_provider']);
		}
		if(isset($_POST['CenterSearch']['language'])){
			$criteria->compare('t.language',$_POST['CenterSearch']['language']);
		}
		if(isset($_POST['CenterSearch']['ph_country'])){
			$criteria->compare('t.ph_country',$_POST['CenterSearch']['ph_country']);
		}
		if(isset($_POST['CenterSearch']['ph_province'])){
			$criteria->compare('t.ph_province',$_POST['CenterSearch']['ph_province']);
		}
		if(isset($_POST['CenterSearch']['ph_city'])){
			$criteria->compare('t.ph_city',$_POST['CenterSearch']['ph_city']);
		}
		if(isset($_POST['CenterSearch']['ph_suburb'])){
			$criteria->compare('t.ph_suburb',$_POST['CenterSearch']['ph_suburb']);
		}
		
		//echo $criteria->select.' '.$criteria->join.' '.$criteria->condition;
		$datas		= Center::model()->findAll($criteria);
		$this->renderPartial('_result', array('datas'=>$datas));
	}

	public function actionStep1()
	{
		$center_id = NULL;
		$model_service = new ServiceStudent;
		$id			= isset($_GET['center'])?$_GET['center']:NULL;
		$center		= Center::model()->findByPk($id);
		$model		= NULL;
		if($center!=NULL){
			$model		= new Students;
			$model->tenant				= $center->tenant;
			$model->registered_with_doe	= 0;
			$model->registered_with_cp	= 0;
			$model->created_at			= date('Y-m-d H:i:s');
			$model->registration_completed		= 0;
			$center_id = $id;
		}
		else{
			
			$token		= isset($_GET['token'])?$_GET['token']:NULL;
			//checking session
			$this->checkAccess($token);
			
			$student_id	= $this->decryptToken($token);
			$model		= Students::model()->findByPk($student_id);
			$model_service = ServiceStudent::model()->findByAttributes(array('student_id'=>$student_id));
			$center = Center::model()->findByAttributes(array('tenant'=>$model->tenant));
			$center_id = $center->id;
		}
		
		if($model!=NULL){
			if(isset($_POST['Students']))
			{
				$model->attributes=$_POST['Students'];
				$model_service->attributes=$_POST['ServiceStudent'];
				
				$validate = $model->validate();
				$validate = $model_service->validate() && $validate;
				if($validate)
				{
					
					if($model->doe_date!=NULL){
						$date = DateTime::createFromFormat('d/m/Y', $model->doe_date);
						if($date!=NULL){
							$model->doe_date		= $date->format('Y-m-d');
						}
					}
					if($model->date_of_birth!=NULL){
						$date = DateTime::createFromFormat('d/m/Y', $model->date_of_birth);
						if($date!=NULL){
							$model->date_of_birth	= $date->format('Y-m-d');
						}
					}
					
					if($model->save()){
						
						$model_service->tenant =  $model->tenant;
						$model_service->student_id = $model->id;
						$model_service->save();
						
						Yii::app()->user->setState("enrollment_id", $this->encryptToken($model->id));
						
						//send token to email ( to continue registration if failed in any step )
						$enc_token	= $this->encryptToken($model->email);
						UserModule::sendMail($model->email, UserModule::t("Access Token from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Your primary details are saved. Your access token to continue registration {token}",array('{token}'=>$enc_token)));
						
						$this->redirect(array('step2', 'token'=>$this->encryptToken($model->id)));
					}
				}
			}
			if($model->doe_date!=NULL){
				//echo $model->doe_date;exit;
				$date = DateTime::createFromFormat('Y-m-d H:i:s', $model->doe_date);
				if($date!=NULL){
					$model->doe_date		= $date->format('d/m/Y');
				}
				else{
					$date = DateTime::createFromFormat('d/m/Y', $model->doe_date);
					if($date!=NULL){
						$model->doe_date		= $date->format('d/m/Y');
					}
				}
			}
			if($model->date_of_birth!=NULL){
				$date = DateTime::createFromFormat('Y-m-d', $model->date_of_birth);
				if($date!=NULL){
					$model->date_of_birth		= $date->format('d/m/Y');
				}
				else{
					$date = DateTime::createFromFormat('d/m/Y', $model->date_of_birth);
					if($date!=NULL){
						$model->date_of_birth		= $date->format('d/m/Y');
					}
				}
			}
			$this->render('step1',array('model'=>$model,'model_service'=>$model_service,'center_id'=>$center_id));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionStep2($token)
	{
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		if($stdata!=NULL){
			if(isset($_GET['id'])){
				$model=StudentPreviousDatas::model()->findByPk($_GET['id']);
				
				//for remove previour data
				if(isset($_GET['action']) and $_GET['action']=="remove"){
					if($model!=NULL){
						$model->delete();
					}
					$this->redirect(array('step2', 'token'=>$this->encryptToken($stdata->id)));
				}
			}
			else{
				$model=new StudentPreviousDatas;
				$model->student_id	= $student_id;
				$model->tenant		= $stdata->tenant;
			}
			if(isset($_POST['StudentPreviousDatas']))
			{
				$model->attributes=$_POST['StudentPreviousDatas'];
				if($model->validate())
				{
					if($model->save()){
						$this->redirect(array('step2', 'token'=>$this->encryptToken($stdata->id)));
					}
				}
			}		
			$criteria	= new CDbCriteria;
			$criteria->condition	= '`student_id`=:student_id AND `tenant`=:tenant';		
			$criteria->params		= array(':student_id'=>$student_id, ':tenant'=>$stdata->tenant);
			$datas	= StudentPreviousDatas::model()->findAll($criteria);
			$this->render('step2',array('model'=>$model, 'datas'=>$datas));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionStep3()
	{
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		$model		= new StudentSubjects;
		if($stdata!=NULL){			
			if(isset($_GET['id'])){
				$model=StudentSubjects::model()->findByPk($_GET['id']);				
				//for remove previour data
				if(isset($_GET['action']) and $_GET['action']=="remove"){
					if($model!=NULL){
						$model->delete();
					}
					$this->redirect(array('step3', 'token'=>$this->encryptToken($stdata->id)));
				}
			}
			
			if(isset($_POST['StudentSubjects'])){
				$response	= array();
				$subjects	= array_filter($_POST['StudentSubjects']['subject_id']);
				$batch_id	= isset($_POST['StudentSubjects']['batch_id'])?$_POST['StudentSubjects']['batch_id']:NULL;
				if(count($subjects)==0){
					$response['status']		= 'error';
					$response['message']	= 'Please select subjects';
				}
				else{				
					if($batch_id!=NULL){						
						//saving bacthes
						$batch_already_in_db	= EnrollmentBatchStudents::model()->findByAttributes(array(
													'tenant'=>$stdata->tenant,
													'batch_id'=>$_POST['StudentSubjects']['batch_id'],
													'student_id'=>$_POST['StudentSubjects']['student_id'],												
												));
												
						if(!$batch_already_in_db){
							$model		= new EnrollmentBatchStudents;
							$model->tenant		= $stdata->tenant;
							$model->batch_id	= $_POST['StudentSubjects']['batch_id'];
							$model->student_id	= $_POST['StudentSubjects']['student_id'];
							$model->save();
						}
						
						$stdata->batch_id	= $_POST['StudentSubjects']['batch_id'];
						$stdata->save();
											
						//saving subjects
						foreach($subjects as $subject){					
							if($subject!=0 and $subject!=NULL){
								$already_in_db	= StudentSubjects::model()->findByAttributes(array(
													'tenant'=>$stdata->tenant,
													'batch_id'=>$_POST['StudentSubjects']['batch_id'],
													'student_id'=>$_POST['StudentSubjects']['student_id'],
													'subject_id'=>$subject
												));
											
								if(!$already_in_db){
									$model		= new StudentSubjects;
									$model->tenant		= $stdata->tenant;
									$model->batch_id	= $_POST['StudentSubjects']['batch_id'];
									$model->student_id	= $_POST['StudentSubjects']['student_id'];
									$model->subject_id	= $subject;
									if(!$model->save()){										
									}
								}
							}
						}
						$response['status']		= 'success';
						$response['redirect']	= Yii::app()->createUrl('studentEnrollment/step4', array('token'=>$this->encryptToken($stdata->id)));
					}
				}
				echo json_encode($response);exit;
			}
			$criteria	= new CDbCriteria;
			$criteria->condition	= '`student_id`=:student_id AND `tenant`=:tenant';		
			$criteria->params		= array(':student_id'=>$student_id, ':tenant'=>$stdata->tenant);
			$datas					= StudentSubjects::model()->findAll($criteria);
			$this->render('step3', array('student'=>$stdata, 'model'=>$model, 'datas'=>$datas));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}	
	
	public function actionStep4(){
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		if($stdata!=NULL){
			if($stdata->parent_id==0){
				$model=new Guardians;	
				$model->tenant		= $stdata->tenant;
				$model->created_at	= date('d/m/Y');
			}
			else{
				$model=Guardians::model()->findByPk($stdata->parent_id);
				if($model->sm_dob!=NULL){
					$date = DateTime::createFromFormat('Y-m-d H:i:s', $model->sm_dob);
					$model->sm_dob		= $date->format('d/m/Y');
				}
				if($model->dob!=NULL){
					$date = DateTime::createFromFormat('Y-m-d', $model->dob);
					$model->dob		= $date->format('d/m/Y');
				}
			}
			if(isset($_POST['Guardians']))
			{
				$model->attributes=$_POST['Guardians'];
				if($model->validate())
				{
					$date = DateTime::createFromFormat('Y-m-d H:i:s', $model->sm_dob);
					if($date!=NULL){
						$model->sm_dob		= $date->format('Y-m-d');
					}
					else{
						$date = DateTime::createFromFormat('d/m/Y', $model->sm_dob);
						if($date!=NULL){
							$model->sm_dob		= $date->format('Y-m-d');
						}
					}
					$date = DateTime::createFromFormat('Y-m-d', $model->dob);
					if($date!=NULL){
						$model->dob		= $date->format('Y-m-d');
					}
					else{
						$date = DateTime::createFromFormat('d/m/Y', $model->dob);
						if($date!=NULL){
							$model->dob		= $date->format('Y-m-d');
						}
					}
					
					if($model->save()){
						$stdata->parent_id	= $model->id;
						if($stdata->save()){
							$this->redirect(array('step5', 'token'=>$this->encryptToken($stdata->id)));
						}
					}
				}
			}
			$this->render('step4', array('model'=>$model));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionStep5(){
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		if($stdata!=NULL){
			if(isset($_GET['id'])){
				$model=StudentDocument::model()->findByPk($_GET['id']);				
				//for remove previour data
				if(isset($_GET['action']) and $_GET['action']=="remove"){
					if($model!=NULL){
						$file_to_remove	= '../uploadedfiles/'.$student_id.'/'.$model->file;
						if(file_exists($file_to_remove)){
							if(unlink($file_to_remove)){								
								$model->delete();
							}
						}
					}
					$this->redirect(array('step5', 'token'=>$this->encryptToken($stdata->id)));
				}
			}
			
			$model		= new StudentDocument;
			$model->student_id	= $student_id;
			$model->tenant		= $stdata->tenant;
			$model->is_approved	= $stdata->tenant;
			$model->uploaded_by	= $student_id;		
			if(isset($_POST['StudentDocument']))
			{
				$model->attributes	= $_POST['StudentDocument'];
				$model->file		= CUploadedFile::getInstance($model,'file');
				if($model->file!=NULL){
					$model->file_type	= $model->file->type;
				}
				if($model->validate())
				{
					$upload_dir	= '../uploadedfiles/';
					if(!is_dir($upload_dir)){
						mkdir($upload_dir);
					}
					$upload_dir	.= $student_id.'/';
					if(!is_dir($upload_dir)){
						mkdir($upload_dir);
					}
					$upload_dir	.= $model->file->name;
					if($model->file->saveAs($upload_dir)){
						if($model->save()){
							$this->redirect(array('step5', 'token'=>$this->encryptToken($stdata->id)));
						}
					}
				}
			}
			
			$criteria	= new CDbCriteria;
			$criteria->condition	= '`student_id`=:student_id AND `tenant`=:tenant';		
			$criteria->params		= array(':student_id'=>$student_id, ':tenant'=>$stdata->tenant);
			$datas	= StudentDocument::model()->findAll($criteria);
			$this->render('step5', array('model'=>$model, 'datas'=>$datas));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionStep6(){
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		if($stdata!=NULL){
			if($stdata->how_heard_about_us!=NULL) $stdata->i_agree	= 1;
			if(isset($_POST['Students']))
			{
				$stdata->attributes	= $_POST['Students'];
				if($stdata->validate()){
					if($stdata->save()){
						$this->redirect(array('step7', 'token'=>$this->encryptToken($stdata->id)));
					}
				}
			}
			$this->render('step6', array('model'=>$stdata));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionStep7(){
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);
		if($stdata->has_paid_fees==1)
			$this->redirect(array('finish', 'token'=>$this->encryptToken($stdata->id)));
		if($stdata!=NULL){
			if(isset($_POST['Students']))
			{
				$stdata->attributes	= $_POST['Students'];
				if($stdata->validate())
				{
					$stdata->registration_completed		= 1;
					if($stdata->save()){
						//create user accounts for student and guardian
						//Student user creation
						
						//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
						
						//ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'3',$model->id,ucfirst($model->first_name).' '.ucfirst($model->middle_name).' '.ucfirst($model->last_name),NULL,NULL,NULL); 
						
						//adding user for current student
						$user				= new User;
						$user->tenant		= $stdata->tenant;
						$profile			= new Profile;
						$user->username 	= substr(md5(uniqid(mt_rand(), true)), 0, 10);
						$user->email 		= $stdata->email;
						$user->activkey		= UserModule::encrypting(microtime().$stdata->first_name);
						$password 			= substr(md5(uniqid(mt_rand(), true)), 0, 10);
						$user->password		= UserModule::encrypting($password);
						$user->superuser	= 0;
						$user->status		= 1;
						
						if($user->save()){							
							//assign role
							$authorizer 		= Yii::app()->getModule("rights")->getAuthorizer();
							$authorizer->authManager->assign('student', $user->id); 							
							//profile
							$profile->firstname = $stdata->first_name;
							$profile->lastname	= $stdata->last_name;
							$profile->user_id	= $user->id;
							$profile->save();							
							//saving user id to students table.
							$stdata->saveAttributes(array('uid'=>$user->id));							
							// for sending sms
							$sms_settings 	= SmsSettings::model()->findAll();
							$to 			= '';
							if($sms_settings[0]->is_enabled=='1' and $sms_settings[2]->is_enabled=='1'){ // Checking if SMS is enabled.
								if($stdata->phone1){
									$to = $stdata->phone1;	
								}
								elseif($stdata->phone2){
									$to = $stdata->phone2;
								}
								if($to!=''){ // Send SMS if phone number is provided
									$college			= Configurations::model()->findByAttributes(array('id'=>1));
									$from 				= $college->config_value;
									$template			= SystemTemplates::model()->findByPk(3);
									$message 			= $template->template;
									$message 			= str_replace("<School Name>",$college->config_value,$message);
									
									$template			= SystemTemplates::model()->findByPk(4);
									$login_message 		= $template->template;
									$login_message 		= str_replace("<School Name>",$college->config_value,$login_message);
									$login_message 		= str_replace("<Password>",$password,$login_message);
									SmsSettings::model()->sendSms($to,$from,$message);
									SmsSettings::model()->sendSms($to,$from,$login_message);
								} // End send SMS
							} // End check if SMS is enabled
							
							//UserModule::sendMail($stdata->email,UserModule::t("You are registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please login to your account with your email id as username and password {password}",array('{password}'=>$password)));						
						}
						
						//Guardian user						
						$guardian	= Guardians::model()->findByPk($stdata->parent_id);
						if($guardian!=NULL){
							//adding user for current guardian
							$user				= new User;
							$user->tenant		= $stdata->tenant;
							$profile			= new Profile;
							$user->username 	= substr(md5(uniqid(mt_rand(), true)), 0, 10);
							$user->email 		= $guardian->email;
							$user->activkey		= UserModule::encrypting(microtime().$guardian->first_name);
							$password 			= substr(md5(uniqid(mt_rand(), true)), 0, 10);
							$user->password		= UserModule::encrypting($password);
							$user->superuser	= 0;
							$user->status		= 1;							
							if($user->save()){								
								//assign role
								$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
								$authorizer->authManager->assign('parent', $user->id);
								
								//profile
								$profile->firstname = $guardian->first_name;
								$profile->lastname 	= $guardian->last_name;
								$profile->user_id	= $user->id;
								$profile->save();
								
								//saving user id to guardian table.
								$guardian->saveAttributes(array('uid'=>$user->id));
								//$model->uid = $user->id;
								//$model->save();
								
								// for sending sms
								$sms_settings 	= SmsSettings::model()->findAll();
								$to 			= '';
								if($sms_settings[0]->is_enabled=='1' and $sms_settings[2]->is_enabled=='1'){ // Checking if SMS is enabled.
									if($guardian->mobile_phone){
										$to = $guardian->mobile_phone;	
									}									
									if($to!=''){ // Send SMS if phone number is provided
										$college		= Configurations::model()->findByAttributes(array('id'=>1));
										$from 			= $college->config_value;
										$template		= SystemTemplates::model()->findByPk(1);
										$message 		= $template->template;
										$message 		= str_replace("<School Name>",$college->config_value,$message);										
										$template		= SystemTemplates::model()->findByPk(2);
										$login_message 	= $template->template;
										$login_message 	= str_replace("<School Name>",$college->config_value,$login_message);
										$login_message 	= str_replace("<Password>",$password,$login_message);
										SmsSettings::model()->sendSms($to,$from,$message);
										SmsSettings::model()->sendSms($to,$from,$login_message);
									} // End send SMS
								} // End check if SMS is enabled
								
								//UserModule::sendMail($guardian->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please login to your account with your email id as username and password {password}",array('{password}'=>$password)));
							}
						}
						
						$this->redirect(array('finish', 'token'=>$this->encryptToken($stdata->id)));
					}
				}
			}
			$this->render('step7', array('model'=>$stdata));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionFinish(){
		$token		= isset($_GET['token'])?$_GET['token']:NULL;
		//checking session
		$this->checkAccess($token);
		
		$student_id	= $this->decryptToken($token);
		$stdata		= Students::model()->findByPk($student_id);		
		if($stdata!=NULL){
			$this->render('finish', array('model'=>$stdata));
		}
		else{
			throw new CHttpException(404,'Your datas not found.');
		}
	}
	
	public function actionSubjects(){
		$batch		= isset($_GET['batch'])?$_GET['batch']:-1;
		$tenanat	= isset($_GET['center'])?$_GET['center']:-1;
		$model		= new StudentSubjects;
		$criteria	= new CDbCriteria;
		$criteria->condition	= "`batch_id`=:batch_id AND `tenant`=:tenant";
		$criteria->params		= array(':batch_id'=>$batch, ':tenant'=>$tenanat);
		$subjects	= EnrollmentSubjects::model()->findAll($criteria);
		$this->renderPartial('_step3', array('model'=>$model, 'subjects'=>$subjects));
	}
	
	public function actionCourses(){
		$category	= isset($_GET['category'])?$_GET['category']:-1;
		$tenanat	= isset($_GET['center'])?$_GET['center']:-1;
		$criteria	= new CDbCriteria;
		$criteria->condition	= "`category_id`=:category AND `tenant`=:tenant";
		$criteria->params		= array(':category'=>$category, ':tenant'=>$tenanat);
		$data	= EnrollmentCourses::model()->findAll($criteria);
		$data	= CHtml::listData($data, 'id', 'course_name');		
		echo "<option value=''>Select grade</option>";
		
		foreach($data as $value=>$category)
			echo CHtml::tag('option', array('value'=>$value), CHtml::encode($category), true);
	}
	
	public function actionBatches(){
		$criteria	= new CDbCriteria;
		$criteria->compare('course_id', $_GET['course']);
		$criteria->compare('tenant', $_GET['center']);
		$data	= EnrollmentBatches::model()->findAll($criteria);
		$data	= CHtml::listData($data, 'id', 'name');		
		echo "<option value=''>Select curriculum provider</option>";
		
		foreach($data as $value=>$category)
			echo CHtml::tag('option', array('value'=>$value), CHtml::encode($category), true);
	}
	
	public function actionContinue(){
		if(isset($_POST['accesstoken'])){
			$accesstoken	= $_POST['accesstoken'];
			$email			= $this->decryptToken($accesstoken);
			$found			= Students::model()->findByAttributes(array('email'=>$email, 'registration_completed'=>0));
			if($found){
				//set session
				Yii::app()->user->setState("enrollment_id", $this->encryptToken($found->id));
				echo json_encode(array(
						'status'=>'success',
						'redirect'=>Yii::app()->createurl('studentEnrollment/step1', array('token'=>$this->encryptToken($found->id))),
					)
				);
			}
			else{
				echo json_encode(array(
						'status'=>'failed',
					)
				);
			}
		}
		else{
			echo json_encode(array(
					'status'=>'failed',
				)
			);
		}
	}
	
	protected function encryptToken($token){
		$salt	= rand(5, 9);
		for($i=0; $i<$salt; $i++){
			$token	= strrev(base64_encode($token));
		}
		$token	.= rand(1000, 9999);
		$token	.= $salt;
		return $token;
	}
	
	protected function decryptToken($token){
		$salt 	= substr($token, -1);
		$token	= substr_replace($token, "", -5);
		for($i=0; $i<$salt; $i++){
			$token	= base64_decode(strrev($token));
		}
		return $token;
	}
	
	protected function checkAccess($token){
		if(!(Yii::app()->user->hasState("enrollment_id") and $this->decryptToken(Yii::app()->user->getState("enrollment_id"))==$this->decryptToken($token))){
			$this->redirect(array('index'));
		}
	}
	
	public function actionLoadprovinces()
	{
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`country_id`=:country_id';
		$criteria->params		= array(':country_id'=>$_POST['country_id']);
		$criteria->order		= '`name`';
		$data	= Provinces::model()->findAll($criteria);		
		$data	= CHtml::listData($data,'name','name');		
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('state')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	
	public function actionLoadcities()
	{
		$criteria	= new CDbCriteria;
		$criteria->join			= 'JOIN `provinces` `p` ON `p`.`name`=:state';
		$criteria->condition	= '`t`.`province_id`=`p`.`id`';
		$criteria->params		= array(':state'=>$_POST['province']);
		$criteria->order		= '`name`';
		$data	= CHtml::listData(Cities::model()->findAll($criteria),'name','name');	
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('city')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	
	public function actionLoadsuburbs()
	{
		$criteria	= new CDbCriteria;
		$criteria->join			= 'JOIN `cities` `p` ON `p`.`name`=:city';
		$criteria->condition	= '`t`.`city_id`=`p`.`id`';
		$criteria->params		= array(':city'=>$_POST['city']);
		$criteria->order		= '`name`';
		$data	= CHtml::listData(Suburbs::model()->findAll($criteria),'name','name');
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('suburb')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	
	public function actionLoadcoursecategory()
	{
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`school_type`=:school_type';
		$criteria->params		= array(':school_type'=>$_POST['school_type']);
		$criteria->order		= '`category`';
		$data	= CHtml::listData(CourseCategory::model()->findAll($criteria),'id','category');
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('course_category')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	
	public function actionLoadcourses()
	{
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`category`=:category';
		$criteria->params		= array(':category'=>$_POST['category']);
		$criteria->order		= '`name`';
		$data	= CHtml::listData(Course::model()->findAll($criteria),'id','name');
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('course_name')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	
	public function actionLoadcproviders()
	{
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`course_id`=:course_id';
		$criteria->params		= array(':course_id'=>$_POST['course_id']);
		$criteria->order		= '`name`';
		$data	= CHtml::listData(CurriculumProviders::model()->findAll($criteria),'id','name');
		if(isset($_POST['prompt']) and $_POST['prompt']!=NULL)
			echo "<option value=''>".$_POST['prompt']."</option>";
		else
			echo "<option value=''>Select ".Students::model()->getAttributeLabel('course_name')."</option>";
		foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
}