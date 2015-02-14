<?php

class PrivateTutorUploadsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	/*public function filters()
	{
		return array(
			'accesscontrol', // perform access control for CRUD operations
		);
	}
*/
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','download','approve','disapprove','addrow'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','deletes'),
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
		$model = PrivateTutorUploads::model()->findByAttributes(array('center_id'=>$id));
		$this->render('view',array(
			'model'=>$model,
			'id'=>$id
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		//echo $_POST['CenterUploads']['sid'];exit;
		$model=new PrivateTutorUploads;
		$flag = 1;
		$valid_file_types = array('image/jpeg','image/png','application/pdf','application/msword','text/plain'); // Creating the array of valid file types
		$files_not_saved = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrivateTutorUploads']))
		{
			
			$list = $_POST['PrivateTutorUploads'];
			$no_of_documents = count($list['title']); // Counting the number of files uploaded (No of rows in the form)
			for($i=0;$i<$no_of_documents;$i++) //Iterating the documents uploaded
			{	$value = explode('.',$_FILES['PrivateTutorUploads']['name']['file'][$i]);
				$model=new PrivateTutorUploads;
				$model->center_id = $_POST['PrivateTutorUploads']['center_id'][$i];
				$model->title = $_POST['PrivateTutorUploads']['title'][$i];
				$extension = end($value); // Get extension of the file
				$model->file = $this->generateRandomString(rand(6,10)).'.'.$extension; // Generate random string as filename
				$model->file_type = $_FILES['PrivateTutorUploads']['type']['file'][$i];
				
				$file_size = $_FILES['PrivateTutorUploads']['size']['file'][$i];
				if($model->center_id!='' and $model->title!='' and $model->file!='' and $model->file_type!='') // Checking if Document name and file is uploaded
				{
					if(in_array($model->file_type,$valid_file_types)) // Checking file type
					{
						if($file_size <= 5242880) // Checking file size
						{
							if(!is_dir('uploadedfiles/')) // Creating uploaded file directory
							{
								mkdir('uploadedfiles/');
							}
							if(!is_dir('uploadedfiles/privatetutor_document/')) // Creating student_document directory
							{
								mkdir('uploadedfiles/privatetutor_document/');
							}
							if(!is_dir('uploadedfiles/privatetutor_document/'.$model->center_id)) // Creating student directory for saving the files
							{
								mkdir('uploadedfiles/privatetutor_document/'.$model->center_id);
							}
							$temp_file_loc = $_FILES['PrivateTutorUploads']['tmp_name']['file'][$i];
							$destination_file = 'uploadedfiles/privatetutor_document/'.$model->center_id.'/'.$model->file;
							if(move_uploaded_file($temp_file_loc,$destination_file)) // Saving the files to the folder
							{
								if($model->save()) // Saving the model to database
								{
									$flag = 1;
								}
								else // If model not saved
								{
									
									$flag = 0;
									if(file_exists($destination_file))
									{
										unlink($destination_file);
									}
									$files_not_saved = $files_not_saved.', '.$model->file;
									Yii::app()->user->setFlash('errorMessage',"File(s) ".$files_not_saved." was not saved to the database. Please try again.");
									continue;
								}
							}
							else // If file not saved to the directory
							{
								$flag = 0;
								$files_not_saved = $files_not_saved.', '.$model->file;
								Yii::app()->user->setFlash('errorMessage',"File(s) ".$files_not_saved." was not saved. Please try again.");
								continue;
							}
						}
						else // If file size is too large. Greater than 5 MB
						{
							$flag = 0;
							Yii::app()->user->setFlash('errorMessage',"File size must not exceed 5MB!");
						}
					}
					else // If file type is not valid
					{
						$flag = 0;
						Yii::app()->user->setFlash('errorMessage',"Only files with these extensions are allowed: jpg, png, pdf, doc, txt.");
					}
				}
				elseif($model->title=='' and $model->file_type!='') // If document name is empty
				{
					$flag = 0;
					Yii::app()->user->setFlash('errorMessage',"Document Name cannot be empty!");
					//$this->redirect(array('create','model'=>$model,'id'=>$_REQUEST['id']));
				}
				elseif($model->title!='' and $model->file_type=='') // If file is not selected
				{
					$flag = 0;
					Yii::app()->user->setFlash('errorMessage',"File is not selected!");
					
				}
				elseif($model->center_id=='' and $model->title=='' and $model->file=='' and $model->file_type=='')
				{
					$flag=1;
				}
			}
			if($flag == 1) // If no errors, go to next step of the student registration
			{
				//$this->redirect(array('view','id'=>$model->id));
				if($_POST['PrivateTutorUploads']['document']==1)
				{
					$this->redirect(array('privateTutorUploads/create','id'=>$_POST['PrivateTutorUploads']['sid']));
				}
				else
				{
				
					$this->redirect(array('privateTutorUploads/view','id'=>$_POST['PrivateTutorUploads']['sid']));
				}
			}
			else // If errors are present, redirect to the same page
			{
				if($_POST['PrivateTutorUploads']['document']==1)
				{
					$this->redirect(array('privateTutorUploads/create','id'=>$_POST['PrivateTutorUploads']['sid']));
				}
				else
				{
					$this->redirect(array('create','id'=>$_POST['PrivateTutorUploads']['sid']));
				}
			}
		} // END isset

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel($_REQUEST['document_id']);//Here $_REQUEST['id'] is student ID and $_REQUEST['document_id'] is document ID
		$old_model = $model->attributes;
		$flag = 1; // If 1, no errors. If 0, some error is present.
		$valid_file_types = array('image/jpeg','image/png','application/pdf','application/msword','text/plain'); // Creating the array of valid file types
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['PrivateTutorUploads']))
		{
			$list = $_POST['PrivateTutorUploads'];
			//var_dump($list);exit;
			$model->center_id = $list['center_id'];
			$model->title = $list['title'];
			if($model->title!=NULL and $model->center_id!=NULL)
			{
				if($_FILES['PrivateTutorUploads']['name']['file']!=NULL)
				{
					$value = explode('.',$_FILES['PrivateTutorUploads']['name']['file']);
					$extension = end($value); // Get extension of the file
					$model->file = $this->generateRandomString(rand(6,10)).'.'.$extension; // Generate random string as filename
					$model->file_type = $_FILES['PrivateTutorUploads']['type']['file'];
					$file_size = $_FILES['PrivateTutorUploads']['size']['file'];
					if(in_array($model->file_type,$valid_file_types)) // Checking file type
					{
						if($file_size <= 5242880) // Checking file size
						{
							if(!is_dir('uploadedfiles/')) // Creating uploaded file directory
							{
								mkdir('uploadedfiles/');
							}
							if(!is_dir('uploadedfiles/privatetutor_document/')) // Creating student_document directory
							{
								mkdir('uploadedfiles/privatetutor_document/');
							}
							if(!is_dir('uploadedfiles/privatetutor_document/'.$model->center_id)) // Creating student directory for saving the files
							{
								mkdir('uploadedfiles/privatetutor_document/'.$model->center_id);
							}
							$temp_file_loc = $_FILES['PrivateTutorUploads']['tmp_name']['file'];
							$destination_file = 'uploadedfiles/privatetutor_document/'.$model->center_id.'/'.$model->file;
							
							if(move_uploaded_file($temp_file_loc,$destination_file)) // Saving the files to the folder
							{
								$flag = 1;
								
							}
							else // If file not saved to the directory
							{
								$flag = 0;								
								Yii::app()->user->setFlash('errorMessage',"File ".$model->file." was not saved. Please try again.");
							}
						}
						else // If file size is too large. Greater than 5 MB
						{
							$flag = 0;
							Yii::app()->user->setFlash('errorMessage',"File size must not exceed 5MB!");
						}
					}
					else // If file type is not valid
					{
						$flag = 0;
						Yii::app()->user->setFlash('errorMessage',"Only files with these extensions are allowed: jpg, png, pdf, doc, txt.");
					}
				}
				else // No files selected
				{
					if($old_model['file']!=NULL and $list['new_file_field']==1)
					{
						$flag = 0;
						Yii::app()->user->setFlash('errorMessage',"No file selected!");
					}
					
				}
			}
			else // No title entered
			{
				$flag = 0;
				Yii::app()->user->setFlash('errorMessage',"Document Name cannot be empty!");
			}
			
			
			if($flag == 1) // Valid data
			{ 
				if($model->save())
				{
					if($_FILES['PrivateTutorUploads']['name']['file']!=NULL)
					{
						$old_destination_file = 'uploadedfiles/privatetutor_document/'.$model->center_id.'/'.$old_model['file'];	
						if(file_exists($old_destination_file))
						{
							unlink($old_destination_file);
						}
					}
					$this->redirect(array('privateTutorUploads/create','id'=>$model->center_id));
				}
				else
				{
					
					Yii::app()->user->setFlash('errorMessage',UserModule::t("Cannot update the document now. Try again later."));
					$this->redirect(array('update','id'=>$model->center_id,'document_id'=>$_REQUEST['document_id']));
				}
					
			}
			else
			{
				$this->redirect(array('update','id'=>$model->center_id,'document_id'=>$_REQUEST['document_id']));
				/*$this->render('update',array(
					'model'=>$model,'student_id'=>$_REQUEST['id']
				));*/
				
			}
		}

		$this->render('update',array(
			'model'=>$model,'center_id'=>$_REQUEST['id']
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		if(Yii::app()->request->isPostRequest)
		{
			
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionDeletes()
	{
		$model=$this->loadModel($_REQUEST['document_id']);
		$destination_file = 'uploadedfiles/privatetutor_document/'.$model->center_id.'/'.$model->file;
		if(file_exists($destination_file))
		{
			if(unlink($destination_file))
			{
				$model->delete();
				Yii::app()->user->setFlash('errorMessage',"Document deleted successfully!");	
			}
		}
		$this->redirect(array('privateTutorUploads/create','id'=>$_REQUEST['id']));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PrivateTutorUploads');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	/**
	* Download Files
	*/
	public function actionDownload()
	{
		$model=$this->loadModel($_REQUEST['id']);
		$file_path = 'uploadedfiles/privatetutor_document/'.$model->center_id.'/'.$model->file;
		$file_content = file_get_contents($file_path);
		$model->title = str_replace(' ','',$model->title);
		header("Content-Type: ".$model->file_type);
		header("Content-disposition: attachment; filename=".$model->title);
		header("Pragma: no-cache");
		echo $file_content;
		exit;
	}
	
	/**
	* Approve Document
	*/
	public function actionApprove()
	{
		$model = PrivateTutorUploads::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('is_approved'=>'1'));
		$this->redirect(array('students/document','id'=>$_REQUEST['student_id']));
	}
	
	/**
	* Approve Document
	*/
	public function actionDisapprove()
	{
		$model = PrivateTutorUploads::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('is_approved'=>'-1'));
		$this->redirect(array('students/document','id'=>$_REQUEST['student_id']));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PrivateTutorUploads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrivateTutorUploads']))
			$model->attributes=$_GET['PrivateTutorUploads'];

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
		$model=PrivateTutorUploads::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	private function generateRandomString($length = 5) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	public function actionAddrow()
	{
		$model=new PrivateTutorUploads;
		$result = $this->renderPartial('_ajaxform', array('model'=>$model),true,true);
		echo json_encode($result);
		Yii::app()->end();  
	}
	
	
}
