<?php
/*

	Section: Boxes
	Author: Tyler Cunningham
	Description: Creates widgetized box area
	Version: 0.1
	
*/
?>

<div id="box_container">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Box") ) : ?>
			<div class="box1">
				<h2 class="box-widget-title">Advanced Customization</h2>
					<p>Neuro Pro offers anyone the ability to customize a modern WordPress Theme.</p>
					<p>With Neuro Pro's intuitive design options, anyone can create a beautiful modern WordPress website.</p>
			</div><!--end box1-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Center Box") ) : ?>
			<div class="box2">
				<h2 class="box-widget-title">Developer Friendly</h2>
						<p>While Neuro Pro is built for everyone, we included advanced features for designers and developers to easily add Custom CSS, Import / Export theme settings, and support for CSS3 and HTML5.</p>				
			</div><!--end box2-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Box") ) : ?>
			<div class="box3">			
				<h2 class="box-widget-title">Need Help?</h2>
						<p>We designed Neuro Pro to be as user friendly as possible, but if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">Support Forum</a>, and <a href="http://www.cyberchimps.com/neuropro/docs/">precise documentation</a>.</p>
			</div><!--end box3-->
	<?php endif; ?>

</div><!--end boxes.php-->