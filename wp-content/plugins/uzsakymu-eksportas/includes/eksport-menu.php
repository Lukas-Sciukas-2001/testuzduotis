<?php
 function prideti_menu() {
    add_menu_page(
        __('užsakymų eksportavimas','uzs-eks'),
        __('užsakymų eksportavimas','uzs-eks'),
        'edit_theme_options',
        'uzsakymu-eksportas',
        'eksportuoti_uzsakymus_puslapis',
        ''
        
    );
}