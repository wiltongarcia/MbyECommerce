            <div id="header-wrap">
                <!-- Header Starts -->
                <div id="header">
                    <!-- Logo Starts -->
                    <div id="logo">
                        <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/images/logo.png" title="Mystockimages" alt="Mystockimages" />
                        </a>
                    </div>
                    <!-- Logo Ends -->
                    <!-- Search Starts -->
                    <div id="search">
                        <form action="<?php echo Yii::app()->createUrl('site/search'); ?>" method="get" accept-charset="utf-8">
                            <button type="submit" style="border:none" class="button-search"></button>
                            <input type="text" name="q" value="Search" onclick="this.value = '';" onkeydown="this.style.color = '#b1b1b1';" />
                        </form>
                    </div>
                    <!-- Search Ends -->
                    <!-- Welcome Text Starts -->
                    <div id="welcome">
                        Welcome visitor you can <a href="<?php echo Yii::app()->createUrl('site/login'); ?>">login</a>.									
                    </div>
                    <!-- Welcome Text Ends -->
                    <!-- Header Links Starts -->
                    <div id="header-links">
                        <!-- Cart Starts -->
                        <div id="cart">
                            <div class="heading clearfix">
                                <a href="<?php echo Yii::app()->createUrl('site/cart'); ?>">
                                Shopping Cart							
                                </a>&nbsp;
                                <span id="cart_total">0 item(s) - $0.00</span>							
                            </div>
                            <div class="content" style="display:none;"></div>
                        </div>
                        <!-- Cart Ends -->
                        <!-- Links Starts -->
                        <div class="links clearfix">
                            <ul>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>
                                </li>
                                <li>|</li>
                                <li><a href="<?php echo Yii::app()->createUrl('site/login'); ?>">My Account</a></li>
                                <li>|</li>
                            </ul>
                        </div>
                        <!-- Links Endss -->
                    </div>
                    <!-- Header Links Ends -->
                </div>
                <!-- Header Ends -->	
            </div>
