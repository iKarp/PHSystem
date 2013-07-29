<?php if (Yii::app()->request->isAjaxRequest): ?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4><?php echo $model->isNewRecord ? 'Создать операцию' : 'Изменить операцию' ?></h4>
</div>

<div class="modal-body">
<?php endif; ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'production-process-operation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'price_id'); ?>

	<?php echo $form->uneditableRow($model->process, 'name', array('class'=>'span5')); ?>

    <?php if ($model->isNewRecord): ?>
        <div class="control-group ">
            <?php echo $form->label($model, 'work_id', array('class'=>'control-label')); ?>
            <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'operation_name',
                    'url'=>$this->createUrl('productionOperation/autoCompleteLookup',array('is_folder'=>0)),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5','placeholder'=>'Выберите из списка'),
                    'methodChain'=>".result(function(event,item){\$(\"#ProductionProcessOperation_work_id\").val(item[1]);})",
                )); ?>
                <?php echo $form->hiddenField($model,'work_id'); ?>
            </div>
        </div>
    <?php else: ?>
        <?php echo $form->uneditableRow($model->operation,'name',array('class'=>'span5')); ?>
    <?php endif; ?>

    <?php echo $form->textFieldRow($model,'work_count',array('class'=>'span5')); ?>

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
        'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
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