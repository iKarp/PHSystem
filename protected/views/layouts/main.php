<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />-->
    <?php Yii::app()->bootstrap->register(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<br />

<div class="container" id="page">

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'PH System',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                //array('label'=>'Home', 'url'=>'#', 'active'=>true),
                //array('label'=>'Link', 'url'=>'#'),
                array('label'=>'Заказы', 'url'=>'#', 'items'=>array(
                    array('label'=>'Создать', 'url'=>'?r=order/create'),
                    '---',
                    array('label'=>'Реестры'),
                    array('label'=>'Оформление', 'url'=>'?r=order/index&status_id=1'),
                    array('label'=>'Утверждение макета', 'url'=>'?r=order/index&status_id=2'),
                    array('label'=>'Производство', 'url'=>'?r=order/index&status_id=3'),
                    array('label'=>'Склад', 'url'=>'?r=order/index&status_id=4'),
                    array('label'=>'Выполненые', 'url'=>'?r=order/index&status_id=5'),
                    '---',
                    array('label'=>'Калькулятор', 'url'=>'?r=order/calculate'),
                )),
                array('label'=>'Производство', 'url'=>'#', 'items'=>array(
                    array('label'=>'Заказы'),
                    array('label'=>'Поступившие', 'url'=>'?r=order/index&status_id=1'),
                    array('label'=>'В работе', 'url'=>'?r=order/index&status_id=2'),
                    array('label'=>'На складе', 'url'=>'?r=order/index&status_id=3'),
                    '---',
                    array('label'=>'Справочники'),
                    array('label'=>'Технологические процессы', 'url'=>'?r=productionProcess/index'),
                    array('label'=>'Продукты', 'url'=>'?r=product/index'),
                    array('label'=>'Материалы', 'url'=>'?r=material/index'),
                )),
                array('label'=>'Финансы', 'url'=>'#', 'items'=>array(
                    array('label'=>'Проводки', 'url'=>'?r=finOrder/index'),
                    array('label'=>'Бюджет', 'url'=>'?r=order/index&status_id=1'),
                )),
            ),
        ),
    ),
)); ?>

<?php echo $content; ?>

</div><!-- page -->

</body>
</html>
