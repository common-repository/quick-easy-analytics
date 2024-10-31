<?php
/**
 * Plugin Name: Quick & Easy Google Analytics
 * Description: Just enter your Google Analytics UA number and go.
 * Version: 1.0.2
 * Author: Michael Hull
 * Author URI: https://resoundingechoes.net
 */

/**
 * Backend
 */

if( is_admin() ) {

	# plugin options page
	add_action('admin_menu', 'qega_settings_page_menu_item');
	function qega_settings_page_menu_item() {
		add_options_page('Quick & Easy Analytics', 'Google Analytics', 'manage_options', 'qega_settings', 'qega_settings_page');
	}	
	function qega_settings_page(){

		$acct_no = get_option( 'qega_acct_no' );
		if( ! $acct_no ) $acct_no = '';

		?><div class='wrap'>
			<h2>Quick & Easy Google Analytics</h2>
			<form action="options.php" method="post">
			<?php settings_fields('qega_options'); ?>
			<p>Enter the Google Analytics account number you wish to connect:</p>
			<input type='text' name='qega_acct_no' value="<?php echo esc_attr( $acct_no ); ?>" />
			<?php 
			# Give a message if the account number doesn't have a valid format
			if( ! empty( $acct_no ) && ! qega_check_code( $acct_no ) ) {
			?>
				<p style='color: red;'>This doesn't appear to be a valid account number.</p>
			<?php
			}
			?>
			<p class='description'>The account number should have the form <code>UA-########-#</code></p>
			<p><a target='_blank' href='https://support.google.com/analytics/answer/1032385'>Not sure where to find your UA number?</a></p>
			<?php submit_button(); ?>
			</form>
		</div><?php
	}
	# define sections and fields for options page
	add_action('admin_init', 'qega_register_settings');
	function qega_register_settings(){
		register_setting( 'qega_options', 'qega_acct_no', 'qega_validate');	
	}
	function qega_validate($input){
		return sanitize_text_field($input);
	}

} # end if: back end


/**
 * Front end
 */

else{

	# Add tracking code into document head
	add_action('wp_head', 'qega_tracking_code');
	function qega_tracking_code () {

		# Make sure we have an acct # and check its format
		if( ! $qega_code = qega_check_code( get_option( 'qega_acct_no' ) ) ) return;

		# output the tracking code
		ob_start();
		?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', "<?php echo esc_js(get_option('qega_acct_no')); ?>", 'auto');
			ga('send', 'pageview');
		</script>
		<?php
		ob_end_flush();
		
	} # end: qega_tracking_code()

} # end else: front end

/*
* Helper functions
*/ 

# make sure a given string has the format UA-########-#
function qega_check_code( $str ) {
	if( ! preg_match( '/UA-\d{4,10}-\d{1,4}/', $str) ) return false;
	return $str;
}