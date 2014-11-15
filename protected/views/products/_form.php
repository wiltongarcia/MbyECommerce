<?php
/* @var $this ProductsController */
/* @var $model Product */
/* @var $categories Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'updated_at'); ?>
    <?php echo $form->hiddenField($model,'created_at'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array('1'=>'active','2'=>'inactive'), array('options' => array('1'=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

    <?php if(!$model->isNewRecord): ?>
        <?php $this->renderPartial('_categories', array('model'=>$model, 'categories'=>$categories, 'characteristics' => $characteristics)); ?>
        <?php $this->renderPartial('_characteristics', array('model'=>$model, 'categories'=>$categories, 'characteristics' => $characteristics)); ?>
    <?php endIf; ?>
    <script type="text/javascript" charset="utf-8">
        
        var serviceUrls = {
            ProductCategories:{
                save:'<?php echo Yii::app()->createUrl('productCategories/create'); ?>',
                delete:'<?php echo Yii::app()->createUrl('productCategories/delete'); ?>'
            },
            ProductCharacteristic:{
                save:'<?php echo Yii::app()->createUrl('productCharacteristics/create'); ?>',
                delete:'<?php echo Yii::app()->createUrl('productCharacteristics/delete'); ?>'
            }
        };

        $(function () {
            $('.checkbox-categories, .checkbox-characteristics').click(function (e) {
                var data = {
                    ajax:1
                };
                data[$(this).attr('data-class')] = {};
                data[$(this).attr('data-class')]['product_id'] = $(this).attr('data-product');
                data[$(this).attr('data-class')][$(this).attr('data-field')] = $(this).attr('data-relationship');

                $.ajax({
                    type: "POST",
                    url: serviceUrls[$(this).attr('data-class')][this.checked ? 'save' : 'delete'],
                    data: data,
                    success: function (data) {
                        console.log(data); 
                    },
                    dataType: 'json'
                });  
            });
        });
    </script>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
