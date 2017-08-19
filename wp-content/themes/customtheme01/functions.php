<?php


function exportPHPData(){
	$data = [
		"publishedPosts" => wp_count_posts()->publish
	];
	wp_localize_script('ajaxLoadMorePosts', 'PHPobj', $data);
}

function importInternalFiles(){
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.2.1.min.js');
	wp_enqueue_script('ajaxLoadMorePosts', get_template_directory_uri().'/js/javascript.js',['jquery']); 

	exportPHPData();
}

function breakLongString($string){
	return $string."<a class=".'btn-show-text'.">Show Text</a>";
}

function getContentWithoutEcho(){
	$str = get_the_content();
	$str = apply_filters('the_content', $str);
	$str = str_replace(']]>', ']]&gt;', $str);
	return $str;
}

function getMorePosts(){
	if($_GET['getData']=='posts'){
		$posts = $_GET['postsDisplayed'];
		$args = array(
			'posts_per_page' => get_option('posts_per_page'),
			'offset' => $posts
		);
		$query = new WP_Query($args);
		if($query->have_posts()){
			$arr = [0 =>[]];
			$i = 0;
			while($query->have_posts()){
				$query->the_post();
				$arr[$i]['title'] = the_title('','',false);
				$arr[$i]['content'] = getContentWithoutEcho();
				$arr[$i]['permalink'] = get_permalink();
				$i++;
			}
			echo json_encode($arr);
		}
	}
	wp_die();
}


//add_filter('the_content','breakLongString');
add_action('wp_enqueue_scripts', 'importInternalFiles');
add_action('wp_ajax_nopriv_getMorePosts', 'getMorePosts');
add_action('wp_ajax_getMorePosts', 'getMorePosts');

register_nav_menus(array(
  'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu'),
));

?>