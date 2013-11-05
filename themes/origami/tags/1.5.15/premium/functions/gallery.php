<?php

function origami_premium_gallery_attachment_link($fields, $post){
	$url = get_post_meta($post->ID, 'slide_url', true);
	$fields['origami_slide_url'] = array(
		'label' => __('Target URL', 'origami'),
		'input' => 'html',
		'html' => '<input name="attachments['.$post->ID.'][slide_url]" id="attachment-'.$post->ID.'-slide_url" type="text" value="'.esc_attr($url).'" />',
		'value' => $url
	);
	
	return $fields;
}
add_filter('attachment_fields_to_edit', 'origami_premium_gallery_attachment_link', 10, 2);

/**
 * Save the attachment form meta.
 * @param $post
 * @return mixed
 *
 * @filter attachment_fields_to_save
 */
function origami_premium_gallery_attachment_link_save($post){
	if(!empty($_POST['attachments'][$post['ID']])){
		$current = get_post_meta($post['ID'], 'slide_url', true);
		$url = isset($_POST['attachments'][$post['ID']]['slide_url']) ? $_POST['attachments'][$post['ID']]['slide_url'] : '';
		update_post_meta($post['ID'], 'slide_url', $url, $current);
	}

	return $post;
}
add_filter('attachment_fields_to_save', 'origami_premium_gallery_attachment_link_save', 10, 2);

function origami_premium_gallery_add_before_link($return, $attachment, $target_blank){
	$url = get_post_meta($attachment->ID, 'slide_url', true);
	if(!empty($url)) $return .= '<a href="' . esc_url($url) . '" '. (!empty($target_blank) ? 'target="_blank"' : '') .'>';
	
	return $return;
}
add_filter('origami_slide_before', 'origami_premium_gallery_add_before_link', 10, 3);

function origami_premium_gallery_add_after_link($return, $attachment){
	$url = get_post_meta($attachment->ID, 'slide_url', true);
	if(!empty($url)) $return .= '</a>';

	return $return;
}
add_filter('origami_slide_after', 'origami_premium_gallery_add_after_link', 10, 2);