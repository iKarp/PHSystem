<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="well">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<fieldset>
 
    <legend>Заказ <?php echo $model->performer->name."-".$model->num; ?></legend>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->uneditableRow($model->customer, 'name_organization'); ?>

	<?php echo $form->textAreaRow($model,'specification',array('rows'=>2, 'cols'=>100)); ?>
	
	<?php echo $form->textFieldRow($model,'sum'); ?>

    <?php echo $form->textFieldRow($model,'deadline'); ?>

    <?php echo $this->renderPartial('_history', array('model'=>$model)); ?>

    <?php echo $this->renderPartial('_products', array('model'=>$model)); ?>

</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Сохранить')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->