<?php 


/*
 * Plugin Name:       WooCommerce checkbox
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Prideda checkbox i greito redagavimo langeli
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Lukas Ščiukas
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       test-uzd
 * Domain Path:       /languages
 */


 function produktas_is_tiekejo_edit() {
    global $woocommerce, $post;

    ?>
    <div class="options_group">
        <?php
            woocommerce_wp_checkbox( 
                array( 
                    'id'            => '_istiek', 
                    'wrapper_class' => 'is_tiek', 
                    'label'         => '', 
                    'description'   => __( 'Prekė užsakyta pas tiekėją', 'test-uzd' ) 
                    )
                );
        ?>
    </div>
    <?php

}


 add_action('woocommerce_product_quick_edit_start', 'produktas_is_tiekejo_edit');


 function produkto_quick_edit_save ($data) {
    $checkboxas = isset($_POST['_istiek']) ? 'yes' : "no";
    update_post_meta($data->id,'_istiek', $checkboxas);
 }


 add_action('woocommerce_product_quick_edit_save', 'produkto_quick_edit_save',10,2);


 function checkbox_duomenys() {

    $istiek = get_post_meta(get_the_ID(),'_istiek');
    if ($istiek[0]  === 'yes'){
        ?><p><?php
        esc_html_e('Prekės pristatymo terminas - iki 14 d.d.','test-uzd');
        ?></p><?php
    }
    

 }

 add_action('woocommerce_after_single_product_summary','checkbox_duomenys');
