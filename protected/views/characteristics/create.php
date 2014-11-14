<?php
/* @var $this CharacteristicsController */
/* @var $model Characteristic */

$this->breadcrumbs=array(
	'Characteristics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Characteristic', 'url'=>array('index')),
	array('label'=>'Manage Characteristic', 'url'=>array('admin')),
);
?>

<h1>Create Characteristic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>