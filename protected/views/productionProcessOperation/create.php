<?php
$this->breadcrumbs=array(
	'Production Process Operations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionProcessOperation','url'=>array('index')),
	array('label'=>'Manage ProductionProcessOperation','url'=>array('admin')),
);
?>

<h1>Create ProductionProcessOperation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>