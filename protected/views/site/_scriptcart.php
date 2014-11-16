            <script type="text/javascript" charset="utf-8">
                $(function () {
                    var totalItems=0;
                    var serviceUrls = {
                        'create':'<?php echo Yii::app()->createUrl('cart/create'); ?>',
                        'update':'<?php echo Yii::app()->createUrl('cart/update'); ?>'
                    };
                    var setCartText = function () {
                        var cartItens = $.cookie('__ci')||'0';
                        var cartTotal = $.cookie('__ct')||'0.00';
                        $('#cart_total').text(cartItens + ' item(s) - $' + cartTotal);
                        totalItems = parseInt(cartItens, 10);
                    };


                    $('.add-to-cart').click(function (e){
                        e.preventDefault();
                        var data = {'Cart':{}};
                        data.Cart[$(this).attr('data-product')] = {
                            'title':$(this).attr('data-title'),
                            'image':$(this).attr('data-image'),
                            'price':$(this).attr('data-price')
                        };
                        $.ajax({
                            type: "POST",
                            url: serviceUrls[totalItems > 0 ? 'update' : 'create'],
                            data: data,
                            success: function (data) {
                                setCartText(); 
                            },
                            dataType: 'json'
                        });  
                    });

                    setCartText();
                });
            </script>
