<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Product','url'=>array('index')),
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'Update Product','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Product','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h4>Плановая калькуляция <?php
    if ($model->is_folder == 1) echo 'группы';
    elseif ($model->is_semiproduct == 1) echo 'полуфабриката';
    else echo 'продукта';
?></h4>

<h3><?php echo $model->name; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'count',
		'price',
		'profit',
		'fcost',
		'vcost',
	),
)); ?>

<?php
    $processes = new CArrayDataProvider($model->processes);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$processes,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'name', 'header'=>'Технологические процессы'),
            /*array('name'=>'price_count', 'header'=>'Количество'),
            array('value'=>'sprintf("%.6f",$data->process->cost["var"])', 'header'=>'Цена'),
            array('value'=>'sprintf("%.6f",$data->process->cost["fix"])', 'header'=>'Соп. техпроцессы'),
            array('value'=>'sprintf("%.6f",$data->cost)', 'header'=>'Сумма'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view' => array(
                        'url'=>'Yii::app()->createUrl("productionProcess/view", array("id"=>$data->price_id))',  
                    ),
                ),

            )*/
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Изменить',
        'icon'=>'pencil',
        'url'=>Yii::app()->createUrl("product/update", array("id"=>$model->id)),
    ));
?>
<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'К списку',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("product/index", array("parent_id"=>$model->parent_id)),
    ));
?>