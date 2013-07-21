
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>

<h3>Справочник материалов</h3>
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
                location.href = "'.Yii::app()->createUrl('material/index').'&parent_id="+$.fn.yiiGridView.getSelection(id);
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
                'name'=>'price',
                'header'=>'Цена, руб',
                'value'=>'($data->is_folder) ? "" : $data->price',
            ),
            array(
                'name'=>'measurement.name',
                'header'=>'Ед. изм.',
            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update}',
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
                        'url'=>'#',
                        'linkOptions'=>array(
                            'ajax' => array(
                                'url'=>Yii::app()->createUrl("material/create", array("parent_id"=>$parent_id,"is_folder"=>0)),
                                'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
                            ),
                        ),
                    ),
                    array(
                        'label'=>'Группу',
                        'url'=>'#',
                        'linkOptions'=>array(
                            'ajax' => array(
                                'url'=>Yii::app()->createUrl("material/create", array("parent_id"=>$parent_id,'is_folder'=>1)),
                                'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ));
?>
