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


    <div class="posts posts-novidades" id="posts-filter_results">
        
    <?php
            // Novidades
            $posts = new WP_Query(array(
                'category' => pll_get_term(19) && pll_get_term(26) && pll_get_term(28),
                'posts_per_page' => -1
            ));
            
            $response = '';

            // The Query
            if ( $posts->have_posts() ) {
                while ( $posts->have_posts() ) {
                    $posts->the_post();
                    $response .= get_template_part('/template-parts/post-box');
                }
            } else {
                $response .= _e('Tente pesquisar novamente procurando por outra palavra-chave ou navegue entre as categorias', 'ericsonscorsim');
            }

            echo $response;

            wp_reset_postdata();
               
    ?>         

                   
    </div>

</div>
