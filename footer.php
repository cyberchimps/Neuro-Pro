<?php

/*
	
	Footer
	
	Establishes the widgetized footer and static post-footer section of iFeature. 
	
	Copyright (C) 2011 CyberChimps
	
*/
$options = get_option('neuro') ;  
?>
	
	
	</div><!--end main-->
	
		
<div id="footer">
    <div id="footer_wrap">
    	
    	<?php if (dynamic_sidebar("Footer")) : else : ?>
		
		<div class="footer-widgets">
			<h3>Recent Posts</h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>
		
		<div class="footer-widgets">
			<h3>Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=16'); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3>Links</h3>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3>WordPress</h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
			<?php endif; ?>
		<div class="clear"></div>

		<!--Inserts Google Analytics Code-->
		<?php  $analytics = $options['ne_ga_code']; ?>
		<?php echo stripslashes($analytics); ?>
			   
		
	</div><!--end footer_wrap-->
	<div id="afterfooter">
		<div id="afterfooterwrap">
			<!--Inserts Copyright Text-->
			<?php  $copyright = $options['ne_footer_text']; ?>
				<?php if ($copyright == ''): ?> 
					<div id="afterfootercopyright">
						&copy; <?php echo bloginfo ( 'name' );  ?>
					</div>
				<?php endif;?>
				<?php if ($copyright != ''):?> 
					<div id="afterfootercopyright">
						&copy; <?php echo $copyright; ?>
					</div>
				<?php endif;?>
			<!--Inserts Afterfooter Menu-->
			<?php 
								$hidelink		= $options['ne_hide_link'];
							?>
							<?php if ($hidelink == "0" ):?>
					<div id="credit" style="margin: auto;">
						<a href="http://cyberchimps.com"><img src="<?php echo get_template_directory_uri(); ?>/images/cyberchimps.png" alt="CyberChimps WordPress Themes" title="CyberChimps WordPress Themes" /></a>
					</div>
			<?php endif;?>
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
</div><!--end footer-->
</div><!--end page_wrap-->	
	
	
<?php wp_footer(); ?>	
</body>

</html>
