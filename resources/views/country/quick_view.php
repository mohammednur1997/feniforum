
<!DOCTYPE html>
<html>



<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="UTF-8" />
<meta name="robots" content="noindex">

	<base href="<?php echo base_url(); ?>etheme/" > 
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/shopme/stylesheet/stylesheet.css" />
<script type="text/javascript" src="catalog/view/theme/shopme/js/cloud-zoom.1.0.2.min.js"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" media="screen" />
<script type="text/javascript" src="catalog/view/theme/shopme/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="catalog/view/theme/shopme/js/shopme_common.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.html" />
<script type="text/javascript" src="catalog/view/javascript/jquery/datetimepicker/moment.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Custom css -->
<!-- Custom script -->

<!-- Custom styling -->
<!-- Custom fonts -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700,900" media="screen" />
</head>
<body style="background:#ffffff !important;">

<?php
    foreach($product_data as $row)
    {
?>
<div id="content" style="margin-bottom:0;">
 
 <div class="product-info quickview">
 
 <div id="notification"></div>
 
 <?php
							$thumbs = $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','all', '.png');
							$mains = $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','all', '.png');
							
						?>
    
       <div class="left">
            <div class="image">
			
			<?php 
                                foreach ($mains as $row1) {
                            ?>
							
      <a href="<?php echo $row1; ?>" title="Mauris Ferment Dictum Magna, 24 capsules" class="cloud-zoom" style="cursor:move" rel="position:'inside', showTitle: false" id='zoom1'>
	  <img itemprop="image" src="<?php echo $row1; ?>" title="Mauris Ferment Dictum Magna, 24 capsules" alt="Mauris Ferment Dictum Magna, 24 capsules" /></a>
      
								<?php } ?>
                                  </div>
      
            
      
      <div class="image-additional" style="width:360px; height:83px">      
      <ul class="image_carousel">
       <!-- Additional images -->
                
				
            
			         
        <!-- Show even the main image among the additional if  -->
         	
						 <?php
								$i = 0;
								foreach ($thumbs as $row1) {
							?>
							
		
       <li>
	   <a href="<?php echo $mains[$i]; ?>"
	   class="cloud-zoom-gallery colorbox" rel="useZoom: 'zoom1', smallImage: '<?php echo $mains[$i]; ?>'">
	   <img src="<?php echo $row1; ?>"  width="83" height="83"/></a></li>
	   
								
										<?php
								$i++;
								}
							 ?>


        </ul>
        
      </div>
        
     <!-- AddThis Button START -->
     <div class="share_buttons">
     <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a class="addthis_button_preferred_1"></a>
			<a class="addthis_button_preferred_2"></a>
			<a class="addthis_button_preferred_3"></a>
			<a class="addthis_button_preferred_4"></a>
			<a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a>
			</div>
            </div>
<!-- AddThis Button END -->
		
    </div>
       <div class="right" style="margin-left:360px">

  
      
      <h1><?php echo $row['title']; ?></h1>
      
            
        <div class="review">
       <span class="rating_stars rating r0">
       <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
       </span>
       
        </div>
            
        <div class="description">
               
			   

        <span><?php echo translate('product_code');?> :</span> <?php echo $row['code']; ?> <br />
        
                <span> <?php echo translate('point');?> :</span> <?php echo $row['point']; ?><br />
                
        <span itemprop="availability" content="in_stock"><?php echo translate('availability');?>:</span> <span class="in_stock"><?php
                        if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row['product_id'])){
                    ?>
					<td><span class="out_of_stock"><?php echo translate('out_of_stock');?></span></td>
					 <?php
                        } else {
                             
                    ?>
												<td><span class="in_stock"><?php echo translate('in_stock');?></span> <?php echo $row['current_stock']; ?> item(s)</td>
						<?php } ?></span>
        
        </div> <!-- .description ends -->
        
                <div class="short_description">
        <p><?php echo $row['description']; ?></p>
        </div>
                
                
        
        <div class="offer_wrapper">
                        
        
                <div class="price">
        </div>
                
        </div> 
                
        
       <div id="product">
       
              
       
      
      <div class="options">
      <div class="form-group">
      <label class="control-label">Qty</label>
      <div class="holder">
      <a class="quantity_button minus arrow_icon">-</a><input type="text" name="quantity" value="1" size="2" id="input-quantity" class="quantity" /><a class="quantity_button plus arrow_icon">+</a>
      </div>
      </div>
      </div>
      
      <div class="cart">
         
          
    <div class="btn-holder">
    <input type="hidden" name="product_id" value="52" />
    <button type="submit" id="button-cart" data-loading-text="Loading..." class="btn btn-primary">
	
		<?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                            <?php echo translate('added_to_cart');?>
                        <?php } else { ?>
                            <?php echo translate('add_to_cart');?>
                        <?php } ?>
						</button>
    <a class="btn btn-icon" onclick="wishlist_qv.add('52');" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart"></i></a>
    <a class="btn btn-icon" onclick="compare_qv.add('52');" data-toggle="tooltip" title="Compare this Product"><i class="icon-resize-small"></i></a>
    </div> 
        
        
       </div> <!-- Cart ends -->
                      	                    </div>
     
       
    </div> <!-- product-info-right END -->
    
    </div> <!-- product-info END -->
    

