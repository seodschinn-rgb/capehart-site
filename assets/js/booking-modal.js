(function () {
  'use strict';

  var triggerSelector = '#ch-amelia-native-trigger';
  var mountedRootSelector = '#ch-amelia-native-host .amelia-v2-booking[data-v-app]';
  var dialogRootSelector = '.amelia-v2-booking.am-dialog-popup.am-forms-dialog.am-sbsNew';
  var dialogSelector = '.el-dialog';
  var overlaySelector = '.el-overlay-dialog';
  var closeSelector = '.el-dialog__headerbtn';
  var bookingPath = '/book-appointment';
  var opener = null;
  var wasOpen = document.body.classList.contains('el-popup-parent--hidden');
  var pointerStartedOutside = false;

  function isVisible(element) {
    return Boolean(element && element.getClientRects().length);
  }

  function getOpenDialogRoot() {
    var roots = document.querySelectorAll(dialogRootSelector);

    for (var index = roots.length - 1; index >= 0; index -= 1) {
      if (isVisible(roots[index]) && roots[index].querySelector(dialogSelector)) {
        return roots[index];
      }
    }

    return null;
  }

  function isBookingLink(link) {
    var url;

    try {
      url = new URL(link.href, window.location.href);
    } catch (error) {
      return false;
    }

    return url.origin === window.location.origin && url.pathname.replace(/\/+$/, '') === bookingPath;
  }

  function shouldPreserveNavigation(event, link) {
    return event.defaultPrevented ||
      event.button !== 0 ||
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey ||
      link.hasAttribute('download') ||
      (link.target && link.target.toLowerCase() !== '_self');
  }

  function closeDialog(root) {
    var closeButton = root && root.querySelector(closeSelector);

    if (closeButton) {
      closeButton.click();
    }
  }

  document.addEventListener('click', function (event) {
    var target = event.target instanceof Element ? event.target : null;
    var link = target ? target.closest('a.ch-booking-trigger[href]') : null;
    var trigger;

    if (!link || !isBookingLink(link) || shouldPreserveNavigation(event, link)) {
      return;
    }

    trigger = document.querySelector(triggerSelector);

    if (!trigger || trigger.style.pointerEvents === 'none' || !document.querySelector(mountedRootSelector)) {
      return;
    }

    event.preventDefault();
    opener = link;
    trigger.click();
  });

  document.addEventListener('keydown', function (event) {
    var root;

    if (event.key !== 'Escape' || event.defaultPrevented) {
      return;
    }

    root = getOpenDialogRoot();

    if (!root) {
      return;
    }

    event.preventDefault();
    closeDialog(root);
  });

  document.addEventListener('pointerdown', function (event) {
    var target = event.target instanceof Element ? event.target : null;
    var overlay = target ? target.closest(overlaySelector) : null;

    pointerStartedOutside = Boolean(overlay && !target.closest(dialogSelector));
  }, true);

  document.addEventListener('click', function (event) {
    var target = event.target instanceof Element ? event.target : null;
    var overlay = target ? target.closest(overlaySelector) : null;

    if (!pointerStartedOutside || !overlay || target.closest(dialogSelector)) {
      pointerStartedOutside = false;
      return;
    }

    pointerStartedOutside = false;
    closeDialog(overlay.closest(dialogRootSelector));
  }, true);

  new MutationObserver(function () {
    var isOpen = document.body.classList.contains('el-popup-parent--hidden');
    var focusTarget;

    if (wasOpen && !isOpen && opener && opener.isConnected) {
      focusTarget = opener;
      opener = null;

      window.setTimeout(function () {
        if (focusTarget.isConnected) {
          focusTarget.focus({ preventScroll: true });
        }
      }, 350);
    }

    wasOpen = isOpen;
  }).observe(document.body, {
    attributes: true,
    attributeFilter: ['class']
  });
})();
