<?php get_header() ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="raffle-ticket raffle-content">

                    <?php echo get_the_post_thumbnail(473, 'full', ['class' => 'img-responsive']); ?>


                    <div class="content-blog">


                        <?php if (have_posts()) : ?>

                            <?php while (have_posts()) : the_post(); ?>
                                <h1><?php the_title() ?></h1>
                                <?php the_content() ?>

                                <p>To read go here >>> <a href="<?php the_permalink() ?>"><?php the_title() ?></a></p>
                                <p>Category >>> <?php echo get_the_term_list($post->ID, 'category', '', ', ', '') ?></p>
                                <p class="italic"><?php the_field('you_can_help') ?></p>
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', ['class' => 'img-responsive center-block']);
                                }
                                ?>
                            <?php endwhile; ?>

                            <?php comment_form($post->ID); ?>

                        <?php endif;
                        wp_reset_postdata(); ?>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
