<?php //Template Name: Blog Template ?>
<?php get_header() ?>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="raffle-ticket raffle-content">

                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post();
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', ['class' => 'img-responsive']);
                            }
                            ?>
                            <h1><?php the_title() ?></h1>
                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>

                    <div class="content-blog">

                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


                            <?php
                            $blog = array(
                                'post_type' => 'blog',
                                'posts_per_page' => 2,
                                'orderby' => 'id',
                                'order' => 'DESC',
                                'paged' => $paged
                            );
                            $loop = new WP_Query($blog);

                            ?>
                            <?php if ($loop->have_posts()): ?>
                                <div class="row content-blog">
                                    <?php $counter = 0;
                                    while ($loop->have_posts()) : $loop->the_post(); ?>


                                        <h1><?php the_title() ?></h1>
                                        <?php the_excerpt() ?>

                                        <p>To read go here >>> <a
                                                href="<?php the_permalink() ?>"><?php the_title() ?></a>


                                        <p class="italic"><?php the_field('you_can_help') ?></p>

                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('full', ['class' => 'img-responsive center-block']);
                                        }

                                        ?>
                                    <?php endwhile; ?>
                                    <hr class="blog-line">
                                </div>


                                <div class="row">

                                    <?php
                                    if (function_exists('wp_bootstrap_pagination'))
                                        wp_bootstrap_pagination();
                                    ?>
                                </div>

                            <?php endif;
                            wp_reset_postdata(); ?>
                        </div>


                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <?php if (!dynamic_sidebar('Social Widget')) : ?><?php endif ?>
                            <h1>Categories</h1>
                            <?php
                            //list terms in a given taxonomy
                            $taxonomy = 'category';
                            $tax_terms = get_terms($taxonomy);
                            ?>
                            <ul class="list-group">
                                <?php
                                foreach ($tax_terms as $tax_term) {
                                    echo '<li class="list-group-item">' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf(__("View all posts in %s"), $tax_term->name) . '" ' . '>' . $tax_term->name . '</a></li>';
                                }
                                ?>
                            </ul>
                            <?php wp_get_archives(array('type' => 'daily', 'limit' => 16)); ?>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
