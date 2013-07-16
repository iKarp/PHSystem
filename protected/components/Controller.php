<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    public function groupView(&$contr, $modelName, $parentID)
	{
    
        $id = isset($parentID) ? $parentID : 0;
		
        if ($id != 0) $model = $contr->loadModel($id);
        
        if ($model->is_folder || $id == 0) {
            $dataProvider=new CActiveDataProvider($modelName, array(
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
            //else
            $contr->render('index',array(
                'dataProvider'=>$dataProvider,
                'breadcrumbs'=>$breadcrumbs,
            ));
        }
        else {
            $contr->redirect(array('view','id'=>$id));
        }        
	}
    
}