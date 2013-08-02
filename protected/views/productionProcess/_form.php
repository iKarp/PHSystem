<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'TBDialogCrud')); ?>
<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'production-process-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
    'type'=>'horizontal',
    //'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

    <div class="control-group ">
            <?php echo $form->label($model, 'parent_id', array('class'=>'control-label')); ?>
            <div class="controls">
                <?php $this->widget('CAutoComplete', array(
                    'name'=>'parent_name',
                    'url'=>$this->createUrl('productionProcess/autoCompleteLookup', array('is_folder'=>1)),
                    'max'=>9, //specifies the max number of items to display
                    'minChars'=>3,
                    'delay'=>500, //number of milliseconds before lookup occurs
                    'matchCase'=>false, //match case when performing a lookup?
                    'htmlOptions'=>array('class'=>'span5', 'placeholder'=>'Выберите из списка', ),
                    'value'=>(isset($model->parent->name)) ? $model->parent->name : '',
                    'methodChain'=>".result(function(event,item){\$(\"#ProductionProcess_parent_id\").val(item[1]);})",
                )); ?>
                <?php echo $form->hiddenField($model,'parent_id'); ?>
            </div>
        </div>

    <?php if (!$model->isGroup()): ?>

    <?php
    $materials = new CArrayDataProvider($model->materials);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$materials,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'material.name', 'header'=>'Материалы'),
            array('name'=>'material.measurement.name', 'header'=>'Ед. изм.'),
            array('name'=>'material_count', 'header'=>'Кол-во'),
            array('name'=>'material.price', 'header'=>'Цена'),
            array('value'=>'sprintf("%.6f",$data->material->price*$data->material_count)', 'header'=>'Сумма'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update}{delete}',
                'buttons'=>array(
                    'delete' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessMaterial/delete", array("id"=>$data->id))',  
                    ),
                    'update' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessMaterial/update", array("id"=>$data->id))',
                        'click'=>'function(){
                            var url = $(this).attr("href");
                            $.get(url, function(r){
                                $("#TBDialogCrud").html(r).modal("show");
                            });
                            return false;
                        }',
                    ),
                ),
            )
        ),
    )); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'ajaxButton',
        'label'=>'Добавить',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("productionProcessMaterial/create", array("ProductionProcessID"=>$model->id)),
        'ajaxOptions' => array(
			'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
		),
    ));
    ?>

    <?php
    $operations = new CArrayDataProvider($model->operations);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$operations,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'operation.name', 'header'=>'Операции'),
            array('name'=>'operation.measurement.name', 'header'=>'Персонал'),
            array('name'=>'work_count', 'header'=>'Кол-во'),
            array('name'=>'operation.measurement.cost', 'header'=>'Стоимость н/ч'),
            array('value'=>'sprintf("%.6f",$data->operation->productivity)', 'header'=>'Выработка в час'),
            array('value'=>'sprintf("%.6f",$data->work_count*$data->operation->measurement->cost*$data->operation->hours)', 'header'=>'Сумма'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update}{delete}',
                'buttons'=>array(
                    'delete' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessOperation/delete", array("id"=>$data->id))',  
                    ),
                    'update' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessOperation/update", array("id"=>$data->id))',
                        'click'=>'function(){
                            var url = $(this).attr("href");
                            $.get(url, function(r){
                                $("#TBDialogCrud").html(r).modal("show");
                            });
                            return false;
                        }',
                    ),
                ),
            ),
        ),
    )); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'ajaxButton',
        'label'=>'Добавить',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("productionProcessOperation/create", array("ProductionProcessID"=>$model->id)),
        'ajaxOptions' => array(
			'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
		),
    ));
    ?>

    <?php
    $subprocesses = new CArrayDataProvider($model->subprocesses);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$subprocesses,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'process.name', 'header'=>'Сопутствующие технологические процессы'),
            array('name'=>'price_count', 'header'=>'Количество'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view}{update}{delete}',
                'buttons'=>array(
                    'view' => array(
                        'url'=>'Yii::app()->createUrl("productionProcess/view", array("id"=>$data->price_id))',  
                    ),
                    'update' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessSubprocess/update", array("id"=>$data->id))',
                        'click'=>'function(){
                            var url = $(this).attr("href");
                            $.get(url, function(r){
                                $("#TBDialogCrud").html(r).modal("show");
                            });
                            return false;
                        }',
                    ),
                    'delete' => array(
                        'url'=>'Yii::app()->createUrl("productionProcessSubprocess/delete", array("id"=>$data->id))',  
                    ),
                ),
            ),
        ),
    )); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'ajaxButton',
        'label'=>'Добавить',
        'icon'=>'plus',
        'url'=>Yii::app()->createUrl("productionProcessSubprocess/create", array("ProductionProcessID"=>$model->id)),
        'ajaxOptions' => array(
			'success'=>'function(r){$("#TBDialogCrud").html(r).modal("show");}', 
		),
    ));
    ?>

    <?php endif; ?>

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
            'url'=>Yii::app()->createUrl("productionProcess/delete", array(
                'id'=>$model->id,
                'returnUrl'=>Yii::app()->createUrl("productionProcess/index", array("parent_id"=>$model->parent_id)),
            )),
            //'htmlOptions'=>array('class'=>'span2'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'type'=>'primary',
			'label'=>'Отмена',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
