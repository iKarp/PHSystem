<?php
$this->breadcrumbs=array(
	'Production Process Materials',
);

$this->menu=array(
	array('label'=>'Create ProductionProcessMaterial','url'=>array('create')),
	array('label'=>'Manage ProductionProcessMaterial','url'=>array('admin')),
);
?>

<h1>Production Process Materials</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
