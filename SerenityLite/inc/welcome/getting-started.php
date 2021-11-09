<div id="getting_started" class="serenity-tab-pane">
    <div class="left">
        <div>
            <p><?php esc_html_e('Follow the steps below to setup Serenity Lite and begin customizing your website.', 'serenity-lite'); ?></p>
            <h3><?php esc_html_e('Step 1 - Install Plugins', 'serenity-lite'); ?></h3>
            <ol>
                <li><?php esc_html_e('Install', 'serenity-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/serenity-theme-extensions/'); ?>"><?php esc_html_e('Serenity Theme Extensions', 'serenity-lite'); ?></a> <?php esc_html_e('plugin', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Install', 'serenity-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/theme-demo-import/'); ?>"><?php esc_html_e('Theme Demo Import', 'serenity-lite'); ?></a> <?php esc_html_e('plugin', 'serenity-lite'); ?></li>
            </ol>
            <p>
                <?php if ( current_user_can( 'install_plugins' ) ) : ?>
                    <a class="button button-secondary" href="<?php echo esc_url('themes.php?page=tgmpa-install-plugins'); ?>"><?php esc_html_e('Install Plugins', 'serenity-lite'); ?></a>
                <?php endif; ?>
            </p>
        </div>
        <div>
            <h3><?php esc_html_e('Step 2 - Configure One-Page Template', 'serenity-lite'); ?></h3>
            <ol>
                <li><?php esc_html_e('Create or edit a page, and assign it the One-Page Template from the Page Attributes section.', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Go to Settings > Reading and set "Front page displays" to "A static page".', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Select the page you just assigned the One-page Template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.', 'serenity-lite'); ?></li>
            </ol>
            <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/knowledgebase/how-to-setup-the-one-page-template-for-serenity/'); ?>"><?php esc_html_e('How to Setup the One-Page Template for Serenity', 'serenity-lite'); ?></a></p>
        </div>
        <div>
            <h3><?php esc_html_e('Step 3 - Import Live Demo Content (OPTIONAL)', 'serenity-lite'); ?></h3>
            <p class="about"><?php esc_html_e('Make your site look like our live demo; import all demo content and settings. This will provide you with a basic layout to build your website and speed up the development process.', 'serenity-lite'); ?></p>
            <p><?php esc_html_e('Live Demo:', 'serenity-lite'); ?> <a target="_blank" href="<?php echo esc_url('http://demo.themely.com/serenity/'); ?>">http://demo.themely.com/serenity/</a></p>
            <p><a class="button button-secondary" href="<?php echo esc_url('themes.php?page=theme-demo-import'); ?>"><?php esc_html_e('Import Demo Content', 'serenity-lite'); ?></a></p>
        </div>
        <div>
            <h3><?php esc_html_e('Step 4 - Customize Your Website', 'serenity-lite'); ?></h3>
            <p class="about"><?php esc_html_e('Click the button below to configure theme settings and start customizing your site.', 'serenity-lite'); ?></p>
            <p>
                <?php if ( current_user_can( 'customize' ) ) : ?>
                    <a class="button button-primary button-hero" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e('Customize Your Site', 'serenity-lite'); ?></a>
                <?php endif; ?>
            </p>
        </div>
    </div>
    <div class="right">
        <div class="upgrade">
            <h3><?php esc_html_e('Upgrade to Serenity PRO!', 'serenity-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://demo.themely.com/serenity/'); ?>"><?php esc_html_e('View live demo', 'serenity-lite'); ?></a></h3>
            <p class="about-text"><?php esc_html_e('Unlock additional sections, features & settings!', 'serenity-lite'); ?></p>
            <p class="about-text red"><strong><?php esc_html_e('Save 10% with coupon code', 'serenity-lite'); ?> <span class="border-red"><?php esc_html_e('THEMELY10', 'serenity-lite'); ?></span></strong></p>
            <ul class="ul-square">
                <li><?php esc_html_e('Easily change font type, color and size for all sections (no coding required)', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Change order of one-page sections (drag & drop)', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Select full-width or boxed layout', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Easily change size and color of icons (no coding required)', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK 11 Additional One-Page Sections', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Hero Section Image Slider', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Progress Bars Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Animated Counters Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Videos Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Pricing Tables Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Showcase Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK WooCommerce Section (online store)', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Frequently Asked Questions Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Brand Logos Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Newsletter Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('UNLOCK Google Maps Section', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('MORE Theme Customizer Settings (padding, background color & image, color scheme)', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('MORE Widget Areas', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('MORE Custom Widgets', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('FREE Child Theme', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('No restrictions!', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Priority support', 'serenity-lite'); ?></li>
                <li><?php esc_html_e('Regular theme updates', 'serenity-lite'); ?></li>
            </ul>
            <p>
                <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/serenity/'); ?>"><?php esc_html_e('UPGRADE NOW', 'serenity-lite'); ?></a>
            </p>
        </div>
    </div>
</div>
<div class="clear"></div>