<?php

class CountriesController extends RController
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
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Countries;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAjaxcreate()
	{
		$model=new Countries;
		$model->is_active	= 1;
		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
			if($model->validate()){
				if($model->save()){
					echo json_encode(array('status'=>'success', 'message'=>'Country Added'));
					Yii::app()->end();
				}
			}
			else{
				// Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				echo json_encode(array('status'=>'error', 'errors'=>array('Countries_name'=>'Name cannot be blank')));
				Yii::app()->end();
			}
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			false
		));
	}
	
	public function actionAjaxactivate()
	{
		
		$model=$this->loadModel($_GET['id']);
		$model->is_active = 1;
		$model->save();
		$data	=  '<a class="activate btn btn-danger btn-xs lesser" href="'.Yii::app()->createUrl('countries/ajaxdeactivate', array('id'=>$_GET['id'], 'ajax'=>'activate')).'">Deactivate</a>';
		echo json_encode(array('id'=>$model->id,'status'=>'success','active'=>1, 'message'=>'Country Activated', 'data'=>$data));
		Yii::app()->end();
		
	}
	public function actionAjaxdeactivate()
	{
		
		$model=$this->loadModel($_GET['id']);
		$model->is_active = 0;
		$model->save();
		$data	= '<a class="activate btn btn-success btn-xs lesser" href="'.Yii::app()->createUrl('countries/ajaxactivate', array('id'=>$_GET['id'], 'ajax'=>'activate')).'">Activate</a>';
		echo json_encode(array('id'=>$model->id,'status'=>'success','active'=>0, 'message'=>'Country Deactivated', 'data'=>$data));
		Yii::app()->end();
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

		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
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
		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
			if($model->validate()){
				if($model->save()){
					echo json_encode(array('status'=>'success', 'message'=>'Country updated'));
					Yii::app()->end();
				}
			}
			else{
				// Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				echo json_encode(array('status'=>'error', 'errors'=>array('Countries_name'=>'Name cannot be blank')));
				Yii::app()->end();
			}
		}
		
		$this->renderPartial('_form',array(
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
			
			
					
				//find province and remove
				$provinces	= Provinces::model()->findAllByAttributes(array('country_id'=>$id));
				foreach($provinces as $province){
					//find city and remove
					$cities	= Cities::model()->findAllByAttributes(array('province_id'=>$province->id));
					foreach($cities as $city){			
						//find suburbs of city and remove
						Suburbs::model()->deleteAllByAttributes(array('city_id'=>$city->id));
						$city->delete();
					}
					$province->delete();
				}
				
			

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
		$criteria = new CDbCriteria;
		if(isset($_GET['status']) and $_GET['status']!= NULL)
		{
			if($_GET['status'] == 1)
			{
				$criteria->condition = 'is_active=:status';
				$criteria->params = array(':status'=>1);
			}
			else
			{
				$criteria->condition = 'is_active=:status';
				$criteria->params = array(':status'=>0);
			}
		}
		$criteria->order = 'name ASC';
		$total = Countries::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(20);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = Countries::model()->findAll($criteria);
		
		$this->render('index',array(
		'list'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>20,)) ;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Countries('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Countries']))
			$model->attributes=$_GET['Countries'];

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
		$model=Countries::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='countries-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
