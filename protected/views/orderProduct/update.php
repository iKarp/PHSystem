<?php
$this->breadcrumbs=array(
	'Order Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderProduct','url'=>array('index')),
	array('label'=>'Create OrderProduct','url'=>array('create')),
	array('label'=>'View OrderProduct','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage OrderProduct','url'=>array('admin')),
);
?>

<h4>Продукт <?php echo $model->product->name; ?> к заказу <?php echo $model->order->num; ?></h4>
<br />
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>