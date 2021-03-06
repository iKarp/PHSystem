<?php if(!Yii::app()->request->isAjaxRequest): ?>
<?php
$this->breadcrumbs=array(
	'Production Process Materials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductionProcessMaterial','url'=>array('index')),
	array('label'=>'Create ProductionProcessMaterial','url'=>array('create')),
	array('label'=>'Update ProductionProcessMaterial','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductionProcessMaterial','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionProcessMaterial','url'=>array('admin')),
);
?>

<h1>View ProductionProcessMaterial #<?php echo $model->id; ?></h1>
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
		'price_id',
		'material_id',
		'material_count',
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