<?php
$this->breadcrumbs=array(
	'Production Processes',
);

$this->menu=array(
	array('label'=>'Create ProductionProcess','url'=>array('create')),
	array('label'=>'Manage ProductionProcess','url'=>array('admin')),
);
?>

<h3>Справочник технологических процессов</h3>
<div><?php echo $path; ?></div>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink'=>'',
    'links'=>$breadcrumbs,
)); ?>

<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'test-grid',
        'type'=>'striped condensed',
        'dataProvider'=>$dataProvider,
        'template'=>"{items}{pager}",
        'enablePagination' => true,
        'selectableRows'=>1,
        'selectionChanged'=>'
            function(id){
                location.href = "'.Yii::app()->createUrl('productionProcess/index').'&parent_id="+$.fn.yiiGridView.getSelection(id);
            }
        ',
        //'filter'=>$order->search(),
        'columns'=>array(
            array(
                'name'=>'is_folder',
                'type'=>'raw',
                'value'=>'($data->is_folder) ? "<i class=\"icon-folder-open\"></i>" : "<i class=\"icon-th-large\"></i>"',
                'header'=>'',
                'htmlOptions'=>array('width'=>'20'),
            ),
            array(
                'name'=>'name',
                'header'=>'Технологические процессы',
            ),
            /*array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view' => array(
                        'url'=>'Yii::app()->createUrl("productionProcess/view", array("parent_id"=>$data->id))',  
                    ),
                ),

            )*/
        ),
    ));
?>