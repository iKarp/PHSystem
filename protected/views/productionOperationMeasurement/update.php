<?php
$this->breadcrumbs=array(
	'Production Operation Measurements'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionOperationMeasurement','url'=>array('index')),
	array('label'=>'Create ProductionOperationMeasurement','url'=>array('create')),
	array('label'=>'View ProductionOperationMeasurement','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionOperationMeasurement','url'=>array('admin')),
);
?>

<h1>Update ProductionOperationMeasurement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>