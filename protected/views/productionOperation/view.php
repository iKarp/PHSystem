<?php
$this->breadcrumbs=array(
	'Production Operations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductionOperation','url'=>array('index')),
	array('label'=>'Create ProductionOperation','url'=>array('create')),
	array('label'=>'Update ProductionOperation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductionOperation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionOperation','url'=>array('admin')),
);
?>

<h1>View ProductionOperation #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'is_folder',
		'is_active',
		'name',
		'description',
		'tag',
		'hours',
		'measurement_id',
	),
)); ?>
