<?php if(is_search()) : ?>
<div id="contextualInfo">
	<p><?php echo sprintf(__("Search results for <span>%s</span>", "mandm"), get_search_query()); ?></p>
</div>
<?php endif; ?>

<?php if(is_tag()) : ?>
<div id="contextualInfo">
	<p><?php echo sprintf(__("Posts tagged with <span>%s</span>", "mandm"), single_tag_title("", false)); ?></p>
</div>
<?php endif; ?>

<?php if(is_category()) : ?>
<div id="contextualInfo">
	<?php $categories = get_the_category(); ?>
	<p><?php echo sprintf(__("所属分类： <span>%s</span>", "mandm"), $categories[0]->cat_name); ?></p>
</div>
<?php endif; ?>

<?php if(is_year()) : ?>
<div id="contextualInfo">
	<p><?php echo sprintf(__("Posts published during <span>%s</span>", "mandm"), get_the_time('Y')); ?></p>
</div>
<?php endif; ?>

<?php if(is_month()) : ?>
<div id="contextualInfo">
	<p><?php echo sprintf(__("Posts published during <span>%s</span>", "mandm"), get_the_time('F, Y')); ?></p>
</div>
<?php endif; ?>

<?php if(is_day()) : ?>
<div id="contextualInfo">
	
	<p><?php echo sprintf(__("Posts published at <span>%s</span>", "mandm"), get_the_time('m/d/Y')); ?></p>
</div>
<?php endif; ?>