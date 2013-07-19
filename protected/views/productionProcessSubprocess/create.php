<?php
$this->breadcrumbs=array(
	'Production Process Subprocesses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionProcessSubprocess','url'=>array('index')),
	array('label'=>'Manage ProductionProcessSubprocess','url'=>array('admin')),
);
?>

<h1>Create ProductionProcessSubprocess</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>