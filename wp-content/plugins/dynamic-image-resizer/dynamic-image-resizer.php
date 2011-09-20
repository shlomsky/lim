<?php /*
Plugin Name: Dynamic Image Resizer
Plugin URI: http://ottopress.com
Description: Change the WordPress image uploader system to do image resizing on the fly.
Author: Otto42
Author URI: http://ottodestruct.com
Version: 1.0
*/

// disable plugin on multisite
if (is_multisite()) return;

// do the dynamic resizing of the image when the 404 handler is invoked and it's for a non-existant image
add_action('template_redirect', 'dynimg_404_handler');
function dynimg_404_handler() {
	if ( !is_404() ) return;
	
	if (preg_match('/(.*)-([0-9]+)x([0-9]+)(c)?\.(jpg|png|gif)/i',$_SERVER['REQUEST_URI'],$matches)) {
		$filename = $matches[1].'.'.$matches[5];
		$width = $matches[2];
		$height = $matches[3];
		$crop = !empty($matches[4]);
		
		$uploads_dir = wp_upload_dir();
		$temp = parse_url($uploads_dir['baseurl']);
		$upload_path = $temp['path'];
		$findfile = str_replace($upload_path, '', $filename);
		
		$basefile = $uploads_dir['basedir'].$findfile;
		
		$suffix = $width.'x'.$height;
		if ($crop) $suffix .='c';
	
		if ( file_exists($basefile) ) {
			// we have the file, so call the wp function to actually resize the image
			$resized = image_resize($basefile, $width, $height, $crop, $suffix);
			
			// find the mime type
			foreach ( get_allowed_mime_types( ) as $exts => $mime ) {
				if ( preg_match( '!^(' . $exts . ')$!i', $matches[5] ) ) {
					$type = $mime;
					break;
				}
			}

			// serve the image this one time (next time the webserver will do it for us)
			header( 'Content-Type: '.$type );
			header( 'Content-Length: ' . filesize($resized) );
			readfile($resized);
			exit;
		}
	}
}

// prevent WP from generating resized images on upload
add_filter('intermediate_image_sizes_advanced','dynimg_image_sizes_advanced');
function dynimg_image_sizes_advanced($sizes) {
	global $dynimg_image_sizes;
	
	// save the sizes to a global, because the next function needs them to lie to WP about what sizes were generated
	$dynimg_image_sizes = $sizes;

	// force WP to not make sizes by telling it there's no sizes to make
	return array();
}

// trick WP into thinking images were generated anyway
add_filter('wp_generate_attachment_metadata','dynimg_generate_metadata');
function dynimg_generate_metadata($meta) {
	global $dynimg_image_sizes;
			
	foreach ($dynimg_image_sizes as $sizename => $size) {
		// figure out what size WP would make this:
		$newsize = image_resize_dimensions($meta['width'], $meta['height'], $size['width'], $size['height'], $size['crop']);

		if ($newsize) {
			$info = pathinfo($meta['file']);
			$ext = $info['extension'];
			$name = wp_basename($meta['file'], ".$ext");

			$suffix = "{$newsize[4]}x{$newsize[5]}";
			if ($size['crop']) $suffix .='c';

			// build the fake meta entry for the size in question
			$resized = array(
				'file' => "{$name}-{$suffix}.{$ext}",
				'width' => $newsize[4],
				'height' => $newsize[5],
			);

			$meta['sizes'][$sizename] = $resized;
		}
	}
	
	return $meta;
}
