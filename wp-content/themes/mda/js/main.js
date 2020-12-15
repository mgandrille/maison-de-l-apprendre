/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
/*( function() {
	const navMenu = document.querySelector( '.nav--menu' );
	const navMenuBtn = document.getElementById( 'nav-menu-btn' );

	navMenuBtn.addEventListener( 'click', () => {
		navMenu.classList.toggle( 'display--flex' );
	} );
}() );*/

	
/**
 * Implémentation Isotope
 */

const form = document.getElementById('article-filter');
const searchbar = document.getElementById('searchbar');

let searchRegex = '';
let storedFilterNames = [];

const isotope = new Isotope( '.grid', {
	itemSelector: '.grid-item',
	layoutMode: 'fitRows',
	filter: (e) => {
		let searchResult = searchRegex ? e.textContent.match(searchRegex) : true;
		let btnResult = storedFilterNames.length ? e.matches( storedFilterNames.join('') ) : true;

		return searchResult && btnResult;
	}
});

/**
 * Empêche la searchbar de tourner en boucle
 * @param {*} fn 
 * @param {*} threshold 
 */
function debounce( fn, threshold ) {
	let timeout;

	threshold = threshold || 100;

	return function debounced() {
		clearTimeout(timeout);
		const args = arguments;
		const _this = this;

		function delayed() {
			fn.apply( _this, args );
		}

		timeout = setTimeout( delayed, threshold );
	};
}

form.addEventListener('change', function(event) {
	const checkbox = event.target;
	const filterName = checkbox.getAttribute('data-filter');

	if (checkbox.checked) {
		checkbox.classList.add('is-checked');
		storedFilterNames.push(filterName);

		return isotope.arrange();
	}
	
	checkbox.classList.remove("is-checked");
	storedFilterNames = storedFilterNames.filter(filter => !filter.includes(filterName))

	return isotope.arrange();
})

searchbar.addEventListener( 'keyup', debounce( function(e) {
	searchRegex = new RegExp( e.target.value, 'gi' );
	isotope.arrange();
	
}, 200 ) );