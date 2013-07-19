<?php
$this->breadcrumbs=array(
	'Production Process Subprocesses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionProcessSubprocess','url'=>array('index')),
	array('label'=>'Create ProductionProcessSubprocess','url'=>array('create')),
	array('label'=>'View ProductionProcessSubprocess','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionProcessSubprocess','url'=>array('admin')),
);
?>

<h1>Update ProductionProcessSubprocess <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>