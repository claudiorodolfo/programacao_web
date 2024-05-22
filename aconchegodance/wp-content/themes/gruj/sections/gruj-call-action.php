<?php 
	$gruj_hs_cta				= get_theme_mod('hide_show_call_actions','on'); 
	$gruj_cta_bg_setting		= get_theme_mod('call_action_background_setting',esc_url(get_template_directory_uri() .'/images/cta.jpg'));
	$gruj_cta_btn_lbl			= get_theme_mod('call_action_button_label');
	$gruj_cta_btn_link			= get_theme_mod('call_action_button_link');
	$gruj_cta_btn_target		= get_theme_mod('call_action_button_target');
	$gruj_cta_btn_middle_text	= get_theme_mod('call_action_btn_middle_text');
	$gruj_cta_button_label2		= get_theme_mod('call_action_button_label2');
	$gruj_cta_button_link2		= get_theme_mod('call_action_button_link2');
	$gruj_cta_button_title		= get_theme_mod('call_action_button_title','');
	$gruj_cta_button2_icon		= get_theme_mod('call_action_button2_icon','fa-phone');
	$gruj_cta_button_review_ttl	= get_theme_mod('call_action_review_ttl');	
	$gruj_cta_button_label4		= get_theme_mod('call_action_button_label4');
	$gruj_cta_button_link4		= get_theme_mod('call_action_button_link4','');
	$gruj_cta_button_icon4		= get_theme_mod('call_action_button_icon4','fa-arrow-circle-right');
	$gruj_cta_img				= get_theme_mod('call_action_img',esc_url(get_template_directory_uri() .'/images/cta.jpg'));	
	$gruj_cta_img_icon			= get_theme_mod('call_action_img_icon','fa-comments');
	if($gruj_hs_cta == 'on') :
?>
<section id="cta-unique" class="call-to-action-gruj wow fadeInDown">
	<img src="<?php echo get_stylesheet_directory_uri() .'/images/line1.png' ?>" alt="line1"/>
	<div class="background-overlay">
        <div class="container">
            <div class="row padding-top-25 padding-bottom-25">                
                <div class="col-md-6">
					<div class="cta-row">
						<div class="cta-icon-wrap">
							<?php if(!empty($gruj_cta_img)): ?>
							<div class="cta-bg"><img src="<?php echo esc_url($gruj_cta_img); ?>"><i class="fa <?php echo esc_attr($gruj_cta_img_icon); ?>"></i></div>
							<?php endif; ?>
						</div>
						<div class="the_content">
							<?php 
								$gruj_aboutusquery1 = new wp_query('page_id='.get_theme_mod('call_action_page',true)); 
								if( $gruj_aboutusquery1->have_posts() ) 
								{   while( $gruj_aboutusquery1->have_posts() ) { $gruj_aboutusquery1->the_post(); 
								?>
								<h2 class="demo1"> <?php the_title(); ?> <span class="rotate"> <?php the_content(); ?></span> </h2>
								
								<?php if(!empty($gruj_cta_button_review_ttl)): ?>
								<p class="ttl"><?php echo wp_kses_post($gruj_cta_button_review_ttl); ?></p>
								<?php endif; ?>	
								<?php } } wp_reset_postdata(); ?>
						</div>
					</div>
				</div>			
				
                <div class="col-md-6 text-right flexing flexing-lg-end">
					<?php if(!empty($gruj_cta_button_icon4) || !empty($gruj_cta_button_title) || !empty($gruj_cta_button_label4)): ?>
							<?php if(!empty($gruj_cta_button_label4)): ?>
							<div class="buton4">
								<a href="<?php echo esc_url($gruj_cta_button_link4); ?>" class="global-btn bt-white btn1"><?php echo esc_html($gruj_cta_button_label4); ?> <?php if(!empty($gruj_cta_button_icon4)): ?></i>
								<?php endif; ?>
								</a>
							</div>
							<?php endif; ?>
					<?php endif; ?>	
					
					<?php if(!empty($gruj_cta_button2_icon) || !empty($gruj_cta_button_title) || !empty($gruj_cta_button_label2)): ?>
					<div class="call-wrapper">
						<?php if(!empty($gruj_cta_button2_icon)): ?>
							<div class="call-icon-box"><i class="fa <?php echo esc_attr($gruj_cta_button2_icon); ?>"></i></div>
							<?php endif; ?>	
							<div class="cta-info">
							<?php if(!empty($gruj_cta_button_title)): ?>
											<div class="call-title"><?php echo wp_kses_post($gruj_cta_button_title); ?></div>
											<?php endif; ?>
								<?php if(!empty($gruj_cta_button_label2)): ?>
							<div class="call-phone"><a href="tel:<?php echo esc_url($gruj_cta_button_link2); ?>"><?php echo wp_kses_post($gruj_cta_button_label2); ?></a></div>
							<?php endif; ?>		
							</div>							
					</div>
						<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<?php endif; ?>
