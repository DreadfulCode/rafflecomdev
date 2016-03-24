<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// PHP functions common to all pro packages
function mt_check_license( $key = false, $product, $store ) {
	// listen for our activate button to be clicked
	if( isset( $_POST[ $key ] ) ) {
		// run a quick security check
		if( ! check_admin_referer( 'license', '_wpnonce' ) )
			return; // get out if we didn't click the Activate button
		// retrieve the license from the database
		$license = trim( $_POST[ $key ] );
		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'activate_license',
			'license' 	=> $license,
			'item_name' => urlencode( $product ), // the name of our product in EDD,
			'url'       => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( $store, array(
			'timeout'   => 15,
			'sslverify' => false,
			'body'      => $api_params
		) );
		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;
		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "active" or "inactive"
		return $license_data->license;
	}

	return false;
}

function mt_verify_key( $option, $name, $store ) {
	$message = '';

	$key = strip_tags( $_POST[ $option ] );
	update_option( $option, $key );

	if ( $key != '' ) {
		$confirmation = mt_check_license( $key, $name, $store );
	} else {
		$confirmation = 'deleted';
	}
	$previously = get_option( $option . '_valid' );
	update_option( $option . '_valid', $confirmation );
	if ( $confirmation == 'inactive' ) {
		$message = sprintf( __( "That %s key is not active.", 'my-tickets' ), $name );
	} else if ( $confirmation == 'active' ) {
		if ( $previously == 'true' || $previously == 'active' ) {
		} else {
			$message = sprintf( __( "%s key validated. Enjoy!", 'my-tickets' ), $name );
		}
	} else if ( $confirmation == 'deleted' ) {
		$message = sprintf( __( "You have deleted your %s license key.", 'my-tickets' ), $name );
	} else {
		$message = sprintf( __( "%s received an unexpected message from the license server. Try again in a bit.", 'my-tickets' ), $name );
		delete_option( $option );
	}
	$message = ( $message != '' ) ? " $message " : $message; // just add a space

	return $message;
}