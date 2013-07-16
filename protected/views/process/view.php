<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Process','url'=>array('index')),
	array('label'=>'Create Process','url'=>array('create')),
	array('label'=>'Update Process','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Process','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Process','url'=>array('admin')),
);
?>

<h1>View Process #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'is_folder',
		'name',
		'price',
		'parent_id',
		'is_active',
		'indx',
		'code',
		'comment_enabled',
		'amortization',
		'accruals_zp',
		'oncost',
		'tax',
		'balance',
		'purchase',
		'efficiency',
		'price_cost',
	),
)); ?>
