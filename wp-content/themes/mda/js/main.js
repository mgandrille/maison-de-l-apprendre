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
