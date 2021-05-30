<?php
/**
 * Plugin Name: ToDo List Bartlomiej Zajac
 * Plugin URI: http://bartholomewzajac.pl/todo-list-plugin/
 * Description: This plugin create a todo list on your website.
 * Version: 1.0
 * Author: Bartlomiej Zajac
 * Author URI: http://bartholomewzajac.pl/
 */

 class BzToDo {

    public function __construct()
    {
        // Add styles and scipts
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
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

 }

 new BzToDO;