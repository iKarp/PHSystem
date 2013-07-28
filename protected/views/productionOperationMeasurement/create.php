<?php
$this->breadcrumbs=array(
	'Production Operation Measurements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionOperationMeasurement','url'=>array('index')),
	array('label'=>'Manage ProductionOperationMeasurement','url'=>array('admin')),
);
?>

<h1>Create ProductionOperationMeasurement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>