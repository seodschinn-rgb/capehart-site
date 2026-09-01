( function () {
	'use strict';

	var floatingCta = document.querySelector( '.ch-floating-cta' );

	if ( ! floatingCta ) {
		return;
	}

	var links = Array.prototype.slice.call( floatingCta.querySelectorAll( 'a' ) );
	var scrollReferenceY = Math.max( window.scrollY, 0 );
	var scrollHidden = false;
	var footerVisible = false;
	var ticking = false;
	var activeHiddenState = false;
	var topThreshold = 72;
	var directionThreshold = 8;

	function setInteractiveState( hidden ) {
		links.forEach( function ( link ) {
			if ( hidden ) {
				if ( link.hasAttribute( 'tabindex' ) ) {
					link.dataset.floatingCtaTabindex = link.getAttribute( 'tabindex' );
				}

				link.setAttribute( 'tabindex', '-1' );
				return;
			}

			if ( Object.prototype.hasOwnProperty.call( link.dataset, 'floatingCtaTabindex' ) ) {
				link.setAttribute( 'tabindex', link.dataset.floatingCtaTabindex );
				delete link.dataset.floatingCtaTabindex;
				return;
			}

			link.removeAttribute( 'tabindex' );
		} );
	}

	function applyVisibility() {
		var shouldHide = scrollHidden || footerVisible;

		if ( shouldHide && floatingCta.matches( ':focus-within' ) ) {
			return;
		}

		if ( shouldHide === activeHiddenState ) {
			return;
		}

		activeHiddenState = shouldHide;
		floatingCta.classList.toggle( 'is-scroll-hidden', shouldHide );
		floatingCta.setAttribute( 'aria-hidden', shouldHide ? 'true' : 'false' );
		setInteractiveState( shouldHide );
	}

	function updateFromScroll() {
		var currentScrollY = Math.max( window.scrollY, 0 );
		var delta = currentScrollY - scrollReferenceY;

		if ( currentScrollY <= topThreshold ) {
			scrollHidden = false;
			scrollReferenceY = currentScrollY;
		} else if ( delta > directionThreshold ) {
			scrollHidden = true;
			scrollReferenceY = currentScrollY;
		} else if ( delta < -directionThreshold ) {
			scrollHidden = false;
			scrollReferenceY = currentScrollY;
		}

		ticking = false;
		applyVisibility();
	}

	window.addEventListener(
		'scroll',
		function () {
			if ( ticking ) {
				return;
			}

			ticking = true;
			window.requestAnimationFrame( updateFromScroll );
		},
		{ passive: true }
	);

	floatingCta.addEventListener( 'focusin', function () {
		scrollHidden = false;
		applyVisibility();
	} );

	floatingCta.addEventListener( 'focusout', function () {
		window.requestAnimationFrame( applyVisibility );
	} );

	var footer = document.querySelector( '.ch-site-footer' );

	if ( footer && 'IntersectionObserver' in window ) {
		var footerObserver = new IntersectionObserver( function ( entries ) {
			footerVisible = entries.some( function ( entry ) {
				return entry.isIntersecting;
			} );
			applyVisibility();
		} );

		footerObserver.observe( footer );
	}
}() );
