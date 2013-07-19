<?php
$this->breadcrumbs=array(
	'Production Processes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductionProcess','url'=>array('index')),
	array('label'=>'Create ProductionProcess','url'=>array('create')),
	array('label'=>'Update ProductionProcess','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductionProcess','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionProcess','url'=>array('admin')),
);
?>

<h4>Плановая калькуляция технологического процесса</h4>
<h3><?php echo $model->name; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'cost.materials',
        'cost.overhead',
        'cost.operations',
        'cost.taxSalary',
        'cost.var',
        'cost.fix',
    ),
)); ?>

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$materials,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'material.name', 'header'=>'Материалы'),
            array('name'=>'material.measurement.name', 'header'=>'Ед. изм.'),
            array('name'=>'material_count', 'header'=>'Кол-во'),
            array('name'=>'material.price', 'header'=>'Цена'),
            array('value'=>'sprintf("%.6f",$data->cost)', 'header'=>'Сумма'),
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$operations,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'operation.name', 'header'=>'Операции'),
            array('name'=>'operation.measurement.name', 'header'=>'Персонал'),
            array('name'=>'work_count', 'header'=>'Кол-во'),
            array('name'=>'operation.measurement.cost', 'header'=>'Стоимость н/ч'),
            array('value'=>'sprintf("%.6f",1/$data->operation->hours)', 'header'=>'Выработка в час'),
            array('value'=>'sprintf("%.6f",$data->cost)', 'header'=>'Сумма'),
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$subprocesses,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'process.name', 'header'=>'Сопутствующие технологические процессы'),
            array('name'=>'price_count', 'header'=>'Количество'),
            array('value'=>'sprintf("%.6f",$data->process->cost["var"])', 'header'=>'Цена'),
            array('value'=>'sprintf("%.6f",$data->process->cost["fix"])', 'header'=>'Соп. техпроцессы'),
            array('value'=>'sprintf("%.6f",$data->cost)', 'header'=>'Сумма'),
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Изменить',
        'icon'=>'pencil',
        'url'=>Yii::app()->createUrl("productionProcess/update", array("id"=>$model->id)),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'К списку',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("productionProcess/index", array("parent_id"=>$model->parent_id)),
    ));
?>
