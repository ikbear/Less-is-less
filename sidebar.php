<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
	<div id="sidebar">
		<div id="blogLogo">
			<h1 id="blogTitle"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
			<!-- <a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/yourOptionalLogo.png" alt="blog logo"/></a> -->
			<div id="theBlogDescription">
				<p><?php bloginfo('description'); ?></p>
			</div>
		</div>
		
		<div class="about">
			<ul id="widgetBar">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>

				<?php endif; ?>
			</ul>
		</div>
		
		<div class="left-sidecolumn ">
			<ul id="widgetBar">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>


				<?php endif; ?>
			</ul>
		</div>
		
		<div class="right-sidecolumn ">
			<ul id="widgetBar">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>


				<?php endif; ?>
			</ul>
		</div>
	</div>

