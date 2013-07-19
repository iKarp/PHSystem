<?php
$this->breadcrumbs=array(
	'Product Semiproducts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductSemiproduct','url'=>array('index')),
	array('label'=>'Create ProductSemiproduct','url'=>array('create')),
	array('label'=>'View ProductSemiproduct','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductSemiproduct','url'=>array('admin')),
);
?>

<h1>Update ProductSemiproduct <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>