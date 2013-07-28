<?php if(!Yii::app()->request->isAjaxRequest): ?>
<?php
$this->breadcrumbs=array(
	'Production Operation Measurements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductionOperationMeasurement','url'=>array('index')),
	array('label'=>'Create ProductionOperationMeasurement','url'=>array('create')),
	array('label'=>'Update ProductionOperationMeasurement','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductionOperationMeasurement','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionOperationMeasurement','url'=>array('admin')),
);
?>

<h1>View ProductionOperationMeasurement #<?php echo $model->id; ?></h1>
<?php endif; ?>

<?php if(Yii::app()->request->isAjaxRequest): ?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4>View People #<?php echo $model->id; ?></h4>
</div>

<div class="modal-body">
<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'cost',
	),
)); ?>

<?php if(Yii::app()->request->isAjaxRequest): ?>
</div>

<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Закрыть',
        'url'=>'#',
        'htmlOptions'=>array(
			'id'=>'btn-'.mt_rand(),
			'data-dismiss'=>'modal'
		),
    )); ?>
</div>

<?php endif; ?>