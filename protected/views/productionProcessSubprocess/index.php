<?php
$this->breadcrumbs=array(
	'Production Process Subprocesses',
);

$this->menu=array(
	array('label'=>'Create ProductionProcessSubprocess','url'=>array('create')),
	array('label'=>'Manage ProductionProcessSubprocess','url'=>array('admin')),
);
?>

<h1>Production Process Subprocesses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
