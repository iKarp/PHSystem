<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

    <div class="control-group ">
            <?php echo $form->label($model, 'parent_id', array('class'=>'control-label')); ?>
            <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'parent_name',
                    'url'=>$this->createUrl('product/autoCompleteLookup'),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5','placeholder'=>$model->parent->name),
                    'methodChain'=>".result(function(event,item){\$(\"#Product_parent_id\").val(item[1]);})",
                )); ?>
                <?php echo $form->hiddenField($model,'parent_id'); ?>
            </div>
        </div>

    <?php if ($model->isProduct()): ?>

        <?php echo $form->textFieldRow($model,'count',array('class'=>'span5','maxlength'=>11)); ?>

        <?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

        <?php echo $form->textFieldRow($model,'profit',array('class'=>'span5','maxlength'=>10)); ?>

        <?php echo $form->textFieldRow($model,'fcost',array('class'=>'span5','maxlength'=>10)); ?>

        <?php echo $form->textFieldRow($model,'vcost',array('class'=>'span5','maxlength'=>10)); ?>

    <?php else: ?>

        <?php echo $form->textFieldRow($model,'count',array(
            'class'=>'span5',
            'maxlength'=>11,
            'labelOptions' => array('label' => 'Тех. экземпляры, шт')));
        ?>

    <?php endif; ?>

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
        'buttonType'=>'ajaxButton',
        'label'=>'Добавить',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("productProductionProcess/create", array("product_id"=>$model->id)),
        'ajaxOptions'=>array(
			'url'=>$this->createUrl('create'),
			'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
		),
    ));
    ?>

    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
        <?php if (!$model->isNewRecord) $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'type'=>'danger',
			'label'=>'Удалить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
