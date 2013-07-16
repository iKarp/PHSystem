<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id_organization,
);

$this->menu=array(
	array('label'=>'List Customer','url'=>array('index')),
	array('label'=>'Create Customer','url'=>array('create')),
	array('label'=>'Update Customer','url'=>array('update','id'=>$model->id_organization)),
	array('label'=>'Delete Customer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_organization),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer','url'=>array('admin')),
);
?>

<h1>View Customer #<?php echo $model->id_organization; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_organization',
		'name_organization',
		'adress_uri',
		'adress_fact',
		'telephone',
		'ogrn',
		'rashet_account',
		'bank_name',
		'bank_kor_account',
		'bank_bik',
		'persons_id',
		'inn',
	),
)); ?>
