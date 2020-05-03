<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'AAWP_Licensing' ) ) {

    class AAWP_Licensing extends AAWP_Functions {

        public $licensing_server_debug;

        /**
         * Construct the plugin object
         */
        public function __construct( $plugin )
        {
            // Call parent constructor first
            parent::__construct();

            $this->options['licensing'] = get_option( 'aawp_licensing', array() );
            $this->licensing_server_debug = ( isset( $this->options['support']['licensing_server_debug'] ) && $this->options['support']['licensing_server_debug'] == '1' ) ? true : false;

            // Settings functions
            add_filter( $this->settings_tabs_filter, array( &$this, 'add_settings_tabs_filter' ) );
            add_filter( $this->settings_plugins_filter, array( &$this, 'add_settings_plugins_filter' ) );
            add_filter( $this->settings_functions_filter, array( &$this, 'add_settings_functions_filter' ) );

            add_action( 'admin_init', array( &$this, 'add_settings' ) );
            add_action( 'aawp_admin_notices', array( &$this, 'admin_notice_license_key' ) );
            add_filter( 'plugin_row_meta', array( $this, 'admin_add_plugin_row_meta' ), 10, 2 );
            add_action( 'aawp_support_bottom_render', array( &$this, 'settings_support_license_server_debug' ) );
            add_action( 'aawp_admin_notices', array( &$this, 'admin_notice_license_renewal_info' ) );
            add_action( 'aawp_admin_support_core_version', array( &$this, 'admin_support_core_version_update_info' ) );
            add_action( 'aawp_admin_notices', array( &$this, 'admin_notice_update_info' ) );
        }

        /**
         * Add settings functions
         */
        public function add_settings_tabs_filter( $tabs ) {

            $tabs[0] = array(
                'key' => 'licensing',
                'icon' => 'admin-network',
                'title' => __('Licensing', 'aawp')
            );

            return $tabs;
        }

        public function add_settings_plugins_filter( $plugins ) {

            $plugins[] = $this->plugin_name;

            return $plugins;
        }

        public function add_settings_functions_filter( $functions ) {

            $functions[] = 'licensing';

            return $functions;
        }

        /**
         * Admin notice license key
         */
        public function admin_notice_license_key( $notices ) {

            if ( ! $this->show_admin_license_key_notice() )
                return $notices;

            $message = sprintf( wp_kses( __( 'Please <a href="%s">enter a valid license key</a> in order to use the plugin and receive updates.', 'aawp' ), array(  'a' => array( 'href' => array() ) ) ), add_query_arg( 'tab', 'licensing', AAWP_ADMIN_SETTINGS_URL ) );

            $notices[] = array(
                'force' => true,
                'type' => 'error',
                'dismiss' => false,
                'message' => $message
            );

            return $notices;
        }

        public function admin_add_plugin_row_meta( array $links, $file ) {

            if ( strpos( $file, 'aawp' ) === false)
                return $links;

            if ( ! $this->show_admin_license_key_notice() )
                return $links;

            $links[] = '<strong style="color: red;">' . sprintf( wp_kses( __( '<a href="%s" style="color: red;">Unlicensed copy. Please enter a valid license key.</a>', 'aawp' ), array(  'a' => array( 'href' => array(), 'style' => array() ) ) ), add_query_arg( 'tab', 'licensing', AAWP_ADMIN_SETTINGS_URL ) ) . '</strong>';

            return $links;
        }

        private function show_admin_license_key_notice() {
            return ( empty( $this->options['licensing']['key'] ) || empty( $this->options['licensing']['status'] ) || in_array( $this->options['licensing']['status'], array( 'failed', 'missing', 'no_activations_left' ) ) ) ? true : false;
        }

        /**
         * Admin notice license renewal info
         */
        public function admin_notice_license_renewal_info( $notices ) {

            if ( empty( $this->options['licensing']['status'] ) || 'expired' != $this->options['licensing']['status'] || empty( $this->options['licensing']['key'] ) )
                return $notices;

            if ( aawp_is_lang_de() ) {
                $renewal_link = 'https://aawp.de/checkout/?edd_license_key=' . esc_html( $this->options['licensing']['key'] ) . '&download_id=738';
            } else {
                $renewal_link = 'https://getaawp.com/checkout/?edd_license_key=' . esc_html( $this->options['licensing']['key'] ) . '&download_id=1367';
            }

            $message = sprintf( wp_kses( __( 'Your license expired. Please <a href="%s" target="_blank">renew your license</a> in order to receive future updates.', 'aawp' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( $renewal_link ) );

            $notices[] = array(
                'force' => false,
                'type' => 'warning',
                'dismiss' => false,
                'message' => $message
            );

            return $notices;
        }

        /**
         * Admin support info plugin version
         */
        public function admin_support_core_version_update_info() {

            $remote_plugin_version = $this->get_remote_plugin_version();

            if ( $this->is_plugin_update_required() ) {
                $info_color = 'darkorange';
                $info_icon = 'warning';
                $info_text = sprintf( esc_html__( 'Update v%1$s available', 'aawp' ), $remote_plugin_version );
            } else {
                $info_color = 'green';
                $info_icon = 'yes';
                $info_text = sprintf( esc_html__( 'Latest version installed', 'aawp' ), $remote_plugin_version );
            }

            ?>
            &nbsp;<span style="color: <?php echo $info_color; ?>; font-weight: bold;" ><span class="dashicons dashicons-<?php echo $info_icon; ?>"></span>&nbsp;<?php echo $info_text; ?></span>
            <?php
        }

        /**
         * Admin notice update info
         */
        public function admin_notice_update_info( $notices ) {

            if ( ! $this->is_plugin_update_required() )
                return $notices;

            // Don't show notice when license notice already shows up
            if ( $this->show_admin_license_key_notice() )
                return $notices;

            if ( empty( $this->options['licensing']['status'] ) || 'valid' != $this->options['licensing']['status'] )
                return $notices;

            // Manual update info
            $message = sprintf( wp_kses( __( '<a href="%s">Update available</a>.', 'aawp' ), array(  'a' => array( 'href' => array() ) ) ), admin_url( 'update-core.php' ) );
            $message .= '&nbsp;';
            $message .= sprintf( wp_kses( __( 'In case the update does not show up correctly or you prefer updating the plugin by hand, please take a look at our <a href="%s" target="_blank">documentation</a> for a manual plugin update.', 'aawp' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), ( aawp_is_lang_de() ) ? 'https://aawp.de/docs/article/plugin-aktualisieren/' : 'https://getaawp.com/docs/article/updating-the-plugin/' );

            $notices[] = array(
                'force' => false,
                'type' => 'warning',
                'dismiss' => false,
                'message' => $message
            );

            return $notices;
        }


        /**
         * Settings: Register section and fields
         */
        public function add_settings() {

            register_setting(
                'aawp_licensing',
                'aawp_licensing',
                array( &$this, 'settings_licensing_callback')
            );

            add_settings_section(
                'aawp_licensing_section',
                __('Licensing', 'aawp'),
                array( &$this, 'settings_licensing_section_callback' ),
                'aawp_licensing'
            );

            add_settings_field(
                'aawp_licensing_status',
                __( 'Status', 'aawp' ),
                array( &$this, 'settings_licensing_status_render' ),
                'aawp_licensing',
                'aawp_licensing_section'
            );

            add_settings_field(
                'aawp_licensing_key',
                __( 'License key', 'aawp' ),
                array( &$this, 'settings_licensing_key_render' ),
                'aawp_licensing',
                'aawp_licensing_section',
                array('label_for' => 'aawp_licensing_key')
            );

            if ( $this->licensing_server_debug ) {

                add_settings_field(
                    'aawp_licensing_server_overwrite',
                    __( 'License server', 'aawp' ),
                    array( &$this, 'settings_licensing_server_overwrite_render' ),
                    'aawp_licensing',
                    'aawp_licensing_section',
                    array('label_for' => 'aawp_licensing_server_overwrite')
                );
            }

            add_settings_field(
                'aawp_licensing_buttons',
                false,
                array( &$this, 'settings_licensing_buttons_render' ),
                'aawp_licensing',
                'aawp_licensing_section'
            );
        }

        /**
         * Settings callbacks
         */
        public function settings_licensing_callback( $input ) {

            //$this->debug($input);

            // Reset server if overwrite changed
            if ( !empty($input['server_overwrite']) && !empty($this->options['licensing']['server_overwrite']) && $input['server_overwrite'] != $this->options['licensing']['server_overwrite'] ) {
                $input['status'] = false;
                $input['server'] = null;
            }

            if (isset($input['activate']) && !empty($input['key']))  {
                // activate license
                $input = $this->activate_license($input);
            }

            if (isset($input['deactivate']) && !empty($input['key'])) {
                // deactivate license
                $input = $this->deactivate_license($input);
            }

            if ( empty($input['status']) || ( !empty($input['error']) && $input['error'] == 'missing' ) )
                $input['server'] = null;

            // Clear button actions
            if (isset($input['activate']))
                unset($input['activate']);

            if (isset($input['deactivate']))
                unset($input['deactivate']);

            // Return
            return $input;
        }

        public function settings_licensing_section_callback() {

            ?>
            <p>
                <?php _e( 'Please enter your license credentials in order to receive updates.', 'aawp' ); ?>
            </p>
            <?php
        }

        public function settings_licensing_status_render() {

            //$this->debug($this->options['licensing']);

            $status = ( isset ( $this->options['licensing']['status'] ) ) ? $this->options['licensing']['status'] : false;
            $error = ( isset ( $this->options['licensing']['error'] ) ) ? $this->options['licensing']['error'] : null;
            $expires = ( isset ( $this->options['licensing']['expires'] ) ) ? $this->options['licensing']['expires'] : null;

            $text = __('Disconnected', 'aawp');
            $color = 'red';
            $icon = 'no';

            // All fine
            if ( $status == 'valid' ) {
                $icon = 'yes';
                $color = 'green';

                if ( $expires && $expires != 'lifetime' ) {
                    $text = sprintf( __( 'License valid until "%1$s"', 'aawp' ), date("d.m.Y", strtotime($expires)) );
                } else {
                    $text = __('License valid', 'aawp');
                }
            }

            // Error validation
            $error_validation = $this->get_license_error_validation( $error );

            if ( isset( $error_validation['color'] ) )
                $color = $error_validation['color'];

            if ( isset( $error_validation['text'] ) )
                $text = $error_validation['text'];

            // Output
            $text = '<span style="color: ' . $color . '"><span class="dashicons dashicons-' . $icon . ' aawp-dashicons-inline"></span>' . $text . '</span>';

            echo $text;
        }

        public function settings_licensing_key_render() {

            $key = ( isset ( $this->options['licensing']['key'] ) ) ? $this->options['licensing']['key'] : '';

            ?>
            <input type="<?php echo ( aawp_is_user_admin() ) ? 'text' : 'password'; ?>" id="aawp_licensing_key" class="regular-text" name="aawp_licensing[key]" value="<?php echo $key; ?>" <?php if ( ! aawp_is_user_admin() ) echo 'readonly'; ?>/>
            <?php
        }

        public function settings_licensing_server_overwrite_render() {

            $server_list = aawp_get_licensing_server_list();
            $servers = array(
                '0' => __('Automatic', 'aawp')
            );

            foreach ($server_list as $server) {
                $servers[$server['url']] = $server['name'];
            }

            $server = ( isset ( $this->options['licensing']['server'] ) ) ? $this->options['licensing']['server'] : '';
            $server_overwrite = ( isset ( $this->options['licensing']['server_overwrite'] ) ) ? $this->options['licensing']['server_overwrite'] : null;
            ?>
            <input type="hidden" id="aawp_licensing_server" name="aawp_licensing[server]" value="<?php echo $server; ?>" />
            <select id="aawp_licensing_server_overwrite" name="aawp_licensing[server_overwrite]" <?php if ( ! aawp_is_user_admin() ) echo 'readonly'; ?>>
                <?php foreach ( $servers as $key => $label ) { ?>
                    <option value="<?php echo $key; ?>" <?php selected( $server_overwrite, $key ); ?>><?php echo $label; ?></option>
                <?php } ?>
            </select>
            <?php
        }

        public function settings_licensing_buttons_render() {

            $status = ( !empty ( $this->options['licensing']['status'] ) && $this->options['licensing']['status'] == 'valid' ) ? true : false;

            $btn_activate_class = ($status) ? 'secondary' : 'primary';
            $btn_deactivate_class = ($status) ? 'primary' : 'secondary';

            if ( aawp_is_user_admin() ) {
                echo '<p>';
                submit_button(__('Activate License', 'aawp'), $btn_activate_class, 'aawp_licensing[activate]', false);
                echo '&nbsp;';
                submit_button(__('Deactivate License', 'aawp'), $btn_deactivate_class, 'aawp_licensing[deactivate]', false);
                echo '</p>';
            }

            $deps_missing = array();

            if ( ! function_exists('curl_version') )
                $deps_missing[] = 'cURL';

            if ( ! ini_get('allow_url_fopen') )
                $deps_missing[] = 'allow_url_fopen';

            //$deps_missing = array( 'cURL', 'allow_url_fopen' ); // Debug only

            if ( sizeof( $deps_missing ) > 0 ) {
                ?>
                <br />
                <p style="color: red;"><?php printf( __( 'Your server is missing the following dependencies: <strong>%s</strong>. Please activate them or contact your hosting provider.', 'aawp' ), implode(', ', $deps_missing ) ); ?></p>
                <?php
            }
        }

        public function settings_support_license_server_debug() {
            ?>
            <p>
                <input type="checkbox" id="aawp_support_licensing_server_debug" name="aawp_support[licensing_server_debug]" value="1" <?php echo( $this->licensing_server_debug ? 'checked' : ''); ?>>
                <label for="aawp_support_licensing_server_debug"><?php _e('Check in order to enable licensing server configuration', 'aawp'); ?></label>
            </p>
            <?php
        }

        /*
         * Functions
         */

        /*
         * New License Handling
         */
        public function check_license() {

            // Variables
            $status = ( !empty( $this->options['licensing']['status'] ) ) ? $this->options['licensing']['status'] : false;
            $license_key = ( !empty( $this->options['licensing']['key'] ) ) ? $this->options['licensing']['key'] : null;

            // Status valid
            if ( $status !== false && $status == 'valid' ) {

                // Clean empty license
                if ( $license_key == '' ) {
                    $this->options['licensing']['status'] = false;
                    update_option( 'aawp_licensing', $this->options['licensing']);
                    return false;
                }

                // Key available and status valid
                return true;
            }

            // Fallback old licensing handling
            if ( $status == '' && $license_key != '' ) {
                $activation = $this->activate_license($license_key);

                if ( $activation )
                    return true;
            }

            return false;
        }

        public function activate_license($licensing, $update = false) {

            $licensing = aawp_get_validated_license_server($licensing);

            if ( !empty($licensing['server']) && !empty($licensing['key']) ) {

                // data to send in our API request
                $api_params = array(
                    'edd_action'=> 'activate_license',
                    'license' 	=> $licensing['key'],
                    'item_name' => urlencode( 'Amazon Affiliate for WordPress' ),
                    'url'       => home_url()
                );

                // Call the custom API.
                $response = wp_remote_post( $licensing['server'], array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

                // make sure the response came back okay
                if ( is_wp_error( $response ) )
                    return false;

                // decode the license data
                $license_data = json_decode( wp_remote_retrieve_body( $response ) );

                // $license_data->license will be either "valid" or "invalid"
                $licensing['error'] = (isset($license_data->error)) ? $license_data->error : '';
                $licensing['status'] = (isset($license_data->license)) ? $license_data->license : '';
                $licensing['expires'] = (isset($license_data->expires)) ? $license_data->expires : '';

                // Handle errors
                $this->log_license_errors($license_data);

                // If wished update license server when found
                if ( $update ) {
                    update_option( 'aawp_licensing', $licensing );
                }
            }

            return $licensing;
        }

        public function deactivate_license($licensing) {

            $licensing = aawp_get_validated_license_server($licensing);

            if ( !empty($licensing['server']) && !empty($licensing['key']) ) {

                // data to send in our API request
                $api_params = array(
                    'edd_action' => 'deactivate_license',
                    'license' => $licensing['key'],
                    'item_name' => urlencode( 'Amazon Affiliate for WordPress' ),
                    'url' => home_url()
                );

                // Call the custom API.
                $response = wp_remote_post($licensing['server'], array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));

                // make sure the response came back okay
                if (is_wp_error($response))
                    return false;

                // decode the license data
                $license_data = json_decode(wp_remote_retrieve_body($response));

                // $license_data->license will be either "deactivated" or "failed"
                $licensing['error'] = (isset($license_data->error)) ? $license_data->error : '';
                $licensing['status'] = (isset($license_data->license)) ? $license_data->license : '';

                // Handle errors
                $this->log_license_errors($license_data);
            }

            return $licensing;
        }

        private function log_license_errors($license_data) {

            if ( isset( $license_data->error ) ) {
                $error_validation = $this->get_license_error_validation( $license_data->license );

                if ( isset ( $error_validation['text'] ) )
                    aawp_add_log( 'Licensing: ' . $error_validation['text'] );
            }
        }

        private function get_license_error_validation( $code ) {

            $validation = array();

            if ( empty( $code ) )
                return $validation;             
                
            switch( $code ) {
                // Error
                case ( 'failed' ):
                    $validation['text'] = __( 'Action failed. Please check your license key or contact support.', 'aawp' );
                    break;
                // Invalid license key
                case ( 'missing' ):
                    $validation['text'] = __( 'Invalid license key.', 'aawp');
                    break;
                // Site deactivated
                case ( 'deactivated' ):
                    $validation['text'] = __( 'Site deactivated', 'aawp' );
                    break;
                // Expired
                case ( 'expired' ):
                    $validation['text'] = __( 'License expired. Please renew, in order to receive updates.', 'aawp' );
                    $validation['color'] = 'orange';
                    break;
                // No activations left
                case ( 'no_activations_left' ):
                    $validation['text'] = __( 'No more activations left. Please extend your license.', 'aawp' );
                    $validation['color'] = 'orange';
                    break;
            }

            return $validation;
        }

        /**
         * Get latest plugin version remotely
         *
         * @return mixed
         */
        private function get_remote_plugin_version() {

            $plugin_version = get_transient( 'aawp_remote_plugin_version' );

            // Stored plugin version found
            if ( ! empty( $plugin_version ) )
                return $plugin_version;

            // Fetch latest version from remote API
            $response = wp_remote_get( 'https://cdn.kwindo.de/aawp/remote-data/plugin-version.json', array( 'timeout' => 15, 'sslverify' => false ) );

            // make sure the response came back okay
            if ( is_wp_error( $response ) )
                return false;

            // decode the license data
            $plugin_version = json_decode( wp_remote_retrieve_body( $response ) );

            if ( ! empty( $plugin_version ) && is_string( $plugin_version ) ) {
                // Stored plugin version
                set_transient( 'aawp_remote_plugin_version', $plugin_version, 60 * 60 * 24 ); // 24 Hours

                return $plugin_version;
            }

            return null;
        }

        private function is_plugin_update_required() {

            $current_version = get_option( 'aawp_version', false );
            $remote_plugin_version = $this->get_remote_plugin_version();

            // Return true if both versions avaiable and remote one is higher than the installed one
            if ( ! empty( $current_version ) && ! empty( $remote_plugin_version ) && version_compare( $current_version, $remote_plugin_version, '<' ) )
                return true;

            return false;
        }
    }

    new AAWP_Licensing( $this );


    /*
     * Get license server
     */
    function aawp_get_validated_license_server($licensing, $update = false) {

        if ( defined('AAWP_LICENSE_SERVER') && defined('AAWP_ITEM_ID') ) {
            return array(
                'url' => AAWP_LICENSE_SERVER,
                'item_id' => AAWP_ITEM_ID
            );
        }

        if ( !empty( $licensing['server_overwrite'] ) && $licensing['server_overwrite'] != '0' )
            $licensing['server'] = $licensing['server_overwrite'];

        // Return if license server already saved
        if ( !empty( $licensing['server'] ) )
            return $licensing;

        // Validate available license servers
        $server_list = aawp_get_licensing_server_list();

        foreach ( $server_list as $server ) {

            $api_params = array(
                'edd_action'=> 'check_license',
                'license' 	=> $licensing['key'],
                'item_id' => $server['item_id'],
                'url'       => home_url()
            );

            // Call the custom API.
            $response = wp_remote_post( $server['url'], array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

            // make sure the response came back okay
            if ( is_wp_error( $response ) )
                return false;

            // decode the license data
            $license_data = json_decode( wp_remote_retrieve_body( $response ) );

            // Check if license server matches
            if ( isset($license_data->success) && $license_data->success == 1 && isset($license_data->license) && $license_data->license != 'invalid' && isset($license_data->item_name) && $license_data->item_name === 'Amazon Affiliate for WordPress' ) {
                // Save server for next time
                $licensing['server'] = $server['url'];
                break;
            }
        }

        // If wished update license server when found
        if ( $update ) {
            update_option( 'aawp_licensing', $licensing );
        }

        return $licensing;
    }

    /*
     * Licensing server list
     */
    function aawp_get_licensing_server_list() {

        return array(
            array( 'url' => 'https://aawp.de', 'name' => 'AAWP (de)', 'item_id' => 738 ),
            array( 'url' => 'https://getaawp.com', 'name' => 'AAWP (en)', 'item_id' => 1367 ),
            array( 'url' => 'https://kryptonitewp.com', 'name' => 'KryptoniteWP', 'item_id' => 738 ),
            array( 'url' => 'http://beta.flowdee.de', 'name' => 'Beta', 'item_id' => 14 )
        );
    }
}