<?php
$this->breadcrumbs=array(
	'Product Semiproducts',
);

$this->menu=array(
	array('label'=>'Create ProductSemiproduct','url'=>array('create')),
	array('label'=>'Manage ProductSemiproduct','url'=>array('admin')),
);
?>

<h1>Product Semiproducts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
