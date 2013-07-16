<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Process','url'=>array('index')),
	array('label'=>'Manage Process','url'=>array('admin')),
);
?>

<h1>Create Process</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>