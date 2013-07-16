<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h3>Заказы в оформлении</h3>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}{pager}",
    'enablePagination' => true,
    //'filter'=>$order->search(),
    'columns'=>array(
        array('name'=>'performer.name', 'header'=>'Номер'),
        array('name'=>'cdate', 'header'=>'Создан'),
        array('name'=>'customer.name_organization', 'header'=>'Заказчик'),
        array('name'=>'sum', 'header'=>'Сумма'),
        ($showButtons) ? array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ) : array('name'=>'', 'header'=>''),
    ),
)); ?>