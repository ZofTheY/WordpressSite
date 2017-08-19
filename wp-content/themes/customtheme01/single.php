<?php

get_header();

?>
<div class="content-container clearfix">
	<div class="article-container">
<?php
if (have_posts()){
	while(have_posts()){
		the_post();
		?>
		<article class="article">
			<div class="article-title">
				<h2><?php the_title()?></h2>
			</div>
			<div class="article-content">
			<?php the_content(); ?>
			</div>
		</article>
		<?php
	}
} else {
	echo '<p>No posts found</p>';
}
?>
	</div>
	<aside class="twitter-feed">
		
	</aside>
	<aside class="sidebar-container">
		<div class="social-wrapper">

		</div>
	</aside>
</div>
<?php

get_footer();

?>