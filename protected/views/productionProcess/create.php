<?php
$this->breadcrumbs=array(
	'Production Processes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionProcess','url'=>array('index')),
	array('label'=>'Manage ProductionProcess','url'=>array('admin')),
);
?>

<h1>Create ProductionProcess</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>