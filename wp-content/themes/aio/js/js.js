jQuery(document).ready(function($) {
    $(".rslides").responsiveSlides({
        nav: true,
        prevText: "<div id='slide-control-prev' class='slide-control'></div>",
        nextText: "<div id='slide-control-next' class='slide-control'></div>"
    });
    
    $('.addToCart').bind('click', function(){
        var pid = $(this).attr('pid');      
        $.ajax({
            url: ajaxurl,
            data: {
                'action':'add_cart_ajax_request',
                'pid':pid               
            },
            async: false,
            success:function(data) {
                $('#cart').text('('+data+')');
                $('#hidden-message').show();
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });  
        return false;
    }); 
    
    $('.remove-item').bind('click', function(){       
        var pid = $(this).attr('pid');
        result = 0;
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action':'remove_item_from_cart',
                'pid':pid              
            },
            async: false,
            success:function(data) {
                if(data=='1'){        
                    result = 1;                    
                }
            }            
        });  
        
        if(result==1){
            jQuery(this).parents('.cart-item').remove();
            changeTotalPrice(pid, 0);
        }
    });
    
    $('.btn-refresh').bind('click', function(){            
        var quantity = $(this).parent().children('.txtQuantity').val();
        var pid = $(this).parent().children('.txtQuantity').attr('pid');
        changeTotalPrice(pid, quantity);
    });
        
});


jQuery(window).load(function($) {
    
});


function changeTotalPrice(pid, quantity) {
    jQuery.ajax({
        url: ajaxurl,
        data: {
            'action': 'update_quantity',
            'pid': pid,
            'quantity': quantity
        },
        async: false,
        success: function(data) {
            console.log(data);
            if (data != '-1') {
                data = JSON.parse(data);
                jQuery('.cart-item.item-'+pid+' .cost').text('= '+data.str_price);
                jQuery('.sum .total-cost').text(data.total);
            }
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
}