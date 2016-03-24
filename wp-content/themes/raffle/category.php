<?php get_header() ?>

<?php
// get parent category on category page
$catID = 0;
if (is_category()) {
    $category = get_category(get_query_var('cat'));
    $catID = $category->term_id;
}
// if ($categories) {
//  foreach($categories as $term) { 
//  	echo $term->term_id;
// }
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="raffle-ticket raffle-content">


                    <h1><?php single_cat_title(); ?></h1>


                    <div class="content-blog">

                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


                            <?php
                            $blog = array('post_type' => 'blog', 'cat' => $catID, 'posts_per_page' => -1, 'orderby' => 'id', 'order' => 'DESC');

                            $loop = new WP_Query($blog);

                            ?>
                            <?php if ($loop->have_posts()): ?>
                                <div class="row blog">
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

                            <?php endif;
                            wp_reset_postdata(); ?>
                        </div>


                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
