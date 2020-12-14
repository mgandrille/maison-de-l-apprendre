/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const navMenu = document.querySelector( '.nav--bar' );
	const navMenuBtn = document.getElementById( 'nav-menu-btn' );

	navMenuBtn.addEventListener( 'click', () => {
		navMenu.classList.toggle( 'display--flex' );
	} );
}() );

	
	/**
	 * Implémentation Isotope (wip)
	 */
	const button = document.getElementById('buttontest');
	const all = document.getElementById('all');

	// Init Isotope
	const isotope = new Isotope( '.grid', {

		// options
		itemSelector: '.grid-item',
		layoutMode: 'fitRows',
	});

	button.addEventListener('click', function(event) {
		const filterValue = event.target.getAttribute('data-filter');	
		isotope.arrange({ filter: filterValue });

		all.classList.remove('is-checked');
		event.target.classList.add('is-checked');
	})

	all.addEventListener('click', function(event) {
		const filterValue = event.target.getAttribute('data-filter');	
		isotope.arrange({ filter: filterValue });

		button.classList.remove('is-checked');
		event.target.classList.add('is-checked');
	})
