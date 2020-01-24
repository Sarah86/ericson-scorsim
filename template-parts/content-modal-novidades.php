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
        <?php wp_list_categories(array(
            'orderby'    => 'name',
            'show_count' => true,
            'include' => array(19, 26, 28)
        )); ?>
    </ul>
</div>

<div>
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
    <?php
        if ($terms = get_terms(array(
                    'taxonomy' => 'category', 
                    'orderby' => 'name',
                    'include' => array(19, 26, 28)
                    ))
            ) :

            echo '<ul class="categoryfilter">';
            foreach ($terms as $term) :
                echo '<li id="' . $term->term_id . '">' . $term->name . '</li>'; // ID of the category as the value of an option
            endforeach;
            echo '</ul>';
        endif;
    ?>
    <input type="hidden" name="action" value="myfilter">
</form>
<div id="response"></div>
</div>