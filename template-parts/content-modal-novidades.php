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
            <input type="text" value="" placeholder="Pesquisar_" class="ajax-search_input">
            <button type="submit" class="ajax-search_button"><i class="fab fa-sistrix"></i></button>
        </form>
        <div id="ajax-filter" class="ajax-filter_container">
            <button href="#" value="artigos">Artigos</button>
            <button href="#" value="novidades">Novidades</button>
            <button href="#" value="noticias">Noticias</button>
          
        </div>
    </div>


    <div class="posts posts-novidades" id="posts-filter_results"></div>

</div>
