<?php
function ministudio_fun_navbar()
{	
$custom_logo_button = get_theme_mod('custom_logo-button',get_template_directory_uri().'/images/logo.png');

$front_services_active = get_theme_mod('ministudio_services_active','1');
$front_portfolio_active = get_theme_mod('ministudio_portfolio_active','1');
$front_pricing_active = get_theme_mod('ministudio_pricing_active','1');
$front_product_active = get_theme_mod('ministudio_shop_active','1');
$front_blog_active = get_theme_mod('ministudio_blog_active','1');
$front_contact_active = get_theme_mod('ministudio_contact_active','1');
?>
<header class="navbar transparent navfixedhide">
	<div class="container">
    	<div class="row">
            <div class="header_top">
        		<div class="col-md-2 col-md-2 col-xs-9">
            		<div class="logo_img">
						<?php if($custom_logo_button){?><a href="<?php echo home_url();?>"><img src="<?php echo $custom_logo_button;?>"></a><?php } ?>
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						 <nav class="navbar navbar-default">
							<div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                  <span class="sr-only"><?php _e( 'Toggle navigation', 'ministudio' ); ?></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
							</div>
							   
							<div id="navbar" class="navbar-collapse collapse"> 
								<ul class="nav navbar-nav">
									<li class="active"><a href="#home" class="js-target-scroll"><?php _e( 'Home', 'ministudio' ); ?></a></li>
									<?php if($front_services_active){?><li><a href="#what_we_do" class="js-target-scroll"><?php _e( 'Services', 'ministudio' ); ?></a></li><?php } ?>
									<?php if($front_portfolio_active){?><li><a href="#recent_work" class="js-target-scroll"><?php _e( 'Portfolio', 'ministudio' ); ?></a></li><?php } ?>
									<?php if($front_pricing_active){?><li><a href="#pricing_table" class="js-target-scroll"><?php _e( 'Pricing', 'ministudio' ); ?></a></li><?php } ?>
									<?php if($front_product_active){?><li><a href="#ltest_product" class="js-target-scroll"><?php _e( 'Shop', 'ministudio' ); ?></a></li><?php } ?>
									<?php if($front_blog_active){?><li><a href="#latest_news" class="js-target-scroll"><?php _e( 'Blog', 'ministudio' ); ?></a></li><?php } ?>
									<?php if($front_contact_active){?><li><a href="#get_touch" class="js-target-scroll"><?php _e( 'Contact', 'ministudio' ); ?></a></li><?php } ?>
								</ul>     
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php
}
?>
<?php
function ministudio_fun_navbar_inner()
{	
$custom_logo_button = get_theme_mod('custom_logo-button',get_template_directory_uri().'/images/logo.png');

$front_services_active = get_theme_mod('ministudio_services_active','1');
$front_portfolio_active = get_theme_mod('ministudio_portfolio_active','1');
$front_pricing_active = get_theme_mod('ministudio_pricing_active','1');
$front_product_active = get_theme_mod('ministudio_shop_active','1');
$front_blog_active = get_theme_mod('ministudio_blog_active','1');
$front_contact_active = get_theme_mod('ministudio_contact_active','1');
?>
<header class="navbar navfixedhide">
	<div class="container">
    	<div class="row">
            <div class="header_top">
        		<div class="col-md-2 col-md-2 col-xs-9">
            		<div class="logo_img">
						<?php if($custom_logo_button){?><a href="<?php echo home_url();?>"><img src="<?php echo $custom_logo_button;?>"></a><?php } ?>
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						 <nav class="navbar navbar-default">
							<div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                  <span class="sr-only"><?php _e( 'Toggle navigation', 'ministudio' ); ?></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
							</div>
							   
							<div id="navbar" class="navbar-collapse collapse">
								<?php if ( has_nav_menu( 'primary' ) ) : ?>
									<?php
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_class'     => 'nav navbar-nav',
										 ) );
									?>	
								<?php endif; ?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php
}
?>
<?php
function ministudio_fun_slider()
{
?>
<section id="banner">
    <div id="owl-demo" class="owl-carousel">
		<?php
		if ( is_active_sidebar( 'sidebar-slider' ) ) :
			dynamic_sidebar( 'sidebar-slider' );
		endif;
		?>
    </div>
</section>
<?php
}
?>
<?php
function ministudio_fun_who_we_are()
{
$front_about_us_active = get_theme_mod('ministudio_about_active','1');
$front_about_us_title = get_theme_mod('ministudio_about_title','Who we are');
$front_about_us_description = get_theme_mod('ministudio_about_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
if($front_about_us_active):
?>
<section id="who_we_are" class="secondary-bg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_about_us_title; ?></h2> 
                </div>
                <div class="section_text">
					<p><?php echo $front_about_us_description; ?></p>
				</div>
            </div>  
            
			<?php
			if ( is_active_sidebar( 'sidebar-about' ) ) :
				dynamic_sidebar( 'sidebar-about' );
			endif;
			?>
        </div>
      </div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_what_we_do()
{
$front_services_active = get_theme_mod('ministudio_services_active','1');
$front_services_title = get_theme_mod('ministudio_services_title','What we do');
$front_services_description = get_theme_mod('ministudio_services_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
if($front_services_active):
?>
<section id="what_we_do" class="primary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_services_title;?></h2> 
                </div>
                <div class="section_text">
                    <p><?php echo $front_services_description;?></p>
                </div>
            </div>
               
			<?php
			if ( is_active_sidebar( 'sidebar-services' ) ) :
				dynamic_sidebar( 'sidebar-services' );
			endif;
			?>
             
      </div>
   </div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_recent_work()
{
$front_portfolio_active = get_theme_mod('ministudio_portfolio_active','1');
$front_portfolio_title = get_theme_mod('ministudio_portfolio_title','Our Recent Works');
$front_portfolio_description = get_theme_mod('ministudio_portfolio_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
if($front_portfolio_active):
?>
<section id="recent_work" class="primary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_portfolio_title;?></h2> 
                </div>
                
                <div class="section_text">
                    <p><?php echo $front_portfolio_description;?></p>
                </div>
                
               <div data-js-module="hero-demo">
                    <div class="filters button-group js-radio-button-group category">
	                    <ul>
                        	<li><button class="button is-checked" data-filter="*"><?php _e( 'All', 'ministudio' ); ?></button></li>
                            <li> /  </li>
    	              		<li><button class="button" data-filter=".web-design"><?php _e( 'Web Design', 'ministudio' ); ?></button></li>  
                            <li> /  </li>  
                      		<li><button class="button" data-filter=".photography"><?php _e( 'Photography', 'ministudio' ); ?></button></li>
                            <li> /  </li>
                      		<li><button class="button" data-filter=".development"><?php _e( 'Development', 'ministudio' ); ?></button></li>
                            <li> /  </li>
                      		<li><button class="button" data-filter=".marketing"><?php _e( 'Marketing', 'ministudio' ); ?></button></li>
                       </ul>
                    </div>  
                      
                    <div class="all_portfolio grid row">
						<?php
						if ( is_active_sidebar( 'sidebar-portfolio' ) ) :
							dynamic_sidebar( 'sidebar-portfolio' );
						endif;
						?>
                  	</div>
                </div>             
			</div>
		</div>
	</div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_pricing_table()
{
$front_pricing_active = get_theme_mod('ministudio_pricing_active');
$front_pricing_title = get_theme_mod('ministudio_pricing_title','Pricing Table');
$front_pricing_description = get_theme_mod('ministudio_pricing_desc');
if($front_pricing_active):
?>
<section id="pricing_table" class="secondary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_pricing_title;?></h2> 
                </div>
                
                <div class="section_text">
                    <p><?php echo $front_pricing_description;?></p>
                </div>
            </div>
            
			<?php
			if ( is_active_sidebar( 'sidebar-pricing' ) ) :
				dynamic_sidebar( 'sidebar-pricing' );
			endif;
			?>
			
		</div>
	</div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_latest_product()
{
$front_product_active = get_theme_mod('ministudio_shop_active','1');
$front_product_title = get_theme_mod('ministudio_shop_title','Our Latest Product');
$front_product_description = get_theme_mod('ministudio_shop_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
if($front_product_active):
?>
<section id="ltest_product" class="secondary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_product_title;?></h2> 
                </div>
                
                <div class="section_text">
                    <p><?php echo $front_product_description;?></p>
                </div>
            </div>
            
			<?php
			$args = array( 'post_type' => 'product', 'posts_per_page' => 8 );
			$loop = new WP_Query( $args );
			$count=1;
			while ( $loop->have_posts() ) : $loop->the_post();
			$regular_price = get_post_meta( get_the_ID(), '_regular_price');
			$sale_price = get_post_meta( get_the_ID(), '_sale_price');
			global $product;
			$price_symbol = get_woocommerce_currency_symbol(  );
			?>
            <div class="col-md-3 col-sm-6">
                <div class="product_detail wow animated fadeInUp">
                    <div class="product_img">
                        <?php the_post_thumbnail(); ?>
                        <div class="btn_hover">
							<a class="btn banner_btn pricing_btn" href="#" data-toggle="modal" data-target="#product_detail_<?php echo $count;?>"><?php _e( 'Order Now', 'ministudio' ); ?></a>
                        </div>
                    </div>
                    <div class="product_tital">
                        <h6> <a href="<?php the_permalink();?>"> <?php the_title();?> </a> </h6>
                        <span> <a href="<?php the_permalink();?>"> <i class="fa fa-cart-plus" aria-hidden="true"></i> </a> </span>
                    </div>
                    <div class="product_price">
                        <p class="old_rate"> <?php echo $price_symbol.$regular_price[0];?> </p>
                        <p class="new_rate"> <?php echo $price_symbol.$sale_price[0];?> </p>
                    </div>
                </div>
            </div>
			
			
			<!-- product-popup-Div-->
			<div class="modal fade bs-example-modal-lg" id="product_detail_<?php echo $count;?>">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							
							<div class="col-md-4">
								<div class="product_image">
									<?php the_post_thumbnail(); ?>
								</div>
							</div>
					
							<div class="col-md-8">
								<h3><?php the_title();?></h3>
								<p class="product_price"><?php echo $price_symbol.$sale_price[0];?></p>
								<div class="product_des">
									<?php the_excerpt();?>
								</div>
						
								<a href="<?php echo do_shortcode('[add_to_cart_url id="'.get_the_ID().'"]');?>" class="btn"><?php _e( 'Order Now', 'ministudio' ); ?></a>
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- end-product-popup-Div-->
			<?php
			endwhile;
			?>
      </div>
   </div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_latest_news()
{
$front_blog_active = get_theme_mod('ministudio_blog_active','1');
$front_blog_title = get_theme_mod('ministudio_blog_title','Latest News');
$front_blog_desciption = get_theme_mod('ministudio_blog_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
if($front_blog_active):
?>
<section id="latest_news" class="primary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="section_heading wow animated fadeInUp">
                    <h2 class="heading"><?php echo $front_blog_title;?></h2> 
                </div>
                <div class="section_text">
                    <p><?php echo $front_blog_desciption;?></p>
              </div>
             </div> 
            
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			$category_id = get_the_category(get_the_ID())[0]->term_id;
			$category_name = get_the_category(get_the_ID())[0]->name;
			?>
            <div class="col-md-4 col-sm-4">
                <div class="latest_news_detail wow animated fadeInUp">
                   <div class="image_detail"> 
                        <div class="post_img">
                            <?php the_post_thumbnail(); ?>
                         </div>
                        <div class="post_date">
                            <p> <?php the_time('j M'); ?></p>
                        </div>
                    </div>
                    <h6 class="heading"> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h6>
                    <div class="category sub_category"> <a href="<?php echo get_category_link( $category_id ); ?> "> <?php echo $category_name; ?> </a> </div>
                    <p> <a href="<?php the_permalink();?>"> <?php _e( 'READ MORE', 'ministudio' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>  </a> </p>
                </div>
            </div>
			<?php
			endwhile;
			?>
             
      </div>
   </div>
</section>
<?php
endif;
}
?>
<?php
function ministudio_fun_get_touch()
{
$front_contact_title = get_theme_mod('ministudio_contact_title','Get in Touch');
$front_contact_description = get_theme_mod('ministudio_contact_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');

$ministudio_formshortcode = get_theme_mod('ministudio_formshortcode');
$ministudio_address = get_theme_mod('ministudio_address','Lorem ipsum dolor sit amet,consectetur adipiscing elit');
$ministudio_email = get_theme_mod('ministudio_email','contact@site.com');
$ministudio_telephone = get_theme_mod('ministudio_telephone','(555)6666');

?>
<section id="get_touch" class="secondary-bg" >
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="section_heading wow animated fadeInUp">
                    <h2><?php echo $front_contact_title;?></h2> 
                </div>
                
             <div class="section_text">
                    <p><?php echo $front_contact_description;?></p>
              </div>
                    
              <div class="col-md-6 col-sm-6">
                  	<div class="contact_detail wow animated fadeInUp">
						<div class="contact_detail_m">
							<div class="contact_form wow animated fadeInUp">
								<?php if($ministudio_formshortcode) { echo do_shortcode('[contact-form-7 id="'.$ministudio_formshortcode.'"]'); } ?>
							</div>
						 </div>
               		</div>
          	  </div>
                            
              <div class="col-md-6 col-sm-6">
                    <div class="find_here wow animated fadeInUp">
                    	<h6> <?php _e( 'Find Us Here', 'ministudio' ); ?> </h6>
                        
						<?php if($ministudio_address){ ?>
            			<div class="find_here_m">
                        	<span><i class="fa fa-home" aria-hidden="true"></i> </span> 
                            <p><?php echo $ministudio_address;?></p>
                        </div>
						<?php } ?>
                        
						<?php if($ministudio_email){ ?>
                        <div class="find_here_m wow animated fadeInUp">
                        	<span> <i class="fa fa-envelope-o" aria-hidden="true"></i> </span> 
                            <p> <a href="mailto:<?php echo $ministudio_email;?>"><?php echo $ministudio_email;?></a> </p>
                        </div>
						<?php } ?>
                        
						<?php if($ministudio_telephone){ ?>
                        <div class="find_here_m wow animated fadeInUp">
                        	<span> <i class="fa fa-phone" aria-hidden="true"></i> </span> 
                            <p><?php echo $ministudio_telephone;?></p>
                        </div>	
						<?php } ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>
<?php
function ministudio_fun_footer()
{
$ministudio_social_media_fb = get_theme_mod('ministudio_social_media_fb','#/');
$ministudio_social_media_tw = get_theme_mod('ministudio_social_media_tw','#/');
$ministudio_social_media_in = get_theme_mod('ministudio_social_media_in','#/');
$ministudio_social_media_gp = get_theme_mod('ministudio_social_media_gp','#/');
$ministudio_footer_copyright = get_theme_mod('ministudio_footer_copyright','Copyright &copy; <a href="http://www.yaythemes.com/product/ministudio/" target="_blank" rel="nofollow">MiniStudio</a> 2016. All rights reserved.');
?>
<footer id="footer" class="third-bg">    
	<div class="footer_bottom">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 pull-right">
                	<ul class="follow_us">
                    	<?php if($ministudio_social_media_fb){?><li><a href="<?php echo $ministudio_social_media_fb; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($ministudio_social_media_tw){?><li><a href="<?php echo $ministudio_social_media_tw; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($ministudio_social_media_in){?><li><a href="<?php echo $ministudio_social_media_in; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($ministudio_social_media_gp){?><li><a href="<?php echo $ministudio_social_media_gp; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
                    </ul>
                </div>
                
                <div class="col-md-6">
                	<?php if($ministudio_footer_copyright){?><p><?php echo $ministudio_footer_copyright;?></p><?php } ?>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<?php
}
?>