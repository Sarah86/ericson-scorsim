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
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais">Leia Mais</a>
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
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais">Leia Mais</a>
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
                        <a href="<?php the_permalink(); ?>" class="posts_leiamais">Leia Mais</a>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

        </div>
        <div class="newsletter">
            <form>
                <h4 class="newsletter_title"><?php _e('Nossa Newsletter', 'twentytwentychild'); ?></h4>
                <div class="newsletter_input-group">
                    <input class="newsletter_input-group-field" type="email" placeholder="Email" required>
                    <button class="newsletter_button"><?php _e('Inscrever-me', 'twentytwentychild'); ?></button>
                </div>
            </form>
        </div>
        <div class="atuacao-section">
            <div class="atuacao">
                <div class="atuacao_arrow-left"></div>
                <div class="atuacao_box">
                    <h3 class="atuacao__title">Direito Administrativo e regulatório</h3>
                    <a href="" class="atuacao__detalhes">Detalhes</a>
                </div>
                <div class="atuacao_arrow-right"></div>
            </div>
            <div class="perfil">
                <div>
                    <h3 class="perfil_title">Perfil</h3>
                    <div class="perfil_image">
                        <img src="" />
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
                    'posts_per_page'=>3, 
                    'meta_key'=>'popular_posts', 
                    'orderby'=>'meta_value_num', 
                    'order'=>'DESC'
                ));
                ?>

                <?php if ($maislidas->have_posts()) : ?>
                    <h3 class="maislidas_titulo">Mais Lidas</h3>
                    <?php while ($maislidas->have_posts()) : $maislidas->the_post(); ?>

                        <div class="maislidas_noticia">
                            <?php the_title(); ?>
                        </div>
                        

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <a href="">Veja todas as notícias</a>

                <?php else : ?>
                    <p><?php __('No News'); ?></p>
                <?php endif; ?>

            </div>
        </div>



        <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
