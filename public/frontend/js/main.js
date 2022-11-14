//carousel
var swiper = new Swiper(".mySwiperBanner", {
    pagination: {
        el: ".swiper-pagination",
    },
    autoplay: {
        delay: 3000,
    },
    loop: true,
});

//cart ajax - xu ly gio hang
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var id = $(this).data('id_product');
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/add-cart-ajax',
            method: 'POST',
            data: {
                cart_product_id: cart_product_id,
                cart_product_name: cart_product_name,
                cart_product_image: cart_product_image,
                cart_product_price: cart_product_price,
                cart_product_qty: cart_product_qty,
                _token: _token
            },
            success: function() {
                swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    },
                    function() {
                        window.location.href = '/gio-hang';
                    });
            }
        });
    });
});
$('input.chk').on('change', function() {
    $('input.chk').not(this).prop('checked', false);
});
