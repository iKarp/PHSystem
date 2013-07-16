<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Process','url'=>array('index')),
	array('label'=>'Create Process','url'=>array('create')),
	array('label'=>'View Process','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Process','url'=>array('admin')),
);
?>

<h1>Update Process <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>