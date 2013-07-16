<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'count',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'profit',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fcost',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'vcost',array('class'=>'span5','maxlength'=>10)); ?>

	<?php
    $processes = new CArrayDataProvider($model->processes);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$processes,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'name', 'header'=>'Технологические процессы'),
            //array('name'=>'price_count', 'header'=>'Количество'),
            array('value'=>'sprintf("%.6f",$data->cost["var"])', 'header'=>'Цена'),
            array('value'=>'sprintf("%.6f",$data->cost["fix"])', 'header'=>'Соп. техпроцессы'),
            //array('value'=>'sprintf("%.6f",$data->cost)', 'header'=>'Сумма'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view' => array(
                        'url'=>'Yii::app()->createUrl("productionProcess/view", array("id"=>$data->id))',  
                    ),
                ),

            )
        ),
    ));
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        //'type'=>'link',
        'label'=>'Техпроцесс',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("product/create", array("parent_id"=>$model->parent_id)),
    ));
    ?>

    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

    

<?php $this->endWidget(); ?>
