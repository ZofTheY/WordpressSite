</div><!-- container -->

<footer class="footer-container">
	<ul class="footer-social clearfix">
		<li><a>Facebook</a></li>
		<li><a>Twitter</a></li>
		<li><a>LinkenIn</a></li>
		<li><a>Instagram</a></li>
	</ul>
	<div class="footer-wrapper">
		<a href="#">Privacy</a> 
		<span class="line"></span>
		<a href="#">Feedback</a>
		<span class="line"></span>
		<a href="#">Cookies</a>
	</div>
	<div class="copyright">
		<p>&copy; 2017</p>
	</div>
	<?php 
	wp_footer(); 

	$arg = array('theme_location' => 'footer');
	wp_nav_menu($args);

	?>
	<!-- <p><?php //bloginfo('name'); ?> - &copy; <?php // echo date('Y');?></p> -->
</footer>
</body>
</html>