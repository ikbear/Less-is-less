<?php get_header(); ?>

	<div id="content">
		<div id="mainContent">
		
		<?php include (TEMPLATEPATH . '/contextualInfo.php'); ?>
		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
				
				<div <?php if(function_exists('post_class')) post_class(); ?> id="post">
					
					<div class="postTitle">
						<?php if(!is_page()): ?>
							<p class="postDate"><?php the_date(); ?></p>
						<?php endif; ?>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('%s', 'mandm'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
					</div>
				<div class="entry">
				<?php the_content(__('阅读本文余下部分 &raquo;&raquo;', 'mandm')); ?>
				<?php if(is_single()): ?>
					<div class="postmetadata_head">
					<p>Posted in <?php the_category(', ') ?>.</p>
					</div>
				<?php endif; ?>
				</div>

					<?php edit_post_link(__('编辑', 'mandm')); ?>
					
					<div class="commentsWrapper">
					<?php comments_template('', true); ?>
					</div>
					
				</div>
	
			<?php endwhile; ?>
			
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link(__('&laquo; 上一页', 'mandm')) ?></div>
				<div class="alignright"><?php previous_posts_link(__('下一页 &raquo;', 'mandm')) ?></div>
			</div>
	
		<?php else : ?>
	
			<h2 class="center"><?php _e("网页找不到", "mandm"); ?></h2>
			<p class="center"><?php _e("嘿嘿，你确定要找只是这些吗？要不看看别的？", "mandm"); ?></p>
			<?php get_search_form(); ?>
	
		<?php endif; ?>
	
		</div><!-- main content -->
		<?php get_sidebar(); ?>		
	</div> <!-- content -->

<?php get_footer(); ?>  
