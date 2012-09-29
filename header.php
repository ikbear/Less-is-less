<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="resource-type" content="document" />
        <meta http-equiv="content-language" content="zh-cn" />
        <meta http-equiv="author" content="何李石" />
        <meta http-equiv="contact" content="sunikbear#gmail.com" />
        <meta name="copyright" content="Copyright (c)2010 何李石. All Rights Reserved." />
        <meta name="description" content="何李石个人blog，关注技术" />
        <meta name="keywords" content="何李石, Ikbear, blog, IT, He Lishi, python, php, ruby, wireless,sensor,WSN,networking, 移动互联网, 物联网, 无线传感器网络, 创业, 投资, 资本" />
	<meta name="wumiiVerification" content="8a169395-24fa-4fa0-bf94-d1fbbd951b9e" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/colors_<?php echo strtolower($liltheme_color_scheme); ?>.css" type="text/css" media="screen" />

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		
		<script type="text/javascript">
			<!--
				function submitenter(myfield,e)
				{
					var keycode;
					if (window.event) keycode = window.event.keyCode;
					else if (e) keycode = e.which;
					else return true;
					
					if (keycode == 13)
					{
						myfield.form.submit();
						return false;
					}
					else
						return true;
				}
			-->
		</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20637500-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	</head>
	<body>

		<div id="header">
			<div id="headerContent">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				<ul id="blogMenu">
					<li class="<?php echo is_home() ? 'selected' : ''; ?>"><a href="<?php echo get_option('home'); ?>"><?php _e("Home", "mandm"); ?></a></li>
					<li class="<?php echo is_archive() || is_single() ? 'selected' : ''; ?>" id="archiveOption"><a id="archiveLink" href="<?php echo get_option('home'); ?>"><?php _e("分类", 'mandm'); ?></a>
						<ul id="archiveDropdown">
							<?php wp_list_categories('sort_column=menu_order&title_li='); ?>
						</ul>
					</li>
					<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
								

				</ul>

			</div>
			<div style="clear: both;"></div>
		</div>