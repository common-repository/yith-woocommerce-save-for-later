<?php
if( !function_exists( 'yith_setcookie' ) ) {
    /**
     * Create a cookie.
     *
     * @param string $name
     * @param mixed $value
     * @return bool
     * @since 1.0.0
     */
    function yith_setcookie( $name, $value = array(), $time = null ) {
        $time = $time != null ? $time : time() + 60 * 60 * 24 * 30;

        //$value = maybe_serialize( stripslashes_deep( $value ) );
        $value = json_encode( stripslashes_deep( $value ) );
        $expiration = apply_filters( 'yith_wcwl_cookie_expiration_time', $time ); // Default 30 days

        $_COOKIE[ $name ] = $value;
        wc_setcookie( $name, $value, $expiration, false );
    }
}

if( !function_exists( 'yith_getcookie' ) ) {
    /**
     * Retrieve the value of a cookie.
     *
     * @param string $name
     * @return mixed
     * @since 1.0.0
     */
    function yith_getcookie( $name ) {
        if( isset( $_COOKIE[$name] ) ) {
            return json_decode( stripslashes( $_COOKIE[$name] ), true );
        }

        return array();
    }
}

if( !function_exists( 'yith_usecookies' ) ) {
    /**
     * Check if the user want to use cookies or not.
     *
     * @return bool
     * @since 1.0.0
     */
    function yith_usecookies() {
        return get_option( 'yith_wcwl_use_cookie' ) == 'yes' ? true : false;
    }
}

if( !function_exists ( 'yith_destroycookie' ) ) {
    /**
     * Destroy a cookie.
     *
     * @param string $name
     * @return void
     * @since 1.0.0
     */
    function yith_destroycookie( $name ) {
        yith_setcookie( $name, array(), time() - 3600 );
    }
}


if( !function_exists( 'ywsfl_add_gutenberg_block' ) ){

	function ywsfl_add_gutenberg_block(){

		$block = array(
			'yith-wsfl-saveforlater' => array(
				'title' => __( 'Save for later list', 'yith-woocommerce-save-for-later'),
				'description' => __( 'Show the save for later list in the page','yith-woocommerce-save-for-later'),
				'shortcode_name' => 'yith_wsfl_saveforlater',
				'do_shortcode' => false,
				'keywords' => array( __( 'Save for later', 'yith-woocommerce-save-for-later') ),
				'attributes' => array(
					'title_list' => array(
						'type' => 'text',
						'label' => __('Title', 'yith-woocommerce-save-for-later'),
						'default' => __('Saved for later ', 'yith-woocommerce-save-for-later'),
					),
				)

			)
		);

		yith_plugin_fw_gutenberg_add_blocks( $block );
	}
}