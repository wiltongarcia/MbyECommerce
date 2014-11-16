                <?php $this->renderPartial('_sidebar', array('categories'=>$categories)); ?>
                <div id="content">
                    <div class="breadcrumb">
                        <a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=common/home">Home</a>
                        » <a href="./Shopping Cart_files/Shopping Cart.html">Shopping Cart</a>
                    </div>
                    <h1>Shopping Cart</h1>
                    <form action="./Shopping Cart_files/Shopping Cart.html" method="post" enctype="multipart/form-data" id="basket">
                        <div class="cart-info">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="remove">Remove</td>
                                        <td class="image">Image</td>
                                        <td class="name">Product Name</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="price">Unit Price</td>
                                        <td class="total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart['items'] as $p):  ?>
                                    <tr>
                                        <td class="remove"><input type="checkbox" name="remove[]" value="50"></td>
                                        <td class="image">                    
                                            <a href="#">
                                                <div style="width:65px;height:50px;background: #F0F0F0 url(images/<?php echo $p['image']; ?>) no-repeat center center;background-size: 65px"></div>
                                            </a>
                                        </td>
                                        <td class="name">
                                            <a href="#"><?php echo $p['title']; ?></a>
                                        </td>
                                        <td class="quantity"><input type="text" name="quantity" value="<?php echo $p['quantity']; ?>" size="3"></td>
                                        <td class="price">$<?php echo number_format($p['price'], 2); ?></td>
                                        <td class="total">$<?php echo number_format($p['total'], 2); ?></td>
                                    </tr>
                                    <?php endForeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
                        <div class="left"><a onclick="$(&#39;#basket&#39;).submit();" class="button"><span>Update</span></a></div>
                        <div class="right"><a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=checkout/checkout" class="button"><span>Checkout</span></a></div>
                        <div class="center"><a href="http://www.santoshsetty.com/tf/opencart-templates/mystockimageshop-v15/index.php?route=common/home" class="button"><span>Continue Shopping</span></a></div>
                    </div>
                </div>
                <?php $this->renderPartial('_scriptcart'); ?>
