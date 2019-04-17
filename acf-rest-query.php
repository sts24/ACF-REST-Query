<?php
/*
	Plugin Name: ACF REST Query
	Plugin URI: https://github.com/sts24/ACF-REST-Query
	Author: Scott Smith
	Author URI: https://www.smithscott.net
	Description: Adds support for getting a REST API request with the parameter matching an Advanced Custom Field
	Version: 1.0
	Network: true
	License: GPL-2.0+
	License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/



if(!function_exists('sts_custom_request_param')){
	
	function sts_custom_request_param($args, $request){

		foreach($_GET as $key=>$value){
			if(strpos($key, 'acf_') !== false){
				$args['meta_query'] = array(
					array(
						'key'     => str_replace('acf_','',$key),
						'value'   => $_GET[$key],
						'compare' => '=',
					)
				);
			}
		}

		return $args;
	}

}
	

if(!function_exists('sts_custom_request')){
	function sts_custom_request($request){

		global $wp_query;
		$post_types = get_post_types(array('_builtin'=>false,'public'=>true),'objects');

		foreach($post_types as $pt){
			
			add_filter('rest_'.$pt->name.'_query', 'sts_custom_request_param', 99,2);
		}
		add_filter('rest_post_query', 'sts_custom_request_param', 99,2);

	}

	add_filter('rest_api_init', 'sts_custom_request', 99, 2);

}

?>