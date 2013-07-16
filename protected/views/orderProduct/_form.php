<?php

    Yii::app()->clientScript->registerScript('calculateCost', "
        $('#count, #profit').change(function(){
            var count = parseInt($('#count').val());
            var vcost = parseFloat($('#vcost').val());
            var fcost = parseFloat($('#fcost').val());
            var profit = parseFloat($('#profit').val())/100. + 1;
            var cost = (( count * vcost + fcost ) * profit).toFixed(2);
            $('#cost').val(cost);
            return false;
        });
        $('#cost').change(function(){
            var count = parseInt($('#count').val());
            var vcost = parseFloat($('#vcost').val());
            var fcost = parseFloat($('#fcost').val());
            var cost = parseFloat($('#cost').val());
            var profit = ((cost / ( count * vcost + fcost ) - 1)*100).toFixed(2);
            $('#profit').val(profit);
            return false;
        });
    ");

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-product-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->hiddenField($model,'order_id'); ?>

	<?php echo $form->hiddenField($model,'fcost',array('id'=>'fcost')); ?>

    <?php echo $form->hiddenField($model,'vcost',array('id'=>'vcost')); ?>

    <?php if ($model->isNewRecord) {
    
        echo '<div class="control-group">';
        echo $form->label($model, 'product_id', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo '<div class="input-append">';
        $this->widget('CAutoComplete', array(
                    'name'=>'product_name',
                    'url'=>$this->createUrl('product/autoCompleteLookup'),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>2,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'input-xxlarge'),
                    'methodChain'=>".result(function(event,item){
                        \$(\"#OrderProduct_product_id\").val(item[1]);
                        \$(\"#fcost\").val(item[2]);
                        \$(\"#vcost\").val(item[3]);
                    })",
        ));
        echo $form->hiddenField($model,'product_id');
        echo '<a class="add-on" style="cursor:pointer" href="'.$this->createUrl('product').'"><i class="icon-search"></i></a>';
        echo '</div>';
        echo '<p class="help-block">Выберите продукт из списка</p>';
        echo '</div>';
        echo '</div>';
    
    }?>

    <?php echo $form->textFieldRow($model,'count',array('class'=>'span5','id'=>'count')); ?>

	<?php echo $form->textFieldRow($model,'profit',array('class'=>'span5','maxlength'=>10,'id'=>'profit')); ?>

    <?php echo $form->textFieldRow($model,'cost',array('class'=>'span5','maxlength'=>10,'id'=>'cost')); ?>

	    <?php if ($processes) {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$processes,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'name', 'header'=>'Технологические процессы'),
            array('name'=>'var', 'header'=>'Количество'),
            //'fcost',
           // 'vcost',
           // 'cost',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update} {printTechcard} {delete}',
                'buttons'=>array(
                    'update' => array(
                        'label'=>'Изменить',
                        'icon'=>'pencil',
                        'url'=>'Yii::app()->createUrl("productionProcess/update", array("id"=>$data->id))',  
                    ),
                    'printTechcard' => array(
                        'label'=>'Печать технологической карты',
                        'icon'=>'print',
                        'url'=>'Yii::app()->createUrl("order/printTechcard", array("id"=>$data->id))',
                    
                    ),
                ),
                'htmlOptions'=>array('style'=>'width: 50px'),
            )
        ),
    ));
    } ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Добавить' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
