<?php
$this->breadcrumbs=array(
	'Product Production Processes',
);

$this->menu=array(
	array('label'=>'Create ProductProductionProcess','url'=>array('create')),
	array('label'=>'Manage ProductProductionProcess','url'=>array('admin')),
);
?>

<h1>Product Production Processes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
