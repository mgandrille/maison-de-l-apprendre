/**
 * Affichage menu
 */
const navMenu = document.querySelector('.main-menu');
const navMenuList = document.querySelector('.main-menu ul');
const navMenuBtn = document.getElementById('nav-btn');

navMenuBtn.addEventListener( 'click', () => {
	navMenu.classList.toggle( 'display-flex' );
} );

const menuItemTemp = document.createElement("li");
menuItemTemp.classList.add("page_item");

const menuLinkTemp = document.createElement("a");
menuLinkTemp.setAttribute("style", "color: #545454; cursor: default; opacity: .8;");
menuLinkTemp.setAttribute("disabled", "disabled");
menuLinkTemp.textContent = "Programme 2021 (à venir)";

menuItemTemp.append(menuLinkTemp);
navMenuList.append(menuItemTemp);

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



const grid = document.querySelector('.grid-gallery');
let iso;

imagesLoaded( grid, function() {
	// init Isotope after all images have loaded
	iso = new Isotope( grid, {
	  itemSelector: '.wp-block-image',
	  percentPosition: true,
	  masonry: {
		columnWidth: '.grid-gallery-sizer'
	  }
	});
  });