                <?php $this->renderPartial('_sidebar', array('categories'=>$categories)); ?>
                <div id="content">
                    <div class="breadcrumb">
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=common/home">Home</a>
                        » <a href="./Shopping Cart_files/Shopping Cart.html">Shopping Cart</a>
                    </div>
                    <h1>Shopping Cart</h1>
                     <?php echo CHtml::beginForm(array('site/checkout'), 'post', array('id'=> 'basket')); ?>
                        <?php if (!empty($cart['items'])): ?>
                        <div class="cart-info">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="image">Image</td>
                                        <td class="name">Product Name</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="price">Unit Price</td>
                                        <td class="total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart['items'] as $k=>$p):  ?>
                                    <input type="hidden" name="ordeItems[<?php echo $k; ?>][quantity]" value="<?php echo $p['quantity']; ?>" size="3">
                                    <tr>
                                        <td class="image">                    
                                            <a href="#">
                                                <div style="width:65px;height:50px;background: #F0F0F0 url(images/<?php echo $p['image']; ?>) no-repeat center center;background-size: 65px"></div>
                                            </a>
                                        </td>
                                        <td class="name">
                                            <a href="#"><?php echo $p['title']; ?></a>
                                        </td>
                                        <td class="quantity">
                                            <?php echo $p['quantity']; ?>
                                        </td>
                                        <td class="price">
                                            $<?php echo number_format($p['price'], 2); ?>
                                        </td>
                                        <td class="total">
                                            $<?php echo number_format($p['total'], 2); ?>
                                        </td>
                                    </tr>
                                    <?php endForeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-total">               
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="right"><b>Total:</b></td>
                                        <td class="right">$<?php echo number_format($cart['totalValue'], 2); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php $this->renderPartial('_useraddress', array('cachedUser' => $cachedUser, 'cachedAddress' => $cachedAddress)); ?>
                    <?php echo CHtml::endForm(''); ?>
                    <div class="buttons">
                        <div class="left">
                            <a href="<?php echo Yii::app()->createUrl('site/deleteCart'); ?>" class="button"><span>Delete Cart</span></a>
                        </div>
                        <div class="right">
                            <a href="<?php echo Yii::app()->createUrl('site/checkout'); ?>" class="button checkout-button"><span>Checkout</span></a>
                        </div>
                        <div class="center">
                            <a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="button"><span>Continue Shopping</span></a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('.checkout-button').click(function (e) {
                            e.preventDefault();

                            $('#basket').submit();
                        });
                    });
                </script>
                <?php else: ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1>Cart empty.</h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php endIf; ?>
                <?php $this->renderPartial('_scriptcart'); ?>
