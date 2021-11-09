/**
 * Install Oneliinelite Starter Sites
 *
 *
 * @since 1.2.4
 */
(function($){

	FeaturedliteThemeAdmin = {

		init: function()
		{
			this._bind();
		},


		/**
		 * Binds events for the Featuredlite Theme.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _bind
		 */
		_bind: function()
		{
			$( document ).on('click' , '.zta-sites-notinstalled', FeaturedliteThemeAdmin._installNow );
			$( document ).on('click' , '.zta-sites-inactive', FeaturedliteThemeAdmin._activatePlugin);
			$( document ).on('wp-plugin-install-success' , FeaturedliteThemeAdmin._activatePlugin);
			$( document ).on('wp-plugin-installing'      , FeaturedliteThemeAdmin._pluginInstalling);
			$( document ).on('wp-plugin-install-error'   , FeaturedliteThemeAdmin._installError);
		},

		/**
		 * Plugin Installation Error.
		 */
		_installError: function( event, response ) {

			var $card = jQuery( '.zta-sites-notinstalled' );

			$card
				.removeClass( 'button-primary' )
				.addClass( 'disabled' )
				.html( wp.updates.l10n.installFailedShort );
		},

		/**
		 * Installing Plugin
		 */
		_pluginInstalling: function(event, args) {
			event.preventDefault();

			var $card = jQuery( '.zta-sites-notinstalled' );

			$card.addClass('updating-message');

		},
		/**
		 * Activate Success
		 */
		_activatePlugin: function( event, response ) {

			event.preventDefault();

			var $message = $( '.zta-sites-notinstalled' );
			if ( 0 === $message.length ) {
				$message = $( '.zta-sites-inactive' );
			}

			// Transform the 'Install' button into an 'Activate' button.
			var $init = $message.data('init');

			$message.removeClass( 'install-now installed button-disabled updated-message' )
				.addClass('updating-message')
				.html( featuredlite.btnActivating );

			// WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
			setTimeout( function() {

				$.ajax({
					url: featuredlite.ajaxUrl,
					type: 'POST',
					data: {
						'action'            : 'featuredlite-sites-plugin-activate',
						'init'              : $init,
					},
				})
				.done(function (result) {

					if( result.success ) {
						var output = '<a href="'+ featuredlite.featuredliteSitesLink +'" aria-label="'+ featuredlite.featuredliteSitesLinkTitle +'">' + featuredlite.featuredliteSitesLinkTitle +' </a>'
						$message.removeClass( 'zta-sites-inactive zta-sites-notinstalled button button-primary install-now activate-now updating-message' )
							.html( output );

					} else {

						$message.removeClass( 'updating-message' );

					}

				});

			}, 1200 );

		},

		/**
		 * Install Now
		 */
		_installNow: function(event)
		{
			event.preventDefault();

			var $button 	= jQuery( event.target ),
				$document   = jQuery(document);

			if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
				return;
			}

			if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
				wp.updates.requestFilesystemCredentials( event );

				$document.on( 'credential-modal-cancel', function() {
					var $message = $( '.zta-sites-notinstalled.updating-message' );

					$message
						.addClass('zta-sites-inactive')
						.removeClass( 'updating-message zta-sites-notinstalled' )
						.text( wp.updates.l10n.installNow );

					wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
				} );
			}

			wp.updates.installPlugin( {
				slug:    $button.data( 'slug' )
			} );
		},
	};

	/**
	 * Initialize FeaturedliteThemeAdmin
	 */
	$(function(){
		FeaturedliteThemeAdmin.init();
	});

})(jQuery);