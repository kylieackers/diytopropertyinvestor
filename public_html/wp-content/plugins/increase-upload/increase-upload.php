<?php
/* Plugin Name: Increase Upload Limit */

add_filter( 'upload_size_limit', 'gr_increase_upload' );

function gr_increase_upload( $bytes ) {
	return 33554432; // 32 megabytes
}
?>
