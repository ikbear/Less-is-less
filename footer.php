<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
		<div id="footer">
			<p id="footerInfo">
			<?php echo sprintf(__('Powered by %1$s!<br/>Theme "LESS IS LESS" was created by %2$s, Modified by %3$s' , "mandm"), '<a href="http://wordpress.org/">'.__('"WordPress"', "mandm").'</a>', '<a href="http://miguelSantirso.es/">Miguel Santirso</a>', '<a href="http://www.helishi.net/">何李石</a>!'); ?></p>
			<div id="footerOptions">
				<p>(走的好远啊！) <a href="#">回顶端</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.start.helishi.net/sitemap_baidu.xml">(Baidu Sitemap</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.helishi.net/sitemap.xml">'Google Bing Yahoo's Sitemap)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.start.helishi.net/wp-admin/">Admin</a>&nbsp;&nbsp;&nbsp;&nbsp;<script src="http://s16.cnzz.com/stat.php?id=2782623&web_id=2782623" language="JavaScript"></script></p>
			</div>
		</div>
		
		<?php wp_footer(); ?>
</body>
</html>
