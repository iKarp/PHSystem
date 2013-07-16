<?php
$this->breadcrumbs=array(
	'Production Operations',
);

$this->menu=array(
	array('label'=>'Create ProductionOperation','url'=>array('create')),
	array('label'=>'Manage ProductionOperation','url'=>array('admin')),
);
?>

<h1>Production Operations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
