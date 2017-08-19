<?php
get_header();

$args = array(
'posts_per_page' => get_option('posts_per_page'),
);

$defaultQuery = new WP_Query($args);

?>
<div class="content-container clearfix">
	<div class="article-container">
<?php
if ($defaultQuery->have_posts()){
	while($defaultQuery->have_posts()){
		$defaultQuery->the_post();
		?>
		<article class="article">
			<div class="article-title">
				<h2><a href="<?php the_permalink();?>"><?php the_title()?></a></h2>
			</div>
			<div class="article-content">
				<?php 
				the_content(); 
				?>
			</div>
		</article>
		<?php
	}
} else {
	echo '<p>No posts found</p>';
}
wp_reset_postdata();
?>

		<a id="btnLoad" class="btn-more-posts">
			<span class="btnLoadText">Load more articles</span>
		</a>

	</div>

	<aside class="twitter-feed">
		
	</aside>

	<aside class="sidebar-container">
		<div class="social-wrapper">

		</div>
		<input type="input" class="search-bar">

		</input>
	</aside>
</div>
<?php

get_footer();
?>