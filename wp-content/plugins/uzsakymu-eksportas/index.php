<?php
/*
 * Plugin Name:       WooCommerce užsakymų eksportavimas
 * Description:       Eksportuoja užsakymus į CSV failą
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Lukas Ščiukas
 * License:           GPL v2 or later
 * Text Domain:       uzs-eks
 * Domain Path:       /languages
 */

 define('PLUGINO_FOLDER',plugin_dir_path(__FILE__));


 // Includai
include(PLUGINO_FOLDER . 'includes/eksport-menu.php');
include(PLUGINO_FOLDER . 'includes/eksport.php');
include(PLUGINO_FOLDER . 'includes/eksport-puslapis.php');

 //Hookai
 add_action('admin_menu', 'prideti_menu');
 add_action('admin_post_eksportuoti','eksportuoti_duomenis');

