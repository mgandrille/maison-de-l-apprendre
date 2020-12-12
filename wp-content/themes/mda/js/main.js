(function( $ ) {
	$(document).ready(function()
	{
		// console.log('OK');

		const navbar = $('#masthead').offset().top;
		window.onscroll = function() {
			stickyNavbar(navbar);
		};

	});

	function stickyNavbar(navbar)
	{
		if (window.pageYOffset >= navbar) {
			$('#masthead').addClass("sticky");
		} else {
			$('#masthead').removeClass("sticky");
		}
    }

    // NAVBAR
    const navMenu = document.querySelector('.nav--bar');
    const navMenuBtn = document.getElementById('nav-menu-btn');

    navMenuBtn.addEventListener('click', () => {
        navMenu.classList.toggle("display--flex");
    })



})( jQuery );