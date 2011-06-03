<?php
/*
Template Name: Neuro Pro Homepage
*/
$options = get_option('neuro') ;  
$enable = $options['ne_enable_twitter']
?>


<?php get_header(); ?>

<div id="content_wrap_feature">

	<div id="content_fullwidth">
		
	<!--Insert Feature Slider-->
	
	<?php 
	
		$hideslider = $options['ne_hide_slider'];
		$sliderplacement = $options['ne_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
			<?php get_template_part('slider', 'featurepage' ); ?>
		<?php endif;?>
		<?php if ($enable == '1') : ?>
		<?php include (TEMPLATEPATH . '/pro/twitter.php' ); ?>
		<?php endif ;?>
		<?php $hidecallout = $options['ne_hide_callout'] ?>
		<?php if ($hidecallout != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/callout.php' ); ?>
		<?php endif;?>
	
		
		
	<?php $hideboxes = $options['ne_hide_boxes']; ?>
		<?php if ($hideboxes != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/boxes.php' ); ?>
		<?php endif;?>
	</div><!--end content_fullwidth-->

</div><!--end content_wrap-->

<div style="clear:both;"></div>
<?php get_footer(); ?>
