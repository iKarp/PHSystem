<?php
$this->breadcrumbs=array(
	'Production Processes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionProcess','url'=>array('index')),
	array('label'=>'Create ProductionProcess','url'=>array('create')),
	array('label'=>'View ProductionProcess','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionProcess','url'=>array('admin')),
);
?>

<h4>Изменение технологического процесса</h4>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>