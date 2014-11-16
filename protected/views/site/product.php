            <?php $this->renderPartial('_sidebar', array('categories'=>$categories)); ?>
            <div id="content">
                <div class="breadcrumb">
                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>
                    &raquo; <a href="<?php echo Yii::app()->createUrl('site/product', array('id'=>$product->id)); ?>"><?php echo $product->title; ?></a>
                </div>
                <div class="product-info">
                    <div class="left">
                        <div class="image">
                            <a href="<?php echo Yii::app()->createUrl('site/product', array('id' => $product->id)); ?>">
                                <div style="width:350px;height:250px;background: #F0F0F0 url(images/<?php echo $product->image; ?>) no-repeat center center;background-size: 350px"></div>
                            </a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="description">
                            <h1><?php echo $product->title; ?></h1>
                            <p>
                                <?php echo nl2br($product->description); ?>
                            </p>
                            <h4>Characteristics:</h4>
                            <?php foreach ($product->characteristic as $c): ?>
                            <span><?php echo $c->title; ?>:</span>
                            <?php echo $c->description; ?>    
                            <br>
                            <?php endForeach; ?>    
                        </div>
                        <div class="price">
                            Price:                $<?php echo $product->price; ?>
                        </div>
                        <div class="cart">
                            <a data-product="<?php echo $product->id; ?>" data-price="<?php echo $product->price; ?>" data-image="<?php echo $product->image; ?>" data-title="<?php echo $product->title; ?>" class="button add-to-cart">
                                <span>Add to Cart</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->renderPartial('_scriptcart'); ?>
