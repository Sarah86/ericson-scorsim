<?php

/**
 * Home Page
 */

get_header();
?>

<main id="site-content" role="main">

    <?php

    $archive_title    = '';
    $archive_subtitle = '';

    if (is_search()) {
        global $wp_query;

        $archive_title = sprintf(
            '%1$s %2$s',
            '<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
            '&ldquo;' . get_search_query() . '&rdquo;'
        );

        if ($wp_query->found_posts) {
            $archive_subtitle = sprintf(
                /* translators: %s: Number of search results */
                _n(
                    'We found %s result for your search.',
                    'We found %s results for your search.',
                    $wp_query->found_posts,
                    'twentytwenty'
                ),
                number_format_i18n($wp_query->found_posts)
            );
        } else {
            $archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty');
        }
    } elseif (!is_home()) {
        $archive_title    = get_the_archive_title();
        $archive_subtitle = get_the_archive_description();
    }

    if ($archive_title || $archive_subtitle) {
        ?>

        <header class="archive-header has-text-align-center header-footer-group">

            <div class="archive-header-inner section-inner medium">

                <?php if ($archive_title) { ?>
                    <h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
                <?php } ?>

                <?php if ($archive_subtitle) { ?>
                    <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
                <?php } ?>

            </div><!-- .archive-header-inner -->

        </header><!-- .archive-header -->

    <?php
    }


    ?>

    <div class="home">
        <div class="posts">

            <?php
            // Novidades
            $novidades = new WP_Query(array(
                'category_name' => 'novidades',
                'posts_per_page' => 1,
            ));
            ?>

            <?php if ($novidades->have_posts()) : ?>
                <?php while ($novidades->have_posts()) : $novidades->the_post(); ?>

                    <div class="posts_box">
                        <h2>Novidades</h2>
                        <?php the_title(); ?>
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais button-primary">Leia Mais</a>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

            <?php
            // Ultimas Noticias
            $noticias = new WP_Query(array(
                'category_name' => 'noticias',
                'posts_per_page' => 1,
            ));
            ?>

            <?php if ($noticias->have_posts()) : ?>
                <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>

                    <div class="posts_box">
                        <h2>Últimas Notícias</h2>
                        <?php the_title(); ?>
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais button-primary">Leia Mais</a>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>


            <?php
            // Artigos
            $artigos = new WP_Query(array(
                'category_name' => 'artigos',
                'posts_per_page' => 1,
            ));
            ?>

            <?php if ($artigos->have_posts()) : ?>
                <?php while ($artigos->have_posts()) : $artigos->the_post(); ?>

                    <div class="posts_box">
                        <h2>Artigos</h2>
                        <?php the_title(); ?>
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais button-primary">Leia Mais</a>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

        </div>
        <div class="newsletter">
            <h2 class="newsletter_title"><?php _e('Nossa Newsletter', 'twentytwentychild'); ?></h2>
            <form class="newsletter_input-group">
                <input class="newsletter_input-group-field" type="email" placeholder="Email" required>
                <button class="newsletter_button"><?php _e('Inscrever-me', 'twentytwentychild'); ?></button>
            </form>
        </div>
        <div class="atuacaoeperfil">
            <div class="atuacaoeperfil_box">
                <div class="atuacao">
                    <h2 class="atuacao__title title-with-top-border">Atuação</h2>
                    <div class="atuacao_box">
                        <div class="atuacao_content">
                            <h4 class="atuacao__title">Direito Administrativo e regulatório</h3>
                                <a href="" class="atuacao__detalhes">Detalhes</a>
                        </div>
                        <div class="atuacao_arrows">
                            <span class="atuacao_arrow-left">
                                <
                            </span>
                            <span class="atuacao_arrow-right">
                                >
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atuacaoeperfil_box">
                <div class="perfil">
                    <h2 class="perfil_title title-with-top-border">Perfil</h2>
                    <div class="perfil_image">
                        <?php 
							$image = wp_get_attachment_image_src( get_theme_mod( 'perfil_image' ), 'full' );
							echo '<img src="' . $image[0] . '"/></a>'; 
						?>
                        <div class="ball-shadow"></div>
                    </div>
                    <p class="perfil_description">
                            O sócio fundador Ericson M. Scorsim é advogado e consultor em Direito Público, especializado no Direito da Comunicação.
                    </p>
                    <a href="" class="perfil_leiamais">Leia mais --></a>
                </div>
            </div>
        </div>
        <div class="maislidas">
            <?php
            // Mais Lidas
            $maislidas = new WP_Query(array(
                'posts_per_page' => 3,
                'meta_key' => 'popular_posts',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            ));
            ?>

            <?php if ($maislidas->have_posts()) : ?>
                <h2 class="maislidas_titulo">Mais Lidas</h2>
                <div class="maislidas_noticias">
                    <?php while ($maislidas->have_posts()) : $maislidas->the_post(); ?>

                        <div class="maislidas_noticia">
                            <div class="divider"></div>
                            <?php the_title(); ?>
                        </div>


                    <?php endwhile; ?>
                </div>

                <?php wp_reset_postdata(); ?>
                <?php
                    // Get the ID of a given category
                    $category_id = get_cat_ID('noticias');

                    // Get the URL of this category
                    $category_link = get_category_link($category_id);
                    ?>

                <!-- Print a link to this category -->
                <a href="<?php echo esc_url($category_link); ?>" title="Veja todas as notícias" class="button-primary">Veja todas as notícias</a>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

        </div>

        <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
