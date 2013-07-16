<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<?php
    $products = new CArrayDataProvider($model->products);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$products,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'product.name', 'header'=>'Продукты','htmlOptions'=>array('style'=>'width: 60%'),),
            array('name'=>'count', 'header'=>'Кол-во, шт'),
            array('header'=>'Цена/шт., руб', 'value'=>'sprintf("%10.4f",$data->cost/$data->count)'),
            array('name'=>'cost', 'header'=>'Стоимость, руб'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update} {printTechcard} {delete}',
                'buttons'=>array(
                    'update' => array(
                        'label'=>'Изменить',
                        'icon'=>'pencil',
                        'url'=>'Yii::app()->createUrl("orderProduct/update", array("id"=>$data->id))',  
                    ),
                    'printTechcard' => array(
                        'label'=>'Печать технологической карты',
                        'icon'=>'print',
                        'url'=>'Yii::app()->createUrl("order/printTechcard", array("id"=>$data->id))',
                    
                    ),
                    'delete' => array(
                        'label'=>'Удалить',
                        'icon'=>'trash',
                        'url'=>'Yii::app()->createUrl("orderProduct/delete", array("id"=>$data->id))',
                    
                    ),
                ),
                'htmlOptions'=>array('style'=>'width: 50px'),
            )
        ),
    ));
?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        //'type'=>'link',
        'label'=>'Продукт',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("orderProduct/create", array("order_id"=>$model->id)),
    ));
?>