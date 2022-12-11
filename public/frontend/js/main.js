
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
        let id = $(this).data('id_product');
        let cart_product_id = $('.cart_product_id_' + id).val();
        let cart_product_name = $('.cart_product_name_' + id).val();
        let cart_product_image = $('.cart_product_image_' + id).val();
        let cart_product_price = $('.cart_product_price_' + id).val();
        let cart_product_qty = $('.cart_product_qty_' + id).val();
        let _token = $('input[name="_token"]').val();
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

//cai nay cu roi ko xai, payment chuyen tu input -> submit
// $('input.chk').on('change', function() {
//     $('input.chk').not(this).prop('checked', false);
// });


//comment in product
$(document).ready(function(){
    load_Comment();
    function load_Comment(){
        var product_id = $('.comment_product_id').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/load-comment',
            method: 'POST',
            data: {
                product_id: product_id,
                _token: _token
            },
            success:function(data){
                $('#comment_show').html(data);
            }
        });
    }
    $('#send-comment').click(function(){
        var product_id = $('.comment_product_id').val();
        var comment_name  = $('.comment_name').val();
        var comment_content  = $('.comment_content').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/send-comment',
            method: 'POST',
            data: {
                product_id: product_id,
                comment_name: comment_name,
                comment_content: comment_content,
                _token:_token
            },
            success: function() {
                load_Comment();
            }
        });
    })
});

