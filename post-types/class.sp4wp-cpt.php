<?php

if ( ! class_exists( 'SP4WP_Post_Type' ) ){

    class SP4WP_Post_Type{

        function __construct(){

            add_action( 'init', array( $this, 'create_post_type' ) );
        }

        public function create_post_type(){

            $rewrite = array(
                'slug'                  => 'projeto',
                'with_front'            => true,
                'pages'                 => true,
                'feeds'                 => true,
            );

            register_post_type( 'sp4wp', array(
                'label' => 'Projeto', 
                'description' => 'Projetos', 
                'labels' => array(
                    'name' => 'Projetos', 
                    'singular_name' => 'Projeto'
                ), 
                'public' => true, 
                'supports' => array( 'title', 'editor', 'thumbnail' ), 
                'hierarchical' => false, 
                'show_ui' => true, 
                'show_in_menu' => true, 
                'menu_position' => 5, 
                'show_in_admin_bar' => true, 
                'show_in_nav_menus' => true, 
                'can_export' => true, 
                'has_archive' => 'portfolio', 
                'exclude_from_search' => false, 
                'publicly_queryable' => true, 
                'query_var' => 'projeto', 
                'rewrite' => $rewrite, 
                'show_in_rest' => true, 
                'menu_icon' => 'dashicons-images-alt2'
            ));
        }
    }
}