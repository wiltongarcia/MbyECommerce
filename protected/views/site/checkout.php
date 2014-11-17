                <?php $this->renderPartial('_sidebar', array('categories'=>$categories)); ?>
                <div id="content">
                    <div class="breadcrumb">
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=common/home">Home</a>
                        » <a href="#">Order: <?php echo $order; ?></a>
                    </div>
                    <div class="information">
                        <h1>Order Code: <?php echo $order; ?></h1>
                        User:<br>
                        Name:<?php echo $user->name; ?> <br>
                        Email:<?php echo $user->email; ?> <br><br>

                        Address:<br>
                        Street:<?php echo $address->street; ?><br>
                        City:<?php echo $address->city; ?><br>
                        Zip Code:<?php echo $address->zip_code; ?><br>
                
                    </div>
                    <h1>Order Items</h1>
                     <?php echo CHtml::beginForm(array('site/checkout'), 'post', array('id'=> 'basket')); ?>
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
                        <?php echo CHtml::endForm(''); ?>
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
                    <div class="buttons">
                        <div class="center">
                            <a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="button"><span>Continue Shopping</span></a>
                        </div>
                    </div>
                </div>
                <?php $this->renderPartial('_scriptcart'); ?>
