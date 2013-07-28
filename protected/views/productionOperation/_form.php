<?php if (Yii::app()->request->isAjaxRequest): ?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4><?php
        if ($model->isGroup()) echo $model->isNewRecord ? 'Создание группы' : 'Изменение группы';
        else echo $model->isNewRecord ? 'Создание операции' : 'Изменение операции';
    ?></h4>
</div>

<div class="modal-body">
<?php endif; ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'production-operation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group ">
        <?php echo $form->label($model, 'parent_id', array('class'=>'control-label')); ?>
        <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'parent_name',
                    'url'=>$this->createUrl('productionOperation/autoCompleteLookup',array('is_folder'=>'1')),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5','placeholder'=>'Выберите из списка'),
                    'value'=>(isset($model->parent->name)) ? $model->parent->name : '',
                    'methodChain'=>".result(function(event,item){\$(\"#ProductionOperation_parent_id\").val(item[1]);})",
                )); ?>
            <?php echo $form->hiddenField($model,'parent_id'); ?>
        </div>
    </div>

	<?php echo $form->hiddenField($model,'is_folder',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array(
        'class'=>'span5',
        'maxlength'=>50,
        'labelOptions'=>($model->isGroup()) ? array('label' => 'Название') : '',
    )); ?>


    <?php if (!$model->isGroup()): ?>

    <div class="control-group ">
        <?php echo $form->label($model, 'measurement_id', array('class'=>'control-label')); ?>
        <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'measurement_name',
                    'url'=>$this->createUrl('productionOperationMeasurement/autoCompleteLookup'),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5','placeholder'=>'Выберите из списка'),
                    'value'=>(isset($model->measurement->name)) ? $model->measurement->name : '',
                    'methodChain'=>".result(function(event,item){\$(\"#ProductionOperation_measurement_id\").val(item[1]);})",
                )); ?>
            <?php echo $form->hiddenField($model,'measurement_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model,'productivity',array('class'=>'span5','maxlength'=>10)); ?>

    <?php endif; ?>

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
    <?php if (!$model->isNewRecord) $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'danger',
        'label'=>'Удалить',
        'url'=>'#',
		'htmlOptions'=>array(
			'id'=>'delete-'.mt_rand(),
			'ajax' => array(
				'url'=>$this->createUrl('delete', array('id'=>$model->id)),
				'type'=>'post',
				//'data'=>'js:$(this).parent().parent().find("form").serialize()',
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