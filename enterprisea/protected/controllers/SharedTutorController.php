<?php

class SharedTutorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			 
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','loadcategories','createcourse','ajaxcreate','ajaxedit','ajaxupdate','ajaxdelete','loadbatches','loadsubjects','complete','viewcourse'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'center'=>$this->loadModel($id),
			'id'=>$id,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SharedTutor;
		$model_1 = new SharedTutorExperience;
		$model_course= new SharedTutorCourse;
		//$model_service = new ServiceCenter;

		
		if(!empty($_POST))
		{
			
			$model->attributes=$_POST['SharedTutor'];
			$model->date = date('Y-m-d');
			$model->user_type = 3;
			
			if($model->dob)
				$model->dob=date('Y-m-d',strtotime($model->dob));
			if($model->qualification_year)
				$model->qualification_year=date('Y-m-d',strtotime($model->qualification_year));
			if($model->sace_date)
				$model->sace_date=date('Y-m-d',strtotime($model->sace_date));
				
			$validate = $model->validate();
			
			if(isset($_POST['SharedTutorCourse']))
			{	
				foreach($_POST['SharedTutorCourse']['course_id'] as $val)
				{	
					$model_course= new SharedTutorCourse;
					$model_course->center_id = $model->id;
					$model_course->course_id = $val;
					$validate = $model_course->validate() && $validate;
									
				}
			}
			else
			{
				$model_course= new SharedTutorCourse;
				$validate = $model_course->validate() && $validate;
			}
			/*if(isset($_POST['ServiceCenter']))
			{	
				foreach($_POST['ServiceCenter']['service_id'] as $val)
				{	
					$service = Services::model()->findByPk($val);
					$model_service= new ServiceCenter;
					$model_service->center_id=$model->id;
					$model_service->service_id=$val;
					$model_service->fees = $service->fees;
					$validate = $model_service->validate() && $validate;
									
				}
			}
			else
			{
				$model_service= new ServiceCenter;
				$validate = $model_service->validate() && $validate;
			}*/
			
				$model_1->attributes=$_POST['SharedTutorExperience'];
				$model_1->center_id = $model->id;
				$validate = $model_1->validate() && $validate;
			
			
			
			if($validate)
			{
				if($model->save())
				{
					foreach($_POST['SharedTutorCourse']['course_id'] as $val)
					{	
						$model_course= new SharedTutorCourse;
						$model_course->center_id=$model->id;
						$model_course->course_id=$val;
						$model_course->save();
										
					}
					/*foreach($_POST['ServiceCenter']['service_id'] as $val)
					{	
						$service = Services::model()->findByPk($val);
						$model_service= new ServiceCenter;
						$model_service->center_id=$model->id;
						$model_service->service_id=$val;
						$model_service->fees = $service->fees;
						$model_service->save();
										
					}*/
					
						$model_1->attributes=$_POST['SharedTutorExperience'];
						$model_1->center_id = $model->id;
						$model_1->save();
					
					
					//Generate 8 digit random number for tenant
					$digits = 8;
					$tenant = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
					$model->saveAttributes(array('tenant'=>$tenant));
					
					$uid = SharedTutor::model()->add_admin($tenant,$model->id);//add admin user for center
					$model->saveAttributes(array('uid'=>$uid));
					SharedTutor::model()->add_settings($tenant);//add default settings to db
					SharedTutor::model()->add_weekdays($tenant);//add default weekdays to db
					SharedTutor::model()->add_grading_levels($tenant);//add default Grade levels to db
					Yii::app()->session['center_id'] = $model->id;
					
					
					
					$this->redirect(array('createcourse','id'=>$model->id));
				}
			
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model_1'=>$model_1,
			'model_course'=>$model_course,
			//'model_service'=>$model_service,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model= $this->loadModel($id);
		$model_1 = SharedTutorExperience::model()->findByAttributes(array('center_id'=>$model->id));
		$model_course= new SharedTutorCourse;
		//$model_service = new ServiceCenter;

		
		if(!empty($_POST))
		{
			
			
			$model->attributes=$_POST['SharedTutor'];
			$model->date = date('Y-m-d');
			
			
			if($model->dob)
				$model->dob=date('Y-m-d',strtotime($model->dob));
			if($model->qualification_year)
				$model->qualification_year=date('Y-m-d',strtotime($model->qualification_year));
			if($model->sace_date)
				$model->sace_date=date('Y-m-d',strtotime($model->sace_date));
				
			$validate = $model->validate();
			if(isset($_POST['SharedTutorCourse']))
			{	
				$old_courses = PrivateTutorCourse::model()->findAllByAttributes(array('center_id'=>$model->id));
				foreach($old_courses as $old_course)
				{
					$courses = Courses::model()->findAllByAttributes(array('category_id'=>$old_course->course_id));
					foreach($courses as $course)
					{
						if($course != NULL)
						{
							
							$batch = Batches::model()->findAllByAttributes(array('course_id'=>$course->id));
							foreach($batch as $val)
							{
								$subjects = Subjects::model()->deleteAllByAttributes(array('batch_id'=>$val->id));
								
							}
							Batches::model()->deleteAllByAttributes(array('course_id'=>$course->id));
						}
						Courses::model()->deleteAllByAttributes(array('id'=>$course->id));
					}
				}
				SharedTutorCourse::model()->deleteAllByAttributes(array('center_id'=>$model->id));
				foreach($_POST['SharedTutorCourse']['course_id'] as $val)
				{	
					$model_course= new SharedTutorCourse;
					$model_course->center_id = $model->id;
					$model_course->course_id = $val;
					$validate = $model_course->validate() && $validate;
									
				}
			}
			/*if(isset($_POST['ServiceCenter']))
			{	
				ServiceCenter::model()->deleteAllByAttributes(array('center_id'=>$model->id));
				foreach($_POST['ServiceCenter']['service_id'] as $val)
				{	
					$service = Services::model()->findByPk($val);
					$model_service= new ServiceCenter;
					$model_service->center_id=$model->id;
					$model_service->service_id=$val;
					$model_service->fees = $service->fees;
					$validate = $model_service->validate() && $validate;
									
				}
			}*/
				$model_1->attributes=$_POST['SharedTutorExperience'];
				$model_1->center_id = $model->id;
				$validate = $model_1->validate() && $validate;
			
			
			
			if($validate)
			{
				if($model->save())
				{
					foreach($_POST['SharedTutorCourse']['course_id'] as $val)
					{	
						$model_course= new SharedTutorCourse;
						$model_course->center_id=$model->id;
						$model_course->course_id=$val;
						$model_course->save();
										
					}
					/*foreach($_POST['ServiceCenter']['service_id'] as $val)
					{	
						$service = Services::model()->findByPk($val);
						$model_service= new ServiceCenter;
						$model_service->center_id=$model->id;
						$model_service->service_id=$val;
						$model_service->fees = $service->fees;
						$model_service->save();
										
					}*/
						$model_1->attributes=$_POST['SharedTutorExperience'];
						$model_1->center_id = $model->id;
						$model_1->save();
					
						$user = User::model()->findByPk($model->uid);
						if($user->email != $model->email)
						{
							
							$user->email = $model->email;
							$user->save();
						}
					
					
					
					
					$this->redirect(array('view','id'=>$model->id));
				}
			
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model_1'=>$model_1,
			'model_course'=>$model_course,
			'model_service'=>$model_service,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		// Delete Course Categories,coures,curiculum providers,subjects
		$old_courses = SharedTutorCourse::model()->findAllByAttributes(array('center_id'=>$id));
		foreach($old_courses as $old_course)
		{
			$courses = Courses::model()->findAllByAttributes(array('category_id'=>$old_course->course_id));
			foreach($courses as $course)
			{
				if($course != NULL)
				{
					
					$batch = Batches::model()->findAllByAttributes(array('course_id'=>$course->id));
					foreach($batch as $val)
					{
						$subjects = Subjects::model()->deleteAllByAttributes(array('batch_id'=>$val->id));
						
					}
					Batches::model()->deleteAllByAttributes(array('course_id'=>$course->id));
				}
				Courses::model()->deleteAllByAttributes(array('id'=>$course->id));
			}
		}
		SharedTutorCourse::model()->deleteAllByAttributes(array('center_id'=>$id));
		
		//delete experience
		SharedTutorExperience::model()->deleteAllByAttributes(array('center_id'=>$id));
		//delete location details
		SharedTutorLocation::model()->deleteAllByAttributes(array('center_id'=>$id));
		
		
		//delete service details
		//ServiceCenter::model()->deleteAllByAttributes(array('center_id'=>$id));
		
		//delete uploaded documents
		$documents = SharedTutorUploads::model()->findAllByAttributes(array('center_id'=>$id));
		foreach($documents as $document)
		{
			
			$destination_file = 'uploadedfiles/sharedtutor_document/'.$document->center_id.'/'.$document->file;
			if(file_exists($destination_file))
			{
				if(unlink($destination_file))
				{
					$document->delete();
					
				}
			}
		}
		//delete tutor
		$center_user = SharedTutor::model()->findByPk($id);
		User::model()->deleteAllByAttributes(array('id'=>$center_user->uid));
		SharedTutor::model()->deleteAllByAttributes(array('id'=>$id));
		$this->redirect(array('index'));
	}
	
	public function actionIndex()
	{
		
		
		$centers= SharedTutor::model()->findAllByAttributes(array('user_type'=>3));
		$this->render('index',array(
			'centers'=>$centers,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SharedTutor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SharedTutor']))
			$model->attributes=$_GET['Center'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=SharedTutor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='center-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCreatecourse($id)
	{
		
		$model = new CourseForm;
		$this->render('createcourse',array(
			'model'=>$model,
			'center_id' => $id,
		));
		
	}
	public function actionAjaxcreate()
	{
		$model = new CourseForm;
		$academic_yr = Configurations::model()->findByAttributes(array('id'=>35));
		if(isset($_POST['CourseForm']))
		{
			$model->attributes = $_POST['CourseForm'];
			if($model->validate())
			{
				
				
				
				$courses_data = Courses::model()->findByAttributes(array('admin_id'=>$_POST['CourseForm']['grade']));
				if($courses_data)
				{
					$result = true;
					$course = $courses_data; 
				}
				else
				{
					
					$course = new Courses;
					$grade_model = Course::model()->findByAttributes(array('id'=>$_POST['CourseForm']['grade']));
					$course->category_id = $_POST['CourseForm']['category_id'];
					$course->course_name = $grade_model->name;
					$course->code = '';
					$course->section_name = '';
					$course->academic_yr_id	 = $academic_yr->config_value;
					$course->created_at = date('Y-m-d');
					$course->admin_id = $_POST['CourseForm']['grade'];
					$result = $course->save();
				}
					
				if($result)
				{
					$batch = new Batches;
					$batch_model = CurriculumProviders::model()->findByAttributes(array('id'=>$_POST['CourseForm']['batch']));
					$batch->name = $batch_model->name;
					$batch->course_id = $course->id;
					$batch->academic_yr_id = $academic_yr->config_value;
					$batch->start_date = date('Y-m-d');
					$batch->end_date = date('Y-m-d');
					$batch->admin_id = $_POST['CourseForm']['batch'];
					
					if($batch->save())
					{	$subject_arr = array();
						foreach($_POST['CourseForm']['subject'] as $val)
						{
							$subject = new Subjects;
							$subject_model = CpSubjects::model()->findByAttributes(array('id'=>$val));
							$subject->name = $subject_model->name;
							$subject->batch_id = $batch->id;
							$subject->admin_id = $val;
							$subject->code = '';
							$subject->no_exams = '';
							$subject->max_weekly_classes = '';
							$subject->elective_group_id = '';
							$subject->save();
							$subject_arr[] = $subject;
						}
						
					}
				
				}
				$arr['status']='success';
				$arr['content']=$this->renderPartial('ajax_coursesubmit', array('course'=>$course,'batch'=>$batch,'subject_arr'=>$subject_arr),true,true);
				echo json_encode($arr);
				Yii::app()->end();  
			}
			else
			{
				$error = CActiveForm::validate($model);
				if($error!='[]'){
					$er_array	= array();
					$er_array	= json_decode($error, true);
					
					//extra errors here
					//$er_array['test_erro'][0]	= 'testing...';
					//extra errors here
					
					$error	= json_encode(array(
					'status'=>'error',
					'error'=>$er_array,
				));
					echo $error;
					
					
					
				}
				Yii::app()->end();  
			}
		}
		
	}
	public function actionAjaxupdate()
	{
		
		$academic_yr = Configurations::model()->findByAttributes(array('id'=>35));
		$model = new CourseForm;
		if(isset($_POST['CourseForm']))
		{
			$course = Courses::model()->findByAttributes(array('category_id'=>$_POST['CourseForm']['category_id'],'id'=>$_POST['course_id']));
			$batch = Batches::model()->findByAttributes(array('id'=>$_POST['batch_id']));
			$subjects = Subjects::model()->deleteAllByAttributes(array('batch_id'=>$batch->id));
			
			if($subjects)
			{
				$batch->delete();
			}
			
			$model->attributes = $_POST['CourseForm'];
			if($model->validate())
			{
				$courses_data = Courses::model()->findByAttributes(array('admin_id'=>$_POST['CourseForm']['grade']));
				if($courses_data)
				{
					$result = true;
					$course = $courses_data; 
				}
				else
				{
					
					$course = new Courses;
					$grade_model = Course::model()->findByAttributes(array('id'=>$_POST['CourseForm']['grade']));
					$course->category_id = $_POST['CourseForm']['category_id'];
					$course->course_name = $grade_model->name;
					$course->code = '';
					$course->section_name = '';
					$course->academic_yr_id	 = $academic_yr->config_value;
					$course->created_at = date('Y-m-d');
					$course->admin_id = $_POST['CourseForm']['grade'];
					$result = $course->save();
				}
					
				if($result)
				{
					$batch = new Batches;
					$batch_model = CurriculumProviders::model()->findByAttributes(array('id'=>$_POST['CourseForm']['batch']));
					$batch->name = $batch_model->name;
					$batch->course_id = $course->id;
					$batch->academic_yr_id = $academic_yr->config_value;
					$batch->start_date = date('Y-m-d');
					$batch->end_date = date('Y-m-d');
					$batch->admin_id = $_POST['CourseForm']['batch'];
					
					if($batch->save())
					{	$subject_arr = array();
						foreach($_POST['CourseForm']['subject'] as $val)
						{
							$subject = new Subjects;
							$subject_model = CpSubjects::model()->findByAttributes(array('id'=>$val));
							$subject->name = $subject_model->name;
							$subject->batch_id = $batch->id;
							$subject->admin_id = $val;
							$subject->code = '';
							$subject->no_exams = '';
							$subject->max_weekly_classes = '';
							$subject->elective_group_id = '';
							$subject->save();
							$subject_arr[] = $subject;
						}
						
					}
				
				}
				$arr['status']='success';
				echo json_encode($arr);
				Yii::app()->end();  
			}
			else
			{
				$error = CActiveForm::validate($model);
				if($error!='[]'){
					$er_array	= array();
					$er_array	= json_decode($error, true);
					
					//extra errors here
					//$er_array['test_erro'][0]	= 'testing...';
					//extra errors here
					
					$error	= json_encode(array(
					'status'=>'error',
					'error'=>$er_array,
				));
					echo $error;
					
					
					
				}
				Yii::app()->end();  
			}
		}
		
	}
	public function actionAjaxdelete()
	{
		
		$course = Courses::model()->findByAttributes(array('category_id'=>$_POST['category_id'],'id'=>$_POST['course_id']));
		$batch = Batches::model()->findByAttributes(array('id'=>$_POST['batch_id']));
		$batch_id = $batch->id;
		$subjects = Subjects::model()->deleteAllByAttributes(array('batch_id'=>$batch->id));
		
		if($subjects)
		{
			if($batch->delete())
			{
				$batch = Batches::model()->findByAttributes(array('course_id'=>$course->id));
				if($batch)
					$reuslt = true;
				else
					$reuslt = $course->delete();
				
				if($reuslt)
				{
					$criteria				= new CDbCriteria;						
					//$criteria->join			= 'LEFT JOIN `courses` `acp` ON `acp`.`course_name`=`t`.`name`';
					$criteria->condition	= '`t`.`category`=:category';
					$criteria->params		= array(':category'=>$_POST['category_id']);
					$grades	= CHtml::listData(Course::model()->findAll($criteria), 'id', 'name' );
					$arr['content'] = "<option value=''>Select Grades</option>";
					foreach($grades as $value=>$name)
						$arr['content'] .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
					 
					$arr['status']='success';
					$arr['batch_id']=$batch_id;
					$arr['course_id']=$_POST['course_id'];
					echo json_encode($arr);
					Yii::app()->end(); 
				}
				
			}
		}
		
		
	}
	public function actionAjaxedit()
	{
		$cs=Yii::app()->clientScript;
		$cs->scriptMap=array(
			'jquery.js'=>false,
		);
		$model = new CourseForm;
		$course = Courses::model()->findByAttributes(array('category_id'=>$_POST['category_id'],'id'=>$_POST['course_id']));
		$batch = Batches::model()->findByAttributes(array('id'=>$_POST['batch_id']));
		$subject_arr = Subjects::model()->findAllByAttributes(array('batch_id'=>$batch->id));
		$arr['course_id']=$_POST['course_id'];
		$arr['batch_id']=$batch->id;
		$arr['status']='success';
		$arr['content']=$this->renderPartial('ajax_courseedit', array('model'=>$model,'center_id'=>$_POST['id'],'category_id'=>$_POST['category_id'],'course'=>$course,'batch'=>$batch,'subject_arr'=>$subject_arr),true,true);
		echo json_encode($arr);
		Yii::app()->end();  
		
		
	}
	public function actionLoadbatches()
	{
	   $data=CurriculumProviders::model()->findAll('course_id=:x', 
	   array(':x'=>$_POST['grades']));
	 
	   $data=CHtml::listData($data,'id','name');
	 
	   echo "<option value=''>Select Batch</option>";
	   foreach($data as $value=>$name)
	   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	public function actionLoadsubjects()
	{
	   $data=CpSubjects::model()->findAll('cp_id=:x', 
	   array(':x'=>$_POST['batches']));
	 
	   $data=CHtml::listData($data,'id','name');
	 
	   echo "<option value=''>Select Subjects</option>";
	   foreach($data as $value=>$name)
	   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	public function actionLoadcategories()
	{
	   $data=CourseCategory::model()->findAll('school_type=:x', 
	   array(':x'=>$_POST['type']));
	 
	   $data=CHtml::listData($data,'id','category');
	 
	   //echo "<option value=''>Select Category</option>";
	   foreach($data as $value=>$name)
	   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	}
	public function actionComplete($id)
	{
		$model = $this->loadModel($id);
		$this->render('complete',array(
			'model'=>$model,
			'id' => $id,
		));
	}
	public function actionViewcourse($id)
	{
		$this->render('viewcourse',array(
		'id' => $id,
			
		));
		
		
	}
}
