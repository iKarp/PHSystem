<?php
$this->breadcrumbs=array(
	'Fin Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinOrder','url'=>array('index')),
	array('label'=>'Create FinOrder','url'=>array('create')),
	array('label'=>'View FinOrder','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage FinOrder','url'=>array('admin')),
);
?>

<h1>Update FinOrder <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>