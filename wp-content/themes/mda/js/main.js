window.addEventListener( 'load', function() {
	/**
	 * Affichage menu
	 */
	const navMenu = document.querySelector( '.main-menu' );
	const navContainerMenu = document.querySelector( '.menu-menu-container' );
	const navMenuList = document.querySelector( '.main-menu ul' );
	const navMenuBtn = document.getElementById( 'nav-btn' );
	const closeNavBtn = document.getElementById( 'close-nav-btn' );

	navMenuBtn.addEventListener( 'click', () => {
		console.log( 'click nav' );
		navContainerMenu.style.display = 'block';
		navMenu.classList.toggle( 'display-flex' );
		closeNavBtn.classList.remove( 'display-none' );
		closeNavBtn.setAttribute( 'style', 'z-index: 600; cursor: pointer; color: white' );
	} );

	closeNavBtn.addEventListener( 'click', () => {
		navMenu.classList.toggle( 'display-flex' );
		closeNavBtn.classList.add( 'display-none' );
		navContainerMenu.style.display = 'none';
	} );

	const path = window.location.pathname;

	if ( path.length ) {
		window.scrollTo( 0, 0 );
	}
} );

( function( ) {
	document.addEventListener(
		'DOMContentLoaded', function() {
			/**
			 * Implémentation Isotope
			 */

			const form = document.getElementById( 'article-filter' );
			const searchbar = document.getElementById( 'searchbar' );

			const searchRegex = '';
			const storedFilterNames = [];

			const isotope = new Isotope( '.grid', {
				itemSelector: '.grid-item',
				layoutMode: 'fitRows',
				filter: ( e ) => {
					const searchResult = searchRegex ? e.textContent.match( searchRegex ) : true;
					const btnResult = storedFilterNames.length ? e.matches( storedFilterNames.join( '' ) ) : true;

					return searchResult && btnResult;
				},
			} );

			/**
			 * Empêche la searchbar de tourner en boucle
			 *
			 * @param {*} fn
			 * @param {*} threshold
			 */
			function debounce( fn, threshold ) {
				let timeout;

				threshold = threshold || 100;

				return function debounced() {
					clearTimeout( timeout );
					const args = arguments;
					const _this = this;

					function delayed() {
						fn.apply( _this, args );
					}

					timeout = setTimeout( delayed, threshold );
				};
			}

			if ( form !== null ) {
				// form.addEventListener( 'change', function( event ) {
				// const checkbox = event.target;
				// const filterName = checkbox.getAttribute( 'data-filter' );

				// 	if ( checkbox.checked ) {
				// 		checkbox.classList.add( 'is-checked' );
				// 		storedFilterNames.push( filterName );

				// 		return isotope.arrange();
				// 	}

				// 	checkbox.classList.remove( 'is-checked' );
				// 	storedFilterNames = storedFilterNames.filter( ( filter ) => ! filter.includes( filterName ) );

				// 	return isotope.arrange();
				// } );

				searchbar.addEventListener( 'keyup', debounce( function( e ) {
					let _this = this.value;
					_this = _this.toLowerCase();
					const card = document.getElementsByClassName( 'grid-item' );
					// searchRegex = new RegExp( e.target.value, 'gi' );

					for ( let i = 0; i < card.length; i++ ) {
						if ( ! card[ i ].innerHTML.toLowerCase().includes( _this ) ) {
							card[ i ].style.display = 'none';
						} else {
							card[ i ].style.display = 'list-item';
						}
					}

					isotope.arrange();
				}, 200 ) );

				// const grid = document.querySelector( '.grid-gallery' );
				// let iso;

				/*imagesLoaded( grid, function() {
					// init Isotope after all images have loaded
					iso = new Isotope( grid, {
						itemSelector: '.wp-block-image',
						percentPosition: true,
						masonry: {
						columnWidth: '.grid-gallery-sizer'
						}
					});
				});*/

				/* tri par date */

				const events = [ ...document.querySelectorAll( '.grid-item' ) ];
				const datePicker = document.getElementById( 'date' );
				const resetDateBtn = document.getElementById( 'reset-btn' );

				// Reset l'affichage
				const reset = () => {
					events.forEach( ( event ) => event.classList.remove( 'display-none' ) );
					resetDateBtn.classList.add( 'display-none' );
					isotope.arrange();
				};
				resetDateBtn.addEventListener( 'click', reset );

				// const hideInputRestButtonChrome = document.querySelector( 'button#reset-button.datetime-reset-button' );

				datePicker.addEventListener( 'change', function( e ) {
					reset();

					const dateValue = e.target.value;
					const dateDay = dateValue.split( '-' )[ 2 ];

					events.forEach( ( event ) => {
						const eventDateValue = event.getAttribute( 'data-date' );
						const eventDay = eventDateValue.split( '/' )[ 0 ];

						if ( dateDay !== eventDay ) {
							event.classList.add( 'display-none' );

							if ( resetDateBtn.classList.contains( 'display-none' ) ) {
								resetDateBtn.classList.remove( 'display-none' );
							}
						}
					} );

					isotope.arrange();
				} );
			}
		}
	);
}( ) );

( function( $ ) {
	$( document ).ready( function( ) {
		// init Isotope
		const $container = $( '.grid' ).isotope( {
			itemSelector: '.grid-item',
		} );
		// filter with selects and checkboxes
		const $checkboxes = $( '#article-filter input' );

		$checkboxes.change( function() {
			// map input values to an array
			const inclusives = [];
			// inclusive filters from checkboxes
			$checkboxes.each( function( i, elem ) {
				// if checkbox, use value if checked
				if ( elem.checked ) {
					inclusives.push( elem.value );
				}
			} );

			// combine inclusive filters
			const filterValue = inclusives.length ? inclusives.join( '' ) : '*';

			$container.isotope( { filter: filterValue } );
		} );
	} );
}( jQuery ) );
