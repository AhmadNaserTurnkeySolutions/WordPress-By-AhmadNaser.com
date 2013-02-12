function new_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 7; 
}
add_filter('excerpt_length', 'new_excerpt_length');
