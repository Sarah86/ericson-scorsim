<?php

/**
 * Conteudo para a news lists - mais novidades
 *
 * @package WordPress
 * @subpackage Ericson_Scorsim
 */

?>


<div class="no-search-results-form section-inner thin">

    <?php
    get_search_form(
        array(
            'label' => __('search again', 'twentytwenty'),
        )
    );
    ?>

</div>

<div class="categories">
<ul>
    <?php wp_list_categories( array(
        'orderby'    => 'name',
        'show_count' => true,
        'include' => array( 19, 26, 28 )
    ) ); ?> 
</ul>
</div>