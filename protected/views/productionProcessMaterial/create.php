<?php
$this->breadcrumbs=array(
	'Production Process Materials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionProcessMaterial','url'=>array('index')),
	array('label'=>'Manage ProductionProcessMaterial','url'=>array('admin')),
);
?>

<h1>Create ProductionProcessMaterial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>