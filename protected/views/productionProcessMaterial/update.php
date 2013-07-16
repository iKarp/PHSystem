<?php
$this->breadcrumbs=array(
	'Production Process Materials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionProcessMaterial','url'=>array('index')),
	array('label'=>'Create ProductionProcessMaterial','url'=>array('create')),
	array('label'=>'View ProductionProcessMaterial','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionProcessMaterial','url'=>array('admin')),
);
?>

<h4>Используемый материал</h4>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>