<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
	<div id="sidebar">
			
		<ul id="widgetBar">
			<?php if ( (is_home() || is_page() || is_single()) && (!function_exists('dynamic_sidebar') || !dynamic_sidebar(2)) ) : ?>
			<?php endif; ?>
		</ul>
		
	</div>

