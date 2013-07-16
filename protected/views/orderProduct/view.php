<?php
$this->breadcrumbs=array(
	'Order Products'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderProduct','url'=>array('index')),
	array('label'=>'Create OrderProduct','url'=>array('create')),
	array('label'=>'Update OrderProduct','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete OrderProduct','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderProduct','url'=>array('admin')),
);
?>

<h1>View OrderProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'order_id',
		'count',
		'vcost',
		'fcost',
		'cost',
		'profit',
	),
)); ?>
