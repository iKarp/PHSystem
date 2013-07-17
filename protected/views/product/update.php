<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Product','url'=>array('index')),
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'View Product','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h4>Изменение <?php
        if ($model->is_folder == 1) echo 'группы';
        elseif ($model->is_semiproduct == 1) echo 'полуфабриката';
        else echo 'продукта';
    ?></h4>

<br />

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>