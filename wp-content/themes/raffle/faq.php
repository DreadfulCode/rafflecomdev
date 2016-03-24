<?php //Template Name: FAQ Template ?>
<?php get_header() ?>

<?php if (is_front_page()): ?>
    <?php get_template_part('partials/ticket'); ?>
<?php endif ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="raffle-ticket raffle-content">

                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <?php the_content() ?>

                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>

                    <?php $arg = ['post_type' => 'faq', 'posts_per_page' => -1];
                    $faq = new WP_Query($arg);
                    ?>

                    <?php if ($faq->have_posts()) : ?>


                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $index = 0;
                            while ($faq->have_posts()) : $faq->the_post();
                                ++$index; ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="head-<?php echo $index ?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#faq-<?php echo $index ?>" aria-expanded="true"
                                               aria-controls="faq-<?php echo $index ?>">
                                                <?php echo get_the_title() ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="faq-<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="head-<?php echo $index ?>">
                                        <div class="panel-body">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>


                    <?php endif;
                    wp_reset_postdata(); ?>


                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
