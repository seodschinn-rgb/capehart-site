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
  var focusRestoreTimer = 0;
  var pendingBookingLink = null;
  var pendingBookingUrl = '';
  var pendingBookingStartedAt = 0;
  var pendingBookingTimer = 0;
  var bookingReadyTimeout = 10000;
  var bookingReadyPollInterval = 100;
  var bookingBridge = window.capehartBookingBridge;
  var earlyBookingRequest = bookingBridge && typeof bookingBridge.take === 'function'
    ? bookingBridge.take()
    : null;

  window.capehartBookingBridge = null;

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

  function getNativeTrigger() {
    return document.querySelector(triggerSelector);
  }

  function isNativeTriggerReady(trigger) {
    return Boolean(
      trigger &&
      trigger.style.pointerEvents !== 'none' &&
      document.querySelector(mountedRootSelector)
    );
  }

  function clearPendingBooking() {
    if (pendingBookingTimer) {
      window.clearTimeout(pendingBookingTimer);
    }

    if (pendingBookingLink && pendingBookingLink.isConnected) {
      pendingBookingLink.removeAttribute('aria-busy');
      pendingBookingLink.classList.remove('is-booking-pending');
    }

    pendingBookingLink = null;
    pendingBookingUrl = '';
    pendingBookingStartedAt = 0;
    pendingBookingTimer = 0;
  }

  function clearFocusRestore() {
    if (focusRestoreTimer) {
      window.clearTimeout(focusRestoreTimer);
      focusRestoreTimer = 0;
    }
  }

  function openBookingDialog(link, trigger) {
    clearFocusRestore();
    clearPendingBooking();
    opener = link;
    trigger.click();
  }

  function continuePendingBooking() {
    var link = pendingBookingLink;
    var fallbackUrl = pendingBookingUrl;
    var trigger;
    var remaining;

    if (!link || !fallbackUrl) {
      clearPendingBooking();
      return;
    }

    if (Date.now() - pendingBookingStartedAt >= bookingReadyTimeout) {
      clearPendingBooking();
      window.location.assign(fallbackUrl);
      return;
    }

    trigger = getNativeTrigger();

    if (isNativeTriggerReady(trigger)) {
      openBookingDialog(link, trigger);
      return;
    }

    remaining = bookingReadyTimeout - (Date.now() - pendingBookingStartedAt);

    pendingBookingTimer = window.setTimeout(
      continuePendingBooking,
      Math.min(bookingReadyPollInterval, remaining)
    );
  }

  function queueBookingDialog(link, fallbackUrl, startedAt) {
    var requestStartedAt = pendingBookingStartedAt || startedAt || Date.now();

    if (pendingBookingLink === link) {
      return;
    }

    clearPendingBooking();
    pendingBookingLink = link;
    pendingBookingUrl = fallbackUrl || link.href;
    pendingBookingStartedAt = requestStartedAt;
    link.setAttribute('aria-busy', 'true');
    link.classList.add('is-booking-pending');
    continuePendingBooking();
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

    event.preventDefault();
    trigger = getNativeTrigger();

    if (isNativeTriggerReady(trigger)) {
      openBookingDialog(link, trigger);
      return;
    }

    queueBookingDialog(link);
  });

  document.addEventListener('keydown', function (event) {
    var root;

    if (event.key !== 'Escape' || event.defaultPrevented) {
      return;
    }

    root = getOpenDialogRoot();

    if (!root) {
      if (pendingBookingLink) {
        event.preventDefault();
        clearPendingBooking();
      }

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

      clearFocusRestore();
      focusRestoreTimer = window.setTimeout(function () {
        focusRestoreTimer = 0;

        if (!getOpenDialogRoot() && focusTarget.isConnected) {
          focusTarget.focus({ preventScroll: true });
        }
      }, 350);
    }

    wasOpen = isOpen;
  }).observe(document.body, {
    attributes: true,
    attributeFilter: ['class']
  });

  window.addEventListener('pagehide', function () {
    clearPendingBooking();
    clearFocusRestore();
  });

  if (earlyBookingRequest && earlyBookingRequest.link && earlyBookingRequest.link.isConnected) {
    queueBookingDialog(
      earlyBookingRequest.link,
      earlyBookingRequest.url,
      earlyBookingRequest.startedAt
    );
  }
})();
