<?php
$this->breadcrumbs=array(
	'Order Products',
);

$this->menu=array(
	array('label'=>'Create OrderProduct','url'=>array('create')),
	array('label'=>'Manage OrderProduct','url'=>array('admin')),
);
?>

<h1>Order Products</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
