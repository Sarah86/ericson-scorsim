<?php

/**
 * Conteudo para a news lists - mais novidades
 *
 * @package WordPress
 * @subpackage Ericson_Scorsim
 */

?>


<div class="novidades post_content">
    <div class="novidades_ajax-form">
        <form id="ajax-search" class="ajax-search_form">
            <input type="text" value="" placeholder="<?php _e('pesquisar', 'ericsonscorsim') ?>_" class="ajax-search_input">
            <button type="submit" class="ajax-search_button"><i class="fab fa-sistrix"></i></button>
        </form>
        <div id="ajax-filter" class="ajax-filter_container">
            <button href="#" value="<?php _e('artigos', 'ericsonscorsim') ?>"><?php _e('artigos', 'ericsonscorsim') ?></button>
            <button href="#" value="<?php _e('novidades', 'ericsonscorsim') ?>"><?php _e('novidades', 'ericsonscorsim') ?></button>
            <button href="#" value="<?php _e('notícias', 'ericsonscorsim') ?>"><?php _e('notícias', 'ericsonscorsim') ?></button>
          
        </div>
    </div>


    <div class="posts posts-novidades" id="posts-filter_results"></div>

</div>
