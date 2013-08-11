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
    if ($model->isGroup()) echo 'группы';
    elseif ($model->isSemiproduct()) echo 'полуфабриката';
    else echo 'продукта';
?></h4>

<h3><?php echo $model->name; ?></h3>

<?php
    $fields = array(
		array(
            'label'=>($model->isSemiproduct()) ? 'Тех. экземпляры' : 'Плановый тираж',
            'value'=>$model->count,
        ),
		'cost.fix',
		'cost.var',
	);
    if ($model->isProduct()) $fields[] = 'cost.total';
    $this->widget('bootstrap.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>$fields,
    ));
?>


<?php if ($model->isProduct()): ?>

    <?php
            $semiproducts = new CArrayDataProvider($model->semiproducts);
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped condensed',
                'dataProvider'=>$semiproducts,
                'template'=>"{items}",
                'columns'=>array(
                    array('name'=>'label', 'header'=>'Компоненты'),
                    array('name'=>'semiproduct.name', 'header'=>'Полуфабрикат'),
                    array('name'=>'count', 'header'=>'Кол-во', 'htmlOptions'=>array('width'=>'80')),
                    array('value'=>'sprintf("%.6f",$data->semiproduct->cost["var"])', 'header'=>'Цена', 'htmlOptions'=>array('width'=>'100')),
                    array('value'=>'sprintf("%.6f",$data->semiproduct->cost["fix"])', 'header'=>'Техпроцесс', 'htmlOptions'=>array('width'=>'120')),
                    array('value'=>'sprintf("%.6f",$data->semiproduct->cost["total"])', 'header'=>'Сумма', 'htmlOptions'=>array('width'=>'120')),
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view' => array(
                                'url'=>'Yii::app()->createUrl("product/view", array("id"=>$data->semiproduct->id))',  
                            ),
                        ),
                    ),
                ),
            ));
    ?>

<?php endif; ?>

<?php
    $processes = new CArrayDataProvider($model->processes);
    $colums = array(array('name'=>'process.name', 'header'=>'Технологические процессы'));
    if ($model->isProduct()) $colums[] = array('name'=>'count', 'header'=>'Кол-во', 'htmlOptions'=>array('width'=>'80'));
    $colums[] = array('value'=>'sprintf("%.6f",$data->process->cost["var"])', 'header'=>'Цена', 'htmlOptions'=>array('width'=>'100'));
    $colums[] = array('value'=>'sprintf("%.6f",$data->process->cost["fix"])', 'header'=>'Техпроцесс', 'htmlOptions'=>array('width'=>'120'));
    if ($model->isProduct()) $colums[] = array('value'=>'sprintf("%.6f",$data->process->cost["total"])', 'header'=>'Сумма', 'htmlOptions'=>array('width'=>'120'));
    $colums[] = array(
        'class'=>'bootstrap.widgets.TbButtonColumn',
        'template'=>'{view}',
        'buttons'=>array(
            'view' => array(
                'url'=>'Yii::app()->createUrl("productionProcess/view", array("id"=>$data->process->id))',
            ),
        ),
    );
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$processes,
        'template'=>"{items}",
        'columns'=>$colums,
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
        'label'=>'Калькуляция',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("product/consist", array("id"=>$model->id)),
    ));
?>
<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'К списку',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("product/index", array("parent_id"=>$model->parent_id)),
    ));
?>