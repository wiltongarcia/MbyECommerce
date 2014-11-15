                <div class="box">
                    <div class="box-heading"><?php echo $name; ?></div>
                    <div class="box-content">
                        <div class="box-product">
                            <?php foreach ($list as $l): ?>
                            <div>
                                <div class="image">
                                    <a href="#">
                                        <img src="http://placehold.it/130x100" alt="<?php $l->title; ?>" />
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="#"><?php echo $l->title; ?></a>
                                </div>
                                <div class="price">
                                    $<?php echo $l->price; ?>                  
                                </div>
                                <div class="cart">
                                    <a data-product="<?php echo $l->id; ?>" class="button add-to-cart">
                                        <span>Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                            <?php endForeach; ?>
                        </div>
                    </div>
                </div>
