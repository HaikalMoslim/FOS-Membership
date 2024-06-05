$(document).ready(function (){

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart()
    {
        $.ajax({
            method:"GET",
            url:"/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }
    function loadwishlist()
    {
        $.ajax({
            method:"GET",
            url:"/load-wishlist-count",
            success: function(response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    $('.addToCartBtn').click(function (e){
        e.preventDefault();
    
        var addToCartBtn = $(this);
        var product_id = addToCartBtn.closest('.product_data').find('.prod_id').val();
        var product_quantity = addToCartBtn.closest('.product_data').find('.quantity-input').val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_quantity': product_quantity,
            },
            success: function(response){
                swal(response.status);
                // After successfully adding to cart, remove from wishlist
                var removeFromWishlist = function() {
                    var prod_id = addToCartBtn.closest('.product_data').find('.prod_id').val();
                    $.ajax({
                        method: "POST",
                        url: "delete-wishlist-item",
                        data: {
                            'prod_id': prod_id,
                        },
                        success: function(response){
                            loadwishlist();
                            $('.wishlistitems').load(location.href + " .wishlistitems");
                            swal("",response.status, "success");
                        }
                    });
                };
                removeFromWishlist(); // Call the function to remove from wishlist
                loadcart();
            }
        });
    });
    

    $('.addToWishlist').click(function (e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method:"POST",
            url:"/add-to-wishlist",
            data:{
                'product_id': product_id,
            },
            success: function(response){
                swal(response.status);
                loadwishlist();
            }
        });
    });

    // $('.increment-btn').click(function (e){
        $(document).on('click','.increment-btn', function (e){

        e.preventDefault();

        // var inc_value = $('.quantity-input').val();
        var inc_value = $(this).closest('.product_data').find('.quantity-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            // $('.quantity-input').val(value);
            $(this).closest('.product_data').find('.quantity-input').val(value);
        }
    });

    // $('.decrement-btn').click(function (e){
        $(document).on('click','.decrement-btn', function (e){

        e.preventDefault();

        // var dec_value = $('.quantity-input').val();
        var dec_value = $(this).closest('.product_data').find('.quantity-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            // $('.quantity-input').val(value);
            $(this).closest('.product_data').find('.quantity-input').val(value);
        }
    });

    // $('.delete-cart-item').click(function (e){
        $(document).on('click','.delete-cart-item', function (e){

        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method:"POST",
            url:"delete-cart-item",
            data:{
                'prod_id': prod_id,
            },
            success: function(response){
                // window.location.reload();
                loadcart();
                $('.cartitems').load(location.href + " .cartitems");
                swal("",response.status, "success");
            }
        });
    });

    // $('.remove-wishlist-item').click(function (e){
        $(document).on('click','.remove-wishlist-item', function (e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method:"POST",
            url:"delete-wishlist-item",
            data:{
                'prod_id': prod_id,
            },
            success: function(response){
                // window.location.reload();
                loadwishlist();
                $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("",response.status, "success");
            }
        });
    });

    $(document).on('click','.clear-wishlist-item', function (e){
        e.preventDefault();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            method:"POST",
            url:"clearall-wishlist-item", // Assuming this is the correct route for clearing wishlist
            success: function(response){
                loadwishlist();
                $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("",response.status, "success");
            }
        });
    }); 

    // $('.changeQuantity').click(function (e){
        $(document).on('click','.changeQuantity', function (e){

        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var quantity = $(this).closest('.product_data').find('.quantity-input').val();
        data = {
            'prod_id' :prod_id,
            'prod_quantity' :quantity,
        }

        $.ajax({
            method:"POST",
            url:"update-cart",
            data: data,
            success: function(response){
                // window.location.reload();
                $('.cartitems').load(location.href + " .cartitems");
            }
        });
    });
});