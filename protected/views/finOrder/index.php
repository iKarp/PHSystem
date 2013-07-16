<?php
$this->breadcrumbs=array(
	'Fin Orders',
);

$this->menu=array(
	array('label'=>'Create FinOrder','url'=>array('create')),
	array('label'=>'Manage FinOrder','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fin-order-grid', {
		data: $(this).serialize()
	});
	return false;
});
$('#reportrange').daterangepicker(
    {
        ranges: {
            'Today': ['today', 'today'],
            'Yesterday': ['yesterday', 'yesterday'],
            'Last 7 Days': [Date.today().add({ days: -6 }), 'today'],
            'Last 30 Days': [Date.today().add({ days: -29 }), 'today'],
            'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
            'Last Month': [Date.today().moveToFirstDayOfMonth().add({ months: -1 }), Date.today().moveToFirstDayOfMonth().add({ days: -1 })]
        }
    },
    function(start, end) {
        $('#reportrange span').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
    }
);
");
?>

<h3>Проводки</h3>

<?php echo CHtml::link('Фильтр','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped condensed',
    'id'=>'fin-order-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'template'=>"{items}{pager}",
    'enablePagination' => true,
    //'filter'=>$order->search(),
    'columns'=>array(
        array('name'=>'id', 'value'=>'$data->face[name]."-".$data->id', 'header'=>'Номер'),
        array('name'=>'cdate', 'header'=>'Создан'),
        array('name'=>'customer.name_organization', 'header'=>'Контрагент'),
        array('name'=>'value', 'header'=>'Сумма'),
        array('name'=>'comment', 'header'=>'Комментарий', 'htmlOptions'=>array('width'=>'400px')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        )
    ),
)); ?>
