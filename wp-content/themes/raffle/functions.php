<?php
require_once('wp_bootstrap_navwalker.php');
require_once('wp_bootstrap_pagination.php');
//require_once("ShippingCalculator.php");

// load theme files
function theme_assets()
{

    wp_enqueue_style('style_css', get_stylesheet_uri());
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('carousel_js', get_template_directory_uri() . '/assets/lib/owl.carousel/owl-carousel/owl.carousel.js', array('jquery'), true);
    wp_enqueue_script('sweet_js', get_template_directory_uri() . '/assets/lib/sweetalert-master/dist/sweetalert.min.js', array('jquery'), true);
    wp_enqueue_script('maskedinput_js', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', array('jquery'), true);
    wp_enqueue_script('classypaypal_js', get_template_directory_uri() . '/assets/js/jquery.classypaypal.js', array('jquery'), true);
    wp_enqueue_script('uiblock_js', get_template_directory_uri() . '/assets/js/jquery.blockUI.js', array('jquery'), true);

}

add_action('wp_enqueue_scripts', 'theme_assets');


add_theme_support('menus');
add_theme_support('post-thumbnails');

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

function the_slug($echo = true)
{

    $slug = basename(get_permalink());

    do_action('before_slug', $slug);

    $slug = apply_filters('slug_filter', $slug);

    if ($echo) echo $slug;

    do_action('after_slug', $slug);

    return $slug;

}

function create_widget($name, $id, $desc)
{
    register_sidebar(array(
        'name' => __($name),
        'id' => $id,
        'description' => $desc,
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

create_widget('Subscriber Widget', 'subscriber-widgets', 'Display the Subscriber');
create_widget('Social Widget', 'social-widgets', 'Display the Social');
add_post_type_support('page', 'excerpt');
function custom_excerpt_length($length)
{
    return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);


add_action('wp_ajax_createTicket', 'prefix_ajax_createTicket');
add_action('wp_ajax_nopriv_createTicket', 'prefix_ajax_createTicket');
function prefix_ajax_createTicket()
{

    header('Content-Type: application/json');
    $valid = true;
    if (empty($_POST) || !wp_verify_nonce($_POST['security-code-here'], 'createTicket')) {
        $valid = false;
        echo json_encode(['success' => false, 'message' => 'Error Accured!']);
    }

    //if(isset($_POST)){
    $error = '';
    if (empty($_POST["fullname"])) {
        $error = "Full Name Required";
        $valid = false;
    } else if (empty($_POST["email"])) {
        $error = "Email Required";
        $valid = false;
    } else if (empty($_POST["day_phone"])) {
        $error = "Day Phone Required";
        $valid = false;
    } else if (empty($_POST["phone_number"])) {
        $error = "Phone No Required";
        $valid = false;
    } else if (empty($_POST["zip_code"])) {
        $error = "Zipcode Required";
        $valid = false;
    } else if (empty($_POST["address"])) {
        $error = "Address Required";
        $valid = false;
    } else if (empty($_POST["ticket_c_total"])) {
        $error = "Ticket Amount Required";
        $valid = false;
    } else if (empty($_POST["phone_number"])) {
        $error = "Phone Number Required";
        $valid = false;
    } else {
        $valid = true;
    }

    if (!$valid) {
        echo json_encode(['success' => false, 'message' => $error]);
    }

    if ($valid) {
        $ticket = array(
            'post_title' => ucfirst($_POST['fullname']) . '--Total:' . $_POST['ticket_c_total'],
            'post_date' => date('Y-m-d H:i:s'),
            'post_status' => 'publish',
            'post_type' => 'ticket',
        );
        if ($_POST['payment_method'] == 'credit_debit') {
            $payment_method = 'Authorized Net';
        } else if ($_POST['payment_method'] == 'paypal') {
            $payment_method = 'Paypal';
        } else {
            $payment_method = 'Not Define';
        }
        $the_post_id = wp_insert_post($ticket);
        add_post_meta($the_post_id, 'fullname', $_POST['fullname'], true);
        add_post_meta($the_post_id, 'email', $_POST['email'], true);
        add_post_meta($the_post_id, 'business_name', $_POST['business_name'], true);
        add_post_meta($the_post_id, 'day_phone', $_POST['day_phone'], true);
        add_post_meta($the_post_id, 'phone_number', $_POST['phone_number'], true);
        add_post_meta($the_post_id, 'email', $_POST['email'], true);
        add_post_meta($the_post_id, 'ticket_c_billing', $_POST['ticket_c_billing'], true);
        add_post_meta($the_post_id, 'ticket_c_shipping', $_POST['address'], true);
        add_post_meta($the_post_id, 'zip_code', $_POST['zip_code'], true);
        add_post_meta($the_post_id, 'city', $_POST['city'], true);
        add_post_meta($the_post_id, 'fax', $_POST['fax'], true);
        add_post_meta($the_post_id, 'state', $_POST['state'], true);
        add_post_meta($the_post_id, 'delivery', $_POST['delivery'], true);
        add_post_meta($the_post_id, 'ticket_c_quantity', $_POST['ticket_c_quantity'], true);
        add_post_meta($the_post_id, 'ticket_c_total', $_POST['ticket_c_total'], true);
        add_post_meta($the_post_id, 'ticket_c_color', $_POST['ticket_c_color'], true);
        add_post_meta($the_post_id, 'ticket_c_style', $_POST['ticket_c_style'], true);
        add_post_meta($the_post_id, 'extra_line', $_POST['extra_line'], true);
        add_post_meta($the_post_id, 'printing_back', $_POST['printing_back'], true);
        add_post_meta($the_post_id, 'stub_body', $_POST['stub_body'], true);
        add_post_meta($the_post_id, 'change_instruction', $_POST['change_instruction'], true);
        add_post_meta($the_post_id, 'stapling_book', $_POST['stapling_book'], true);
        add_post_meta($the_post_id, 'stapling_description', $_POST['stapling_description'], true);
        add_post_meta($the_post_id, 'padding_book', $_POST['padding_book'], true);
        add_post_meta($the_post_id, 'padding_description', $_POST['padding_description'], true);
        add_post_meta($the_post_id, 'artwork_file', $_POST['artwork_file'], true);
        add_post_meta($the_post_id, 'special_description', $_POST['special_description'], true);
        add_post_meta($the_post_id, 'special_amount', $_POST['special_amount'], true);
        add_post_meta($the_post_id, 'payment_method', $payment_method, true);
        add_post_meta($the_post_id, 'artwork_file', $_POST['artwork_uploaded'], true);

        // if (!empty($_POST['artwork_uploaded'])) {
        // }

        $repeater_field = 'ticket_line';
        $repeater_key = 'field_56c703d645c6b';
        $sub_field_line = 'line';
        $sub_field_line_key = 'field_56c703eb45c6c';
        $sub_field_size = 'font_size';
        $sub_field_size_key = 'field_56c703f445c6d';
        $sub_field_normal = 'font_normal';
        $sub_field_normal_key = 'field_56c7042645c6e';
        $sub_field_italic = 'font_italic';
        $sub_field_italic_key = 'field_56c7043445c70';
        $sub_field_bold = 'font_bold';
        $sub_field_bold_key = 'field_56ca9f27f5edf';

        // my_acf_pre_save_post($the_post_id);

        $values = $_POST['line'];
        $count = count($values);
        // print_r($count);
        if ($count) {
            // the db value stored in the db for a repeater is
            // the number if rows in the repeater
            add_post_meta($the_post_id, $repeater_field, $count, true);
            add_post_meta($the_post_id, '_' . $repeater_field, $repeater_key, true);
            for ($i = 0; $i < $count; $i++) {
                // the actual field name in the DB is a concatenation of
                // the repeater field name, the index of the current row
                // and the sub field name, with underscores added
                $sub_field_line_name = $repeater_field . '_' . $i . '_' . $sub_field_line;
                add_post_meta($the_post_id, $sub_field_line_name, $values[$i]['text'], true);
                add_post_meta($the_post_id, '_' . $sub_field_line, $sub_field_line_key, true);

                $sub_field_size_name = $repeater_field . '_' . $i . '_' . $sub_field_size;
                add_post_meta($the_post_id, $sub_field_size_name, $values[$i]['font_size'], true);
                add_post_meta($the_post_id, '_' . $sub_field_size, $sub_field_size_key, true);

                $sub_field_normal_name = $repeater_field . '_' . $i . '_' . $sub_field_normal;
                add_post_meta($the_post_id, $sub_field_normal_name, $values[$i]['normal'], true);
                add_post_meta($the_post_id, '_' . $sub_field_normal, $sub_field_normal_key, true);


                $sub_field_bold_name = $repeater_field . '_' . $i . '_' . $sub_field_bold;
                add_post_meta($the_post_id, $sub_field_bold_name, $values[$i]['bold'], true);
                add_post_meta($the_post_id, '_' . $sub_field_bold, $sub_field_bold_key, true);

                $sub_field_italic_name = $repeater_field . '_' . $i . '_' . $sub_field_italic;
                add_post_meta($the_post_id, $sub_field_italic_name, $values[$i]['italic'], true);
                add_post_meta($the_post_id, '_' . $sub_field_italic, $sub_field_italic_key, true);


            }
        }
        echo json_encode([
            'success' => true,
            'message' => 'Form Successfully Submitted!',
            'total' => $_POST['ticket_c_total'],
            'quantity' => $_POST['ticket_c_quantity'],
            'p_id' => $the_post_id
        ]);
    }


    die();

}


add_action('wp_ajax_add_testimonial', 'process_add_testimonial');

function process_add_testimonial()
{

    if (empty($_POST) || !wp_verify_nonce($_POST['security-code-here'], 'add_testimonial')) {

        wp_redirect(home_rl());
        exit;


    } else {

        // do your function here 
        $ticket = array(
            'post_title' => ucfirst($_POST['name']),
            'post_content' => $_POST['content'],
            'post_date' => date('Y-m-d H:i:s'),
            'post_status' => 'pending',
            'post_type' => 'testimonial',
        );

        $the_post_id = wp_insert_post($ticket);
        add_post_meta($the_post_id, 'website', $_POST['website'], true);

        wp_redirect(get_permalink(438));
        exit;
    }

}


add_action('wp_ajax_getAuthorized', 'prefix_ajax_getAuthorized');
add_action('wp_ajax_nopriv_getAuthorized', 'prefix_ajax_getAuthorized');
function prefix_ajax_getAuthorized()
{

    header('Content-Type: application/json');
    $output = '';
    if (empty($_POST)) {
        echo json_encode(['success' => false, 'message' => 'Error Accured!']);
    } else {
        if (!empty($_POST['amount'])) {
            $output = do_shortcode('[authorize_net amount=' . $_POST['amount'] . ']');
            echo json_encode(['success' => true, 'data' => $output]);
        }

    }
    die();
}


add_action('wp_ajax_getUploadFile', 'prefix_ajax_getUploadFile');
add_action('wp_ajax_nopriv_getUploadFile', 'prefix_ajax_getUploadFile');
function prefix_ajax_getUploadFile()
{
    header('Content-Type: application/json');


    if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');
    $uploadedfile = $_FILES['artwork_file'];
    // echo $uploadedfile['type'];
    // die();
    $uploaded_type = $uploadedfile['type'];
    $upload_overrides = array('test_form' => false);

    //      $supported_types = array(
    //        'application/pdf',
    //        'image/jpeg',
    //        'image/gif',
    //        'image/tiff',
    //        'image/x-tiff',
    //        'application/msword',
    //        'application/postscript',
    //        'image/png',
    //        'application/mspowerpoint',
    //        'application/powerpoint',
    //        'text/plain',
    //        'application/plain',
    //        'application/msword',
    //        'application/msword',
    //        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    //        'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
    //        'application/vnd.ms-word.document.macroEnabled.12',
    //        'application/vnd.ms-word.template.macroEnabled.12',
    //        'application/vnd.ms-excel',
    //        'application/vnd.ms-excel',
    //        'application/vnd.ms-excel',
    //        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //        'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
    //        'application/vnd.ms-excel.sheet.macroEnabled.12',
    //        'application/vnd.ms-excel.template.macroEnabled.12',
    //        'application/vnd.ms-excel.addin.macroEnabled.12',
    //        'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
    //        'application/vnd.ms-powerpoint',
    //        'application/vnd.ms-powerpoint',
    //        'application/vnd.ms-powerpoint',
    //        'application/vnd.ms-powerpoint',
    //        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    //        'application/vnd.openxmlformats-officedocument.presentationml.template',
    //        'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
    //        'application/vnd.ms-powerpoint.addin.macroEnabled.12',
    //        'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
    //        'application/vnd.ms-powerpoint.template.macroEnabled.12',
    //        'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
    //      );

    // if(in_array($uploaded_type, $supported_types)) {

    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    if ($movefile) {

        echo json_encode(['success' => true, 'message' => $movefile]);
    } else {
        echo json_encode(['success' => false, 'message' => "Possible file upload attack!\n"]);
    }

    /*   } else {
           echo json_encode(['success' => false, 'type'=> $uploaded_type, 'message' => "The file type that you've uploaded is not a allowed."]);
      } // end if/else
*/


    die();
}

function vb_pagination($query = null)
{

    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999;

    $paginate = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'type' => 'array',
            'total' => $query->max_num_pages,
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
        )
    );

    if ($query->max_num_pages > 1) :
        ?>
        <ul class="pagination">
            <?php
            foreach ($paginate as $page) {
                echo '<li>' . $page . '</li>';
            }
            ?>
        </ul>
        <?php
    endif;
}