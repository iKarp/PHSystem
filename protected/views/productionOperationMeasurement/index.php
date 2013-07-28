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
                'name'=>'name',
                'header'=>'Специальности',
            ),
            array(
                'name'=>'cost',
                'header'=>'Цена н/ч',
                //'value'=>'($data->is_folder) ? "" : $data->price',
            ),
            /*array(
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
            )*/
        ),
    ));
?>