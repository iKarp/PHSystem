<?php
$this->breadcrumbs=array(
	'Product Production Processes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductProductionProcess','url'=>array('index')),
	array('label'=>'Create ProductProductionProcess','url'=>array('create')),
	array('label'=>'View ProductProductionProcess','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductProductionProcess','url'=>array('admin')),
);
?>

<h1>Update ProductProductionProcess <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>