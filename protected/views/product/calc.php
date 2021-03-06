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

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$materials,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'name', 'header'=>'Материалы'),
            array('name'=>'measurement', 'header'=>'Ед. изм.'),
            array('name'=>'count', 'header'=>'Кол-во'),
            array('name'=>'price', 'header'=>'Цена', 'htmlOptions'=>array('width'=>'100')),
            array('name'=>'total', 'header'=>'Сумма', 'htmlOptions'=>array('width'=>'120')),
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$operations,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'name', 'header'=>'Операции'),
            array('name'=>'measurement', 'header'=>'Ед. изм.'),
            array('name'=>'count', 'header'=>'Кол-во'),
            array('name'=>'price', 'header'=>'Цена', 'htmlOptions'=>array('width'=>'100')),
            array('name'=>'total', 'header'=>'Сумма', 'htmlOptions'=>array('width'=>'120')),
            //array('value'=>'sprintf("%.6f",$data->semiproduct->cost["total"])', 'header'=>'Сумма', 'htmlOptions'=>array('width'=>'120')),
        ),
    ));
?>


<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'К продукту',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("product/view", array("id"=>$model->id)),
    ));
?>
<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'К списку',
        'icon'=>'list',
        'url'=>Yii::app()->createUrl("product/index", array("parent_id"=>$model->parent_id)),
    ));
?>