<?php
$this->breadcrumbs=array(
	'Production Operations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionOperation','url'=>array('index')),
	array('label'=>'Manage ProductionOperation','url'=>array('admin')),
);
?>

<h1>Create ProductionOperation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>