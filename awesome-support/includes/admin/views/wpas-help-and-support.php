<?php 
// translators: %1$s is the URL for opening a ticket.
$x_content1 = __( '<a href="%1$s">Open a ticket directly with us</a>', 'awesome-support' );

// translators: %1$s is the URL for asking for help on WordPress.org.
$x_content2 = __( '<a href="%1$s">Ask for help on WordPress.org</a>', 'awesome-support' );

// translators: %1$s is the URL for starting a trial at ValiusWP.com.
$x_content3 = __( '<a href="%1$s">Get started with unlimited fixes with a 10 day trial at ValiusWP.com</a>', 'awesome-support' );

// translators: %1$s is the URL for the About Page.
$x_content4 = __( 'Documentation links are located in our <a href="%1$s">About Page</a>', 'awesome-support' );

?>
<div class="wrap about-wrap">

	<h1><?php esc_html_e( 'Help and Support Options', 'awesome-support' ); ?></h1>

	<div class="about-text" style="margin-bottom:0px;"><?php esc_html_e( 'Here are three ways to get help and support for your new helpdesk!', 'awesome-support' ); ?></div>

	<div class="changelog">

		<div class="row" style="margin-top: 0px;">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 0px;">
				<div class="about-body">
					<h2 style="margin-top: 0px;"><?php esc_attr_e( 'Licensed Users', 'awesome-support' ); ?></h2>
					<p><?php esc_attr_e( 'Users with an active subscription license to one or more of our addons or bundles can open a ticket directly with us.', 'awesome-support' ); ?></p>
					<p><?php echo sprintf( wp_kses_post( $x_content1 ), 'https://getawesomesupport.com/submit-ticket', 'target="_blank"' ) ; ?></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 0px;">
				<div class="about-body">
					<h2 style="margin-top: 0px;"><?php esc_attr_e( 'Unlicensed  and Trial Users', 'awesome-support' ); ?></h2>
					<p><?php esc_attr_e( 'Users without a license can open a ticket on our free community supported WordPress.org forum.', 'awesome-support' ); ?></p>
					<p><?php echo sprintf( wp_kses_post( $x_content2 ), 'https://wordpress.org/support/plugin/awesome-support/', 'target="_blank"' ) ; ?></p>
				</div>
			</div>
		</div>

		<h2><?php esc_html_e( 'Do you need help and support for other plugins and themes or do you need emergency help for your site?', 'awesome-support' ); ?></h2>
		<p><?php esc_attr_e( 'If so, check out our partners at ValiusWP.com where you can get unlimited 30 minute website fixes and support for one low price per month.', 'awesome-support' ); ?></p>
		<p><?php esc_attr_e( 'Fast, friendly support for all things WordPress at one low monthly price!', 'awesome-support' ); ?></p>
		<p><?php echo sprintf( wp_kses_post( $x_content3 ), 'https://valiuswp.com/', 'target="_blank"' ) ; ?></p>
		<p><a href="https://valiuswp.com/"> <img src="<?php echo esc_url( WPAS_URL ); ?>assets/admin/images/ValiusWP-Ad-01.png" alt="ValiusWp Image"></a></p>

		<h2><?php esc_html_e( 'Documentation', 'awesome-support' ); ?></h2>
		<?php $about_url = wpas_get_about_page_url(); ?>
		<p><?php echo sprintf( wp_kses_post( $x_content4 ), esc_url( $about_url ), 'target="_blank"' ) ; ?></p>

	</div>

</div>
