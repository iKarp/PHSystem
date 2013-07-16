<?php
$this->breadcrumbs=array(
	'Products',
);

$this->menu=array(
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h3>Справочник продуктов</h3>
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
                location.href = "'.Yii::app()->createUrl('product/index').'&parent_id="+$.fn.yiiGridView.getSelection(id);
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
                'header'=>'Продукты',
            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                //'template'=>'{view}{update}',
                /*'buttons'=>array(
                    'view' => array(
                        'url'=>'Yii::app()->createUrl("product/view", array("id"=>$data->id))',  
                    ),
                ),*/

            )
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        //'type'=>'link',
        'label'=>'Продукт',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("product/create", array("parent_id"=>$model->parent_id)),
    ));
?>