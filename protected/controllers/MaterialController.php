<?php

class MaterialController extends Controller
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
				'actions'=>array('create','update','autoCompleteLookup'),
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
    
    public function actionAutoCompleteLookup()
	{
        if(Yii::app()->request->isAjaxRequest && isset($_GET['q'])){
            /* q is the default GET variable name that is used by
            / the autocomplete widget to pass in user input
            */
          $name = $_GET['q']; 
                    // this was set with the "max" attribute of the CAutoComplete widget
          $limit = min($_GET['limit'], 50); 
          $criteria = new CDbCriteria;
          $criteria->condition = "name LIKE :sterm";
          if (isset($_GET['is_folder'])) $criteria->condition .= " AND is_folder='".$_GET['is_folder']."'";
          $criteria->params = array(":sterm"=>"%$name%");
          $criteria->limit = $limit;
          $dataArray = Material::model()->findAll($criteria);
          $returnVal = '';
          foreach($dataArray as $data)
          {
             $returnVal .= $data->getAttribute('name').'|'.$data->getAttribute('id')."\n";
          }
          echo $returnVal;
       }
    }


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('view',array('model'=>$this->loadModel($id)));
		else
			$this->render('view',array('model'=>$this->loadModel($id)));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Material;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Material'])){
			$model->attributes=$_POST['Material'];
			if($model->save()){
				if(Yii::app()->request->isAjaxRequest){
					echo 'success';
					Yii::app()->end();
				}
				else {
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		if(Yii::app()->request->isAjaxRequest){
            if (isset($_GET['is_folder'])) $model->is_folder = $_GET['is_folder'];
            if (isset($_GET['parent_id'])) {
                $model->parent_id = $_GET['parent_id'];
                $model->parent = Material::model()->findByPk($model->parent_id);
            }            
			$this->renderPartial('_form',array('model'=>$model), false, true);
        }
		else
			$this->render('create',array('model'=>$model));
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

		if(isset($_POST['Material']))
		{
			$model->attributes=$_POST['Material'];
            if (empty($_POST['parent_name'])) $model->parent_id = 0;
			if($model->save()) {
				if(Yii::app()->request->isAjaxRequest){
					echo 'success';
					Yii::app()->end();
				}
				else {
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('_form',array('model'=>$model), false, true);
        
		else
			$this->render('update',array('model'=>$model));
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

			echo 'success';
            Yii::app()->end();
            
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
			//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
        
        $showList = true;
        $breadcrumbs = '';
        
        if ($id != 0) {
            if ($model = $this->loadModel($id)){
                $breadcrumbs = $model->breadcrumbs();
                if (!$model->isGroup()) $showList = false;
            }
        }
        
        if ($showList) {
            $dataProvider=new CActiveDataProvider('Material', array(
                'criteria'=>array(
                    'condition'=>'parent_id = '.$id,
                    'order'=>'is_folder DESC, name',
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
                'breadcrumbs'=>$breadcrumbs,
                'parent_id'=>$id,
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
		$model=new Material('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Material']))
			$model->attributes=$_GET['Material'];

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
		$model=Material::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='material-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
