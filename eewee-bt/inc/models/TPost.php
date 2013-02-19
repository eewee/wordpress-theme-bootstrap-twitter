<?php 
//namespace FrEeweeThemeEeweeBtTPost
//if( !class_exists(TPost)){
	class TPost{
		
		public function __construct(){}

		/**
		 * return categ list
		 * @param array $args
		 */
		public function getCategList($args=array()){
			$defaults = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false );
			$tbl = array_merge($defaults, $args);
			return get_categories( $tbl );
		}
		
		/**
		 * return last news
		 * @param array $args
		 */
		public function getPosts($args=array()){
			$defaults = array(
		    'numberposts'     => 3,
		    'offset'          => 0,
		    'category'        => '',
		    'orderby'         => 'post_date',
		    'order'           => 'DESC',
		    'include'         => '',
		    'exclude'         => '',
		    'meta_key'        => '',
		    'meta_value'      => '',
		    'post_type'       => 'post',
		    'post_mime_type'  => '',
		    'post_parent'     => '',
		    'post_status'     => 'publish' );
			$tbl = array_merge($defaults, $args);
			return get_posts( $tbl );
		}
		
	}//fin class
//}//fin if