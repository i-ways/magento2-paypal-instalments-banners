require(
    [
        'jquery'
    ],
    function ($) {
        var bannerContainers = $('div.ipib'),
            finalPriceContainer = $('.product-info-price .price-box .price-container.price-final_price');
        function getFinalPrice()
        {
            var finalPriceString = finalPriceContainer.text().replace(',', '.'),
                finalPrice = finalPriceString.match(/[+-]?\d+(\.\d+)?/g).map(
                    function (v) {
                        return parseFloat(v);
                    }
                );
            return parseFloat(finalPrice[0]);
        }
        finalPriceContainer.on(
            'DOMSubtreeModified',
            function (e) {
                var finalPrice = getFinalPrice();
                bannerContainers.each(
                    function () {
                        var dataPpAmount = getFinalPrice() + parseFloat($(this).attr('data-cart-amount'));
                        $(this).attr('data-pp-amount',  dataPpAmount.toFixed(2));
                    }
                );
            }
        );
    }
);
