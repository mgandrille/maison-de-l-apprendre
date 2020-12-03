<?php
/**
 * Functions which permits to get all informations from Blocks into WordPress
 *
 * @package mda
 */


/**
 * Get all informations depending of the block type
 *
 * @param  array $block
 * @return array	array where the first argument is the type of block
 * 					and the 2nd argument contains all informations depending the type of block
 */
function extract_block_infos($block, $category) {
	switch($block['blockName'])
	{
		case 'core/image' :
			$imgUrl = get_image_url($block);
			// d('image : '.$imgUrl);
			return ['image', $imgUrl];
		// break;

		case 'core/latest-posts' :
			// $args = $block['attrs'];
			$args = array(
				'posts_per_page'    => -1,
				'category'         => $category,
				'orderby'          => 'date',
				'order'            => 'ASC',
				'post_type'         => 'post',
				'post_status'       => 'publish',
				);
			$post_to_show = $block['attrs']['postsToShow'];
			$recent_posts = get_posts($args);
			$latest_post_infos = get_latestPosts_infos($recent_posts, $post_to_show);
			// d('latest posts :', $latest_post_infos);
			return ['latest-post', $latest_post_infos];
		// break;

		case 'core/gallery' :
			$gallery = get_gallery_all_images_sources($block);
			// d('gallery : ', $gallery);
			return ['gallery', $gallery];
		// break;

		case 'core/paragraph' :
			$text = get_text($block);
			return ['text', $text];
		// break;

		case 'core/pullquote' :
			$summary = get_text($block);
			return ['summary', $summary];

		default :
			return '';
	}
}


/**
 * get all the informations of all the posts which are in the latest posts block
 *
 * @param  array $recent_posts
 * @return array
 */
function get_latestPosts_infos($recent_posts, $post_to_show) {
	// d($recent_posts);
	$latest_post_infos = [];

	foreach($recent_posts as $recent_post) {  // pour chaque post contenu dans les posts récents
		// get the id of the post
		$id = intval($recent_post->ID);

		// create an array which contains all information of the post
		$post=[];

		$post['id'] = $id;
		$post['title'] = $recent_post->post_title;

		$thumburl = get_the_post_thumbnail_url($id);  // récupère l'url de l'image à la une
		$post['thumb'] = $thumburl;

		// get the content of the post
		$postContent = $recent_post->post_content;
		// parse the content (in an array of different blocks)
		$postContentBlocks = parse_blocks($postContent);

		foreach($postContentBlocks as $content)
		{
			// get the name of the block
			$blockName = $content['blockName'];

			if($blockName == "core/image" )
			{
				$imgUrl = get_image_url($content);
				$post['image'][] = $imgUrl;
			}
			if($blockName == "core/gallery")
			{
				$gallery = get_gallery_all_images_sources($content);
				$post['gallery'] = $gallery;
			}
			if($blockName == "core/paragraph")
			{
				$text = get_text($content);
				$post['text'][] = $text;
			}
			if($blockName == "core/buttons")
			{
				$button = get_button($content);
				$post['button'] = $button;
			}
		}
		// d($post);
		$latest_post_infos[] = $post;

		// If there is a specific number of post to show, just get them
		if(!empty($post_to_show)) {
			$latest_post_infos = array_slice($latest_post_infos, 0, $post_to_show);
		}
	}

	return $latest_post_infos;
}

/**
 * Get the image url contained in the block "core/image"
 *
 * @param  array $block
 * @return string $imgUrl	the url of the image
 */
function get_image_url($block) {
	$idImg = $block['attrs']['id'];  // id of the image
	$imgUrl = wp_get_attachment_image_url($idImg, true);

	return $imgUrl;
}


/**
 * Get the text contained in the block "core/paragraph"
 *
 * @param  array $block
 * @return string
 */
function get_text($block) {
	$text = implode ($block['innerContent']);
	// extraction of the text from <p> tags
	preg_match('~p>(.*?)</p>~', $text, $paragraph);

	return $paragraph[1];
}

function get_button($block) {
	return implode($block['innerBlocks'][0]['innerContent']);
}


/**
 * Get all the image urls contained in the block "core/gallery"
 *
 * @param  array $block
 * @return array $gallery 	contains all urls of the gallery's images
 */
function get_gallery_all_images_sources($block) {
	// get an array of ids of all images
	$ids = $block['attrs']['ids'];
	if($ids) {
		foreach($ids as $id) {
			// get the url of each image
			$imgurl = wp_get_attachment_image_url($id);
			$gallery[] = $imgurl;
		}
	}
	return $gallery;
}