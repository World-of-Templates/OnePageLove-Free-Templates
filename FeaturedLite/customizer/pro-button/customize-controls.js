( function( api ) {
	// Extends our custom "featuredlite-1" section.
	api.sectionConstructor['featuredlite-1'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );
