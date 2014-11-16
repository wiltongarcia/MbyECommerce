            <div id="column-right">
                <div class="box">
                    <div class="box-heading">Categories</div>
                    <div class="box-content">
                        <div class="box-category">
                            <ul>
                                <?php foreach ($categories as $k=>$c): $c=(object)$c; ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('site/category', array('id'=>$c->id)); ?>"><?php echo $c->title; ?> (<?php echo $c->products_total; ?>)</a>
                                </li>
                                <?php endForeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
