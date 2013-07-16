<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);
Yii::trace("Load view", 'dev.order.view.create');
?>

<div class="well">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'enableAjaxValidation'=>false,
)); ?>
 
<fieldset>
 
    <legend>Новый заказ</legend>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model, 'performer_id', DataList::items('performer')); ?>

    <div class="control-group ">
        <?php echo $form->label($model, 'organization_id', array('class'=>'control-label')); ?>
        <div class="controls">
            <div class="input-append">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'organization_name',
                    'url'=>$this->createUrl('customer/autoCompleteLookup'),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'input-xxlarge'),
                    'methodChain'=>".result(function(event,item){\$(\"#Order_organization_id\").val(item[1]);})",
                )); ?>
                <?php echo $form->hiddenField($model,'organization_id'); ?>
                <a class="add-on" style="cursor:pointer" href="<?php echo $this->createUrl('customer'); ?>"><i class="icon-plus"></i></a>
            </div>
            <p class="help-block">Выберите заказчика из списка или создайте нового</p>
        </div>
    </div>


</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Создать')); ?>
</div>
 
<?php $this->endWidget(); ?>

</div>