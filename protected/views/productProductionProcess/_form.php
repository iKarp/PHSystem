<?php if (Yii::app()->request->isAjaxRequest): ?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4><?php echo $model->isNewRecord ? 'Добавление технологического процесса' : 'Изменение технологического процесса' ?></h4>
</div>

<div class="modal-body">
<?php endif; ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-production-process-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'product_id'); ?>
    <?php echo $form->uneditableRow($model->product,'name',array(
        'class'=>'span5',
        'maxlength'=>11,
        'labelOptions' => array('label' => 'Продукт'),
    )); ?>

	<div class="control-group ">
            <?php echo $form->label($model, 'calculation_id', array('class'=>'control-label')); ?>
            <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'calculation_name',
                    'url'=>$this->createUrl('productionProcess/autoCompleteLookup'),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5','placeholder'=>'Выберите из списка'),
                    'value'=>$model->process->name,
                    'methodChain'=>".result(function(event,item){\$(\"#ProductProductionProcess_calculation_id\").val(item[1]);})",
                )); ?>
                <?php echo $form->hiddenField($model,'calculation_id'); ?>
            </div>
        </div>

    <?php echo $form->textFieldRow($model,'count',array('class'=>'span5')); ?>

	<?php if (!Yii::app()->request->isAjaxRequest): ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	<?php endif; ?>
<?php $this->endWidget(); ?>

<?php if (Yii::app()->request->isAjaxRequest): ?>
</div>

<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>$model->isNewRecord ? 'Добавить' : 'Сохранить',
        'url'=>'#',
		'htmlOptions'=>array(
			'id'=>'submit-'.mt_rand(),
			'ajax' => array(
				'url'=>$model->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id'=>$model->id)),
				'type'=>'post',
				'data'=>'js:$(this).parent().parent().find("form").serialize()',
				'success'=>'function(r){
					if(r=="success"){
						window.location.reload();
					}
					else{
						$("#TBDialogCrud").html(r).modal("show");
					}
				}', 
			),
		),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Закрыть',
        'url'=>'#',
        'htmlOptions'=>array(
			'id'=>'btn-'.mt_rand(),
			'data-dismiss'=>'modal'
		),
    )); ?>
</div>
<?php endif; ?>