<?php
$this->breadcrumbs=array(
	'Production Operations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionOperation','url'=>array('index')),
	array('label'=>'Create ProductionOperation','url'=>array('create')),
	array('label'=>'View ProductionOperation','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionOperation','url'=>array('admin')),
);
?>

<h1>Update ProductionOperation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>