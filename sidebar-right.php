<div id="sidebar_right2">
	<div id="sidebar240">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Right')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Sidebar Right</h2>
    	<ul>
						<li>Thank you for purchasing Neuro Pro.</li>
						<li>To remove this Widget login to your admin account, go to Appearance, then Widgets and drag new widgets into Sidebar Right.</li>
					</ul>
    	</div>
		
		<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Archives</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
        <div class="sidebar-widget-style">
        <h2 class="sidebar-widget-title">Categories</h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">WordPress</h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
	
	<?php endif; ?>
	</div><!--end sidebar150-->
</div><!--end sidebar_right-->