     <div class="box">
                    <div class="box-heading"><?php echo $name; ?></div>
                    <div class="box-content">
                        <div class="box-product">
                            <?php foreach ($list as $l): $l->id=!empty($l->id) ? $l->id :$l->product_id; ?>
                            <div>
                                <div class="image">
                                    <a href="<?php echo Yii::app()->createUrl('site/product', array('id' => $l->id)); ?>">
                                        <div style="width:130px;height:100px;background: #F0F0F0 url(images/<?php echo $l->image; ?>) no-repeat center center;background-size: 130px"></div>
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="<?php echo Yii::app()->createUrl('site/product', array('id' => $l->id)); ?>"><?php echo $l->title; ?></a>
                                </div>
                                <div class="price">
                                    $<?php echo $l->price; ?>                  
                                </div>
                                <div class="cart">
                                    <a data-product="<?php echo $l->id; ?>" data-price="<?php echo $l->price; ?>" data-image="<?php echo $l->image; ?>" data-title="<?php echo $l->title; ?>" class="button add-to-cart">
                                        <span>Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                            <?php endForeach; ?>
                        </div>
                    </div>
                </div>
