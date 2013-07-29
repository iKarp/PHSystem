<?php
$this->breadcrumbs=array(
	'Production Process Operations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionProcessOperation','url'=>array('index')),
	array('label'=>'Create ProductionProcessOperation','url'=>array('create')),
	array('label'=>'View ProductionProcessOperation','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductionProcessOperation','url'=>array('admin')),
);
?>

<h1>Update ProductionProcessOperation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>