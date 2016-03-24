<?php

add_shortcode( 'quick-cart', 'my_tickets_short_cart' );
add_filter( 'universal_top_of_header', 'my_tickets_short_cart', 10, 1 );
add_filter( 'milky_way_top_of_header', 'my_tickets_short_cart', 10, 1 );
/**
 * Shortcode to add quick cart to site. Shows current number of tickets and total value plus link to checkout.
 *
 * @param return string
 */
function my_tickets_short_cart() {
	$options     = array_merge( mt_default_settings(), get_option( 'mt_settings' ) );
	$cart        = mt_get_cart();
	$total       = mt_total_cart( $cart );
	$tickets     = mt_count_cart( $cart );
	$ticket_text = apply_filters( 'mt_quick_cart_ticket_text', sprintf( __( '%s tickets', 'my-tickets' ), "<span class='mt_qc_tickets'>$tickets</span>" ) );
	$url         = get_permalink( $options['mt_purchase_page'] );
	$checkout    = apply_filters( 'mt_quick_cart_checkout', sprintf( __( '<a href="%s">Checkout</a>', 'my-tickets' ), $url ) );
	return "
		<div class='mt-quick-cart' aria-live='polite'>" .
	     __( 'In your cart: ', 'my-tickets' ) . "$ticket_text
			<span class='divider'>|</span> 
			<span class='mt_currency'>" . mt_symbols( $options['mt_currency'] ) . "</span><span class='mt_qc_total'>" . number_format( $total, 2 ) . "</span>
			<span class='divider'>|</span> 
			$checkout
		</div>";
}

add_shortcode( 'ticket', 'mt_registration_form_shortcode' );
/**
 * Shortcode to generate ticketing form. Required attribute: event="event_id"
 *
 * @param $atts
 * @param string $content
 *
 * @return string
 */
function mt_registration_form_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts(
		array(
			'event' => false,
			'view'  => 'calendar',
			'time'  => 'month'
		), $atts ) );
	if ( $event ) {
		return mt_registration_form( $content, $event, $view, $time, true );
	}

	return '';
}

add_shortcode( 'tickets', 'mt_featured_tickets' );
/**
 * Produce a list of featured tickets with a custom template and registration forms.
 *
 * @param $atts
 * @param string $content
 *
 * @return string
 */
function mt_featured_tickets( $atts, $content = '' ) {
	extract( shortcode_atts(
		array(
			'events'   => false,
			'view'     => 'calendar',
			'time'     => 'month',
			'template' => '<h3>{post_title}: {event_begin format="l, F d"}</h3><p>{post_excerpt}</p>',
		), $atts ) );
	if ( $events ) {
		$events = explode( ',', $events );
	}
	$content = '';
	if ( is_array( $events ) ) {
		foreach ( $events as $event ) {
			$event_data = get_post_meta( $event, '_mc_event_data', true );
			$post       = get_post( $event, ARRAY_A );
			if ( is_array( $post ) && is_array( $event_data ) ) {
				$data       = apply_filters( 'mt_ticket_template_array', array_merge( $event_data, $post ) );
				$event_data = "<div class='mt-event-details'>" . mt_draw_template( $data, $template ) . "</div>";
				$content .= "<div class='mt-event-item'>" . $event_data . mt_registration_form( '', $event, $view, $time, true ) . "</div>";
			}
		}
	}

	return "<div class='mt-event-list'>".$content."</div>";
}


/* 
 * Add {register} form to My Calendar templating for upcoming events lists, etc.
 */
add_filter( 'mc_filter_shortcodes', 'mt_add_shortcode', 5, 2 );
/**
 * Insert {register} quicktag into the My Calendar templating array.
 *
 * @param $e
 * @param $event
 *
 * @return mixed
 */
function mt_add_shortcode( $e, $event ) {
	$e['register'] = mt_registration_form( '', $event->event_post );

	return $e;
}