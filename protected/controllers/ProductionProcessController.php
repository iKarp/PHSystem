<?php

class ProductionProcessController extends Controller
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
		$model = $this->loadModel($id);
        $model->calculate();
        $materials = new CArrayDataProvider($model->materials);
        $operations = new CArrayDataProvider($model->operations);
        $subprocesses = new CArrayDataProvider($model->subprocesses);
        $this->render('view',array(
			'model'=>$model,
            'materials'=>$materials,
            'operations'=>$operations,
            'subprocesses'=>$subprocesses,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProductionProcess;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductionProcess']))
		{
			$model->attributes=$_POST['ProductionProcess'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['ProductionProcess']))
		{
			$model->attributes=$_POST['ProductionProcess'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
        
        if ($id != 0) $model = $this->loadModel($id);
        
        if ($model->is_folder || $id == 0) {
            $dataProvider=new CActiveDataProvider('ProductionProcess', array(
                'criteria'=>array(
                    'condition'=>'parent_id = '.$id,
                    'order'=>'is_folder DESC, name',
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));
            if ($model) {
                $breadcrumbs = $model->breadcrumbs();
            }
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
                'breadcrumbs'=>$breadcrumbs,
            ));
        }
        else {
            $this->redirect(array('view','id'=>$id));
        }        
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductionProcess('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductionProcess']))
			$model->attributes=$_GET['ProductionProcess'];

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
		$model=ProductionProcess::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='production-process-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
