<div id="sidebar_left">
	<div id="sidebar240">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Left')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Sidebar Left</h2>
    	<ul>
						<li>Thank you for purchasing Neuro Pro.</li>
						<li>To remove this Widget login to your admin account, go to Appearance, then Widgets and drag new widgets into Sidebar Right.</li>
					</ul>
    	</div>
		
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Pages</h2>
    	<?php wp_list_pages('title_li=' ); ?>
    	</div>
    	
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Subscribe</h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
    	</div>
	
	<?php endif; ?>
	</div><!--end sidebar150-->
</div><!--end sidebar_left-->