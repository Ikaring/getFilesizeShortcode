<?php 
/*
Plugin Name: Get Filesize Shortcode
Plugin URI: http://ika-ring.net
Description: Simple shortcode to get filesize of given file( eg. PDF, JPG, zip, )
Version: 1.0
Author: Kan Ikawa
Author URI: http://ika-ring.net
License: GPL2

  Copyright 2015 Kan Ikawa (email : kan@ika-ring.net)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Usage: [filesize url="http://wordpress.com/path/to/filename.pdf"]
function get_filesize( $atts ) {
	extract( shortcode_atts( array(
		'url' => '',
	), $atts ) );

    //Replace url to directory path
    $path = str_replace( site_url('/'), ABSPATH, $atts['url'] );
    
    if ( is_file( $path ) ){
      $filesize = size_format( filesize( $path ) );
    } else {
      $filesize="ファイルがみつかりません";
    }
    return $filesize;

}
add_shortcode('filesize', 'get_filesize');