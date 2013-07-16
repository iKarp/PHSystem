<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Product','url'=>array('index')),
	array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h4>Создание продукта</h4>

<br />

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>