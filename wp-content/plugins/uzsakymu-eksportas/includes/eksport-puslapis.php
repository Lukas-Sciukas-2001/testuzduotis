<?php

function eksportuoti_uzsakymus_puslapis(){
    ?>
    <?php
        if(isset($_GET['statusas']) && $_GET['statusas'] == '1'){
            ?>
                <div class="notice notice-success inline">
                    <p><?php esc_html_e('Duomenys sėkmingai eksportuoti į CSV failą', 'uzs-eks'); ?></p>
                </div>
            <?php
        }
    ?>
    
        <form novalidate="novalidate" method="POST" action="admin-post.php">
            <input type="hidden" name="action" value="eksportuoti">
            <label for="nuo">Data nuo</label>
            <input type="date" name="nuo" id="nuo"/>
            <label for="iki">Data iki</label>
            <input type="date" name="iki" id="iki"/>
            <?php
                wp_nonce_field('eksport_patikrinti');
                submit_button("Eksportuoti","primary","eksportuoti_duomenis");
            ?>
        </form>
    <?php
}