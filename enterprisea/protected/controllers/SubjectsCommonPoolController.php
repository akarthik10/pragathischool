<?php

class SubjectsCommonPoolController extends RController
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
			'rights', // perform access control for CRUD operations
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ajaxcreate','ajaxupdate'),
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
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SubjectsCommonPool;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SubjectsCommonPool']))
		{
			$model->attributes=$_POST['SubjectsCommonPool'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxcreate()
	{
		$model=new SubjectsCommonPool;
		$model->status	= 1;
		if(isset($_POST['SubjectsCommonPool']))
		{
			$subnames	= $_POST['SubjectsCommonPool']['name'];
			$valid		= true;
			if(isset($_GET['type']) and is_numeric($_GET['type']) and isset($_GET['category']) and is_numeric($_GET['category'])){
				$type		= $_GET['type'];
				$category	= $_GET['category'];
				foreach($subnames as $subname){
					$model=new SubjectsCommonPool;
					$model->status	= 1;
					$model->type	= $type;
					$model->category= $category;
					$model->name   	= $subname;
					$valid	= $valid && $model->validate();
				}			
				if($valid){
					foreach($subnames as $subname){
						$model=new SubjectsCommonPool;
						$model->status	= 1;
						$model->type	= $type;
						$model->category= $category;
						$model->name   	= $subname;
						$model->save();
					}
					echo json_encode(array('status'=>'success', 'message'=>'Common pool subject(s) added'));
					Yii::app()->end();
				}
				else{
					echo json_encode(array('status'=>'error', 'message'=>'Fill subject name(s)'));
					Yii::app()->end();
				}
			}
			else{
				echo json_encode(array('status'=>'error', 'message'=>'Problem found while inserting data(s)'));
				Yii::app()->end();
			}
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			false,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SubjectsCommonPool']))
		{
			$model->attributes=$_POST['SubjectsCommonPool'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['SubjectsCommonPool']))
		{
			$model->attributes=$_POST['SubjectsCommonPool'];
			if($model->validate()){
				if($model->save()){
					echo json_encode(array('status'=>'success', 'message'=>'Subject updated'));
					Yii::app()->end();
				}
			}
			else{
				// Uncomment the following line if AJAX validation is needed
				$this->performAjaxValidation($model);
			}
		}
		$this->renderPartial('_form1',array(
			'model'=>$model,
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
			else
				echo json_encode(array('status'=>'success'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$type		= (isset($_GET['stype']) and is_numeric($_GET['stype']))?$_GET['stype']:NULL;
		$category	= (isset($_GET['category']) and is_numeric($_GET['category']))?$_GET['category']:NULL;
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`type`=:type AND `category`=:category';
		$criteria->params		= array(':type'=>$type, ':category'=>$category);
		$datas	= SubjectsCommonPool::model()->findAll($criteria);
		$this->render('index',array(
			'datas'=>$datas,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SubjectsCommonPool('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SubjectsCommonPool']))
			$model->attributes=$_GET['SubjectsCommonPool'];

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
		$model=SubjectsCommonPool::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='subjects-common-pool-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