<script type="text/javascript">
var widest = 0;
$(".options .control-label").each(function () { widest = Math.max(widest, $(this).outerWidth()); }).css({"min-width": widest});
</script>

<script type="text/javascript">
var owlAdditionals = $('.image_carousel');
var itemWidth = (100 + 10);
var itemcalc = Math.round(300 / itemWidth);
owlAdditionals.owlCarousel({
items : itemcalc,
mouseDrag: true,
responsive:false,
pagination: false,
navigation:true,
slideSpeed:200,
navigationText: [
"<div class='slide_arrow_prev add_img'><i class='fa fa-angle-left'></i></div>",
"<div class='slide_arrow_next add_img'><i class='fa fa-angle-right'></i></div>"
]
});
</script>
<script type="text/javascript" src="../../../../s7.addthis.com/js/300/addthis_widget.js"></script>
<script type="text/javascript">
$('.quantity_button.plus').on('click', function(){
        var oldVal = $('input.quantity').val();
        var newVal = (parseInt($('input.quantity').val(),10) +1);
      $('input.quantity').val(newVal);
    });

    $('.quantity_button.minus').on('click', function(){
        var oldVal = $('input.quantity').val();
        if (oldVal > 1)
        {
            var newVal = (parseInt($('input.quantity').val(),10) -1);
        }
        else
        {
            newVal = 1;
        }
        $('input.quantity').val(newVal);
    });
</script>


<!-- Default scrips below -->    
<script type="text/javascript"><!--
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
	$.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
		type: 'post',
		data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
		dataType: 'json',
		beforeSend: function() {
			$('#recurring-description').html('');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			
			if (json['success']) {
				$('#recurring-description').html(json['success']);
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#button-cart').on('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-cart').button('loading');
		},
		complete: function() {
			$('#button-cart').button('reset');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			$('.form-group').removeClass('has-error');

			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						var element = $('#input-option' + i.replace('_', '-'));
						
						if (element.parent().hasClass('input-group')) {
							element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						} else {
							element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						}
					}
				}
				
				if (json['error']['recurring']) {
					$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
				}
				
				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
			}
			
			if (json['success']) {
				$('#notification').html('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				
				$('#cart-total').html(json['total']);
				
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				$('.alert a').attr('target','_top');
				$('#cart').load('indexe061.html?route=common/cart/info#cart > *'); //Added
			}
		}
	});
});


var compare_qv = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=product/compare/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert').remove();

				if (json['success']) {
					
					
					$('#notification').html('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					$('.success').fadeIn('slow');
					$('.alert a').attr('target','_top');
					$('#compare-total').html(json['total']);
					$('#header_compare').html(json['compare_total']);
					
				}
			}
		});
	}
}

var wishlist_qv = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=account/wishlist/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert').remove();

				if (json['success']) {
					$('#notification').html('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				if (json['info']) {
					$('#notification').html('<div class="alert alert-info"><i class="fa fa-info-circle"></i> ' + json['info'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				$('.success').fadeIn('slow');
				$('.alert a').attr('target','_top');
				$('#wishlist-total').html(json['total']);
				$('#header_wishlist').html(json['wishlist_total']);

				$('html, body').animate({ scrollTop: 0 }, 'slow');
			}
		});
	},
	'remove': function() {

	}
}
//--></script> 
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;
	
	$('#form-upload').remove();
	
	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');
	
	$('#form-upload input[name=\'file\']').trigger('click');
	
	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);
			
			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();
					
					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}
					
					if (json['success']) {
						alert(json['success']);
						
						$(node).parent().find('input').attr('value', json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script> 

	<?php } ?>

</body>

</html>