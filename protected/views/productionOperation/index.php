<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>

<h3>Справочник операций</h3>
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
                location.href = "'.Yii::app()->createUrl('productionOperation/index').'&parent_id="+$.fn.yiiGridView.getSelection(id);
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
                'header'=>'Операции',
            ),
            array(
                'name'=>'measurement.name',
                'header'=>'Персонал',
                //'value'=>'($data->is_folder) ? "" : $data->price',
            ),
            array(
                'name'=>'productivity',
                'header'=>'Выработка в час, шт',
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
