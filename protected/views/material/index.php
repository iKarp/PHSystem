<?php
$this->breadcrumbs=array(
	'Materials',
);

$this->menu=array(
	array('label'=>'Create Material','url'=>array('create')),
	array('label'=>'Manage Material','url'=>array('admin')),
);
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>

<h3>Справочник материалов</h3>
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
                var url = "'.Yii::app()->createUrl('material/update').'&id="+$.fn.yiiGridView.getSelection(id);
                $.get(url, function(r){
                    $("#TBDialogCrud").html(r.id).modal("show");
                });
                return false;
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
                'header'=>'Материалы',
            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update}{delete}',
                'buttons' => array(
                    'update' => array(
                        'click'=>'function(){
                            var url = $(this).attr("href");
                            $.get(url, function(r){
                                $("#TBDialogCrud").html(r).modal("show");
                            });
                            return false;
                        }',
                    ),
                ),
            )
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'buttons'=>array(
            array(
                'label'=>'Добавить',
                'icon'=>'plus',
                'items'=>array(
                    array(
                        'label'=>'Материал',
                        'url'=>Yii::app()->createUrl("material/create", array("parent_id"=>$model->parent_id)),
                        'linkOptions'=>array(
                            'ajax' => array(
                                'url'=>$this->createUrl('create'),
                                'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
                            ),
                        ),
                    ),
                    array('label'=>'Группу', 'url'=>Yii::app()->createUrl("material/create", array("parent_id"=>$model->parent_id))),
                ),
            ),
        ),
    ));
?>
