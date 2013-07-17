<?php
$this->breadcrumbs=array(
	'Product Production Processes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductProductionProcess','url'=>array('index')),
	array('label'=>'Manage ProductProductionProcess','url'=>array('admin')),
);
?>

<h1>Create ProductProductionProcess</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>