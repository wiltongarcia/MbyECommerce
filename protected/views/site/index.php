            <div id="column-right">
                <div class="box">
                    <div class="box-heading">Categories</div>
                    <div class="box-content">
                        <div class="box-category">
                            <ul>
                                <?php foreach ($categories as $k=>$c): $c=(object)$c; ?>
                                <li>
                                    <a href="http://santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=product/category&amp;path=71"><?php echo $c->title; ?> (<?php echo $c->products_total; ?>)</a>
                                </li>
                                <?php endForeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">
                <?php $this->renderPartial('_list', array('list'=>$latest, 'name'=>'Latest')); ?>
                </div>
                <h1 style="display: none;">Your Store</h1>
            </div>
