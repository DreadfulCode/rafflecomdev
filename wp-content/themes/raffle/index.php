<?php get_header() ?>


<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

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
                            <?php if (!is_front_page() || is_page('faq')): ?>
                                <h1><?php the_title() ?></h1>
                            <?php endif ?>

                            <?php the_content() ?>
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('full', ['class' => 'img-responsive']);
                            }
                            if (is_single()) {
                                echo '<a href="/ticket-pricing-colors" style="margin-top:20px" class="btn btn-primary">Purchase</a>';
                            }
                            ?>
                        

                        <?php endwhile; ?>


                    <?php endif;
                    wp_reset_postdata(); ?>


                    <div class="clearfix">&nbsp;</div>
                    <?php if (is_page('testimonial')): ?>

                        <?php get_template_part('partials/testimonial'); ?>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <?php //do_shortcode('[wpuf_addpost]'); ?>

                                <form id="" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post"
                                      class="form-horizontal">
                                    <?php wp_nonce_field('add_testimonial', 'security-code-here'); ?>
                                    <input name="action" value="add_testimonial" type="hidden">
                                    <legend>Tell Us How We Did:</legend>

                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" required id="" name="name"
                                               placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Website</label>
                                        <input type="url" class="form-control" required id="" name="website"
                                               placeholder="Website">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Testimonial</label>
                                        <textarea name="content" id="inputContent" required class="form-control"
                                                  rows="3" required="required" placeholder="Testimonial"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php endif ?>


                    <?php if (is_page('scholarship-entries')): ?>
                        <?php
                        //loop

                        $blog = new WP_Query([
                            'connected_items' => get_queried_object_id(),
                            'nopaging' => false,
                            'posts_per_page' => 1,
                            'paged' => $paged,
                            'post_type' => 'scholarship-entries'
                        ]);


                        ?>

                        <?php if ($blog->have_posts()): while ($blog->have_posts()): $blog->the_post(); ?>
                            <hr>

                            <h1><?php the_title() ?></h1>
                            <?php the_content() ?>


                        <?php endwhile; ?>

                            <?php
                            if (function_exists('vb_pagination')) {
                                vb_pagination($blog);
                            }
                            ?>


                        <?php endif;
                        wp_reset_postdata(); ?>


                    <?php endif; ?>
                           

                    <h4 class="text-center">If you have any questions about our Raffle Tickets <a
                            href="/contact-us">Contact us</a></h4>
                       

                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
