<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Material','url'=>array('index')),
	array('label'=>'Create Material', 'url'=>array('create'), 'linkOptions'=>array(
		'ajax' => array(
			'url'=>$this->createUrl('create'),
			'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
		),
	)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('material-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>

<h1>Manage Materials</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'material-grid',
	'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent_id',
		'is_folder',
		'is_active',
		'name',
		'description',
		/*
		'tag',
		'price',
		'measurement_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons' => array(
				'update' => array(
					'click'=>'function(){
						var url = $(this).attr("href");
						$.get(url, function(r){
							$("#TBDialogCrud").html(r).modal("show");
						});
						return false;
					}',
				),
				'view' => array(
					'click'=>'function(){
						var url = $(this).attr("href");
						$.get(url, function(r){
							$("#TBDialogCrud").html(r).modal("show");
						});
						return false;
					}',
				),
			),
		),
	),
)); ?>
