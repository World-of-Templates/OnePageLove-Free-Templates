<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="ministudio-tab-pane active">

	<div class="ministudio-tab-pane-center">

		<h1 class="ministudio-welcome-title">Welcome to Ministudio! <?php if( !empty($ministudio['Version']) ): ?> <sup id="ministudio-theme-version"><?php echo esc_attr( $ministudio['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Ministudio is a beautiful blogging and business wordpress theme which allows you to turn your website into a business website and blog. It offers options to make your Wordpress blog left or right column or without any column.', 'ministudio' ); ?>

	</div>

	<hr />

	<div class="ministudio-tab-pane-center">

		<h1><?php esc_html_e( 'How to customize?', 'ministudio' ); ?></h1>

		<p><?php esc_html_e( 'You can customize Ministudio with Customizer. Simply go to customizer and you will see various options to customize your blog. You can customize anything from logo to background colors and much more!', 'ministudio' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'ministudio' ); ?></a></p>

	</div>

	<hr />

	<div class="ministudio-clear"></div>

</div>
