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
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
    </div>

    <?php if(!$model->isNewRecord): ?>
    <div class="row">
        <h5>Categories</h5>
        <?php foreach ($categories as $k => $c): $c=(object)$c;?>
            <input class="checkbox-categories" 
                        id="category-<?php echo $c->id; ?>" 
                            type="checkbox" 
                                data-product="<?php echo $model->id; ?>" 
                                    data-category="<?php echo $c->id; ?>"
                                        <?php echo !empty($c->relation_id) ? 'checked' : ''; ?>>
            <label for="category-<?php echo $c->id; ?>"><?php echo $c->title; ?></label>
        <?php endForeach; ?>
    </div>
    <?php endIf; ?>
    <script type="text/javascript" charset="utf-8">
        
        var serviceUrls = {
            save:'<?php echo Yii::app()->createUrl('productCategories/create'); ?>',
            delete:'<?php echo Yii::app()->createUrl('productCategories/delete'); ?>'    
        };

        $(function () {
            $('.checkbox-categories').click(function (e) {
                var data = {
                    ProductCategories : {
                        product_id : $(this).attr('data-product'),
                        category_id : $(this).attr('data-category')    
                    },
                    ajax:1
                };
                $.ajax({
                    type: "POST",
                    url: serviceUrls[this.checked ? 'save' : 'delete'],
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
