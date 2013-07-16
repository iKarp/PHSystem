<?php
$this->breadcrumbs=array(
	'Fin Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FinOrder','url'=>array('index')),
	array('label'=>'Manage FinOrder','url'=>array('admin')),
);
?>

<h1>Create FinOrder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>