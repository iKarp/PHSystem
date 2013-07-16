<?php

    Yii::app()->clientScript->registerScript('openHistory', "
        $('#bth-history').click(function(){
            $('#history').toggle();
            return false;
        });
    ");

?>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        //'type'=>'link',
        'label'=>'История',
        'icon'=>'search',
        'url'=>'',
        'htmlOptions'=>array('id'=>'bth-history'),
    ));
?>

<div id="history" style="display: none">

<?php

    $history = new CArrayDataProvider($model->history);
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$history,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'cdate', 'header'=>'Дата', 'value'=>'date("d.m.Y",strtotime($data->created))',),
            array('name'=>'ctime', 'header'=>'Время', 'value'=>'date("H:i",strtotime($data->created))',),
            array('name'=>'status.name', 'header'=>'Статус'),
            array('name'=>'user', 'header'=>'Пользователь', 'value'=>'$data->user->person->fio()'),
            array('name'=>'comment', 'header'=>'Комментарий'),
        ),
    ));

?>

</div>