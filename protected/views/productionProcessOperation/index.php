<?php
$this->breadcrumbs=array(
	'Production Process Operations',
);

$this->menu=array(
	array('label'=>'Create ProductionProcessOperation','url'=>array('create')),
	array('label'=>'Manage ProductionProcessOperation','url'=>array('admin')),
);
?>

<h1>Production Process Operations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
