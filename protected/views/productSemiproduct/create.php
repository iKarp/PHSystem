<?php
$this->breadcrumbs=array(
	'Product Semiproducts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductSemiproduct','url'=>array('index')),
	array('label'=>'Manage ProductSemiproduct','url'=>array('admin')),
);
?>

<h1>Create ProductSemiproduct</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>