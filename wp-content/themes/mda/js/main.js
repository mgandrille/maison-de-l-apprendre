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
 * Implémentation Isotope
 */

const form = document.getElementById('article-filter');
let storedFilterNames = [];

const isotope = new Isotope( '.grid', {
	itemSelector: '.grid-item',
	layoutMode: 'fitRows',
});

form.addEventListener('change', function(event) {
	const checkbox = event.target;
	const filterName = checkbox.getAttribute('data-filter');

	if (checkbox.checked) {
		checkbox.classList.add('is-checked');
		storedFilterNames.push(filterName);

		return isotope.arrange({ filter: storedFilterNames.join('') });
	}
	
	checkbox.classList.remove("is-checked");

	// On retire uniquement le filtre décoché du tableaux des filtres
	storedFilterNames = storedFilterNames.filter(filter => !filter.includes(filterName))

	return isotope.arrange({ filter: storedFilterNames.join('') });
})
