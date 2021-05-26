<?php
/**
 * Plugin Name: ToDo List Bartlomiej Zajac
 * Plugin URI: http://bartholomewzajac.pl/todo-list-plugin/
 * Description: This plugin create a todo list on your website.
 * Version: 1.0
 * Author: Bartlomiej Zajac
 * Author URI: http://bartholomewzajac.pl/
 */

//  if ( !defined('ABSPATH') )
//  {
//      echo 'what?';
//      exit;
//  }

 class BzToDo {

    public function __construct()
    {
        // Add new CPT
        add_action('init', array($this, 'create_custom_post_type'));

        // Add styles and scipts
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        // Load code
        add_action('bz-todo', array($this, 'load_code'));
    }

    public function create_custom_post_type()
    {
        
        $args = array(

            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'taxonomies' => array('topics', 'category' ),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'ToDo List',
                'singular_name' => 'Task'
            ),
            'menu_icon' => 'dashicons-editor-ol',
        );

        register_post_type('ToDo List', $args);

    }

    public function load_assets()
    {
        wp_enqueue_style(
            'bz-todo',
            plugin_dir_url( __FILE__ ) . 'css/bz-todo.css',
            array(),
            1,
            'all'
        );
        
        wp_enqueue_script(
            'bz-todo',
            plugin_dir_url( __FILE__ ) . 'js/bz-todo.js',
            array('jquery'),
            1,
            true
        );
    }

    public function load_code()
    {
        return 'works';
    }

 }

 new BzToDO;