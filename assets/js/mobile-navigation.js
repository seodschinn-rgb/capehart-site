(function () {
	'use strict';

	var mobileQuery = window.matchMedia( '(max-width: 900px)' );
	var openMenuSelector = '.ch-header-row .wp-block-navigation__responsive-container.is-menu-open';
	var itemSelector = 'ul.ch-nav.wp-block-navigation__container > .has-child';
	var toggleSelector = '.wp-block-navigation-submenu__toggle';
	var openClass = 'is-ch-submenu-open';
	var navigationRoot = document.querySelector( '.ch-header-row' );
	var syncQueued = false;

	function getDirectChild( item, selector ) {
		var children = item.children;
		var index;

		for ( index = 0; index < children.length; index += 1 ) {
			if ( children[ index ].matches( selector ) ) {
				return children[ index ];
			}
		}

		return null;
	}

	function setItemState( item, isOpen ) {
		var toggle = getDirectChild( item, toggleSelector );

		item.classList.toggle( openClass, isOpen );

		if ( toggle && toggle.getAttribute( 'aria-expanded' ) !== String( isOpen ) ) {
			toggle.setAttribute( 'aria-expanded', String( isOpen ) );
		}
	}

	function collapseItems( menu, exceptItem ) {
		var items = menu.querySelectorAll( itemSelector );
		var index;

		for ( index = 0; index < items.length; index += 1 ) {
			if ( items[ index ] !== exceptItem ) {
				setItemState( items[ index ], false );
			}
		}
	}

	function prepareOpenMenu( menu ) {
		var items;
		var index;

		if ( ! mobileQuery.matches ) {
			return;
		}

		if ( ! menu.hasAttribute( 'data-ch-accordion-ready' ) ) {
			menu.setAttribute( 'data-ch-accordion-ready', 'true' );
			collapseItems( menu, null );
			return;
		}

		items = menu.querySelectorAll( itemSelector );

		for ( index = 0; index < items.length; index += 1 ) {
			setItemState( items[ index ], items[ index ].classList.contains( openClass ) );
		}
	}

	function syncMenus() {
		var menus = document.querySelectorAll( '.ch-header-row .wp-block-navigation__responsive-container' );
		var index;

		syncQueued = false;

		if ( ! mobileQuery.matches ) {
			return;
		}

		for ( index = 0; index < menus.length; index += 1 ) {
			if ( menus[ index ].classList.contains( 'is-menu-open' ) ) {
				prepareOpenMenu( menus[ index ] );
			} else {
				menus[ index ].removeAttribute( 'data-ch-accordion-ready' );
				collapseItems( menus[ index ], null );
			}
		}
	}

	function queueSync() {
		if ( syncQueued ) {
			return;
		}

		syncQueued = true;
		window.requestAnimationFrame( syncMenus );
	}

	function handleToggleClick( event ) {
		var target = event.target instanceof Element ? event.target.closest( toggleSelector ) : null;
		var menu;
		var item;
		var shouldOpen;

		if ( ! target || ! mobileQuery.matches || ! target.closest( '.ch-header-row' ) ) {
			return;
		}

		menu = target.closest( openMenuSelector );

		if ( ! menu ) {
			return;
		}

		item = target.closest( '.has-child' );

		if ( ! item || ! item.matches( itemSelector ) ) {
			return;
		}

		event.preventDefault();

		shouldOpen = ! item.classList.contains( openClass );
		collapseItems( menu, item );
		setItemState( item, shouldOpen );
	}

	function handleBackdropClick( event ) {
		var target = event.target instanceof Element ? event.target : null;
		var menu;
		var panel;
		var closeButton;

		if ( ! target || ! mobileQuery.matches ) {
			return;
		}

		menu = target.closest( openMenuSelector );

		if ( ! menu ) {
			return;
		}

		panel = menu.querySelector( '.wp-block-navigation__responsive-close' );

		if ( ! panel || panel.contains( target ) ) {
			return;
		}

		closeButton = menu.querySelector( '.wp-block-navigation__responsive-container-close' );

		if ( closeButton ) {
			closeButton.click();
		}
	}

	function handleNavigationKeydown( event ) {
		var menu;
		var item;

		if ( event.key !== 'Escape' || ! mobileQuery.matches ) {
			return;
		}

		menu = event.target instanceof Element ? event.target.closest( openMenuSelector ) : null;

		if ( ! menu ) {
			return;
		}

		item = event.target.closest( itemSelector );

		if ( ! item || ! item.classList.contains( openClass ) ) {
			item = menu.querySelector( itemSelector + '.' + openClass );
		}

		if ( item ) {
			setItemState( item, false );
		}
	}

	function handleBreakpointChange() {
		var menus = document.querySelectorAll( '.ch-header-row .wp-block-navigation__responsive-container' );
		var items = document.querySelectorAll( '.ch-header-row ' + itemSelector );
		var index;

		if ( mobileQuery.matches ) {
			queueSync();
			return;
		}

		for ( index = 0; index < menus.length; index += 1 ) {
			menus[ index ].removeAttribute( 'data-ch-accordion-ready' );
		}

		for ( index = 0; index < items.length; index += 1 ) {
			items[ index ].classList.remove( openClass );
		}
	}

	if ( navigationRoot ) {
		navigationRoot.addEventListener( 'click', handleToggleClick, true );
		navigationRoot.addEventListener( 'click', handleBackdropClick );
		navigationRoot.addEventListener( 'keydown', handleNavigationKeydown, true );

		new MutationObserver( queueSync ).observe( navigationRoot, {
			attributes: true,
			attributeFilter: [ 'class', 'aria-expanded' ],
			subtree: true
		} );

		document.documentElement.classList.add( 'ch-mobile-nav-enhanced' );
	}

	if ( typeof mobileQuery.addEventListener === 'function' ) {
		mobileQuery.addEventListener( 'change', handleBreakpointChange );
	} else {
		mobileQuery.addListener( handleBreakpointChange );
	}

	if ( navigationRoot ) {
		queueSync();
	}
}());
