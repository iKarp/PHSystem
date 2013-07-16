<?php
$this->breadcrumbs=array(
	'Fin Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FinOrder','url'=>array('index')),
	array('label'=>'Create FinOrder','url'=>array('create')),
	array('label'=>'Update FinOrder','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete FinOrder','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinOrder','url'=>array('admin')),
);
?>

<h1>View FinOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'data_id',
		'value',
		'agent_str',
		'comment',
		'cdate',
		'doc_type',
		'agent_id',
		'face_id',
		'type_id',
		'number_1c',
	),
)); ?>
