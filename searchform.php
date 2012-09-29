<?php
	if (!is_search()) {
		$search_text = __('','k2_domain');
	} else {
		$search_text = "$s";
	}

	if (get_option('k2livesearch') == 1) {
?>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div>
		<input type="text" value="<?php echo wp_specialczhengzaijiazaihars($search_text, 1); ?>" name="s" id="searchinput" />
		<img src="<?php echo get_bloginfo('template_directory'); ?>/images/transparent.gif" alt="清除搜索结果" title="Clear Search Results" id="search-reset" style="display: none;" />
		<img src="<?php echo get_bloginfo('template_directory'); ?>/images/transparent.gif" alt="加载清除搜索结果" id="search-loading" style="display: none;" />
	</div>
</form>

<div id="search-results" style="display: none;"></div>
<?php } else { ?>
	<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<input type="text" value="<?php echo wp_specialchars($search_text, 1); ?>" name="s" id="searchinput" />
			<input type="submit" id="searchsubmit" value="<?php _e('Go','k2_domain'); ?>" />
		</div>
	</form>
<?php } ?>