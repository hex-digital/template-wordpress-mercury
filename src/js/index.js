jQuery(document).ready(function ($) {
  const $modal = $('.js-search-global-modal');
  const $navbar = $('.c-navbar');
  const $search = $('.js-search-global-modal__search-field');

  let navbar_original;

  if ($navbar.hasClass('c-navbar--dark')) {
    navbar_original = 'dark';
  } else if ($navbar.hasClass('c-navbar--light')) {
    navbar_original = 'light';
  }

  $('.js-search-global-modal__clear_text').click(function () {
    $search.val('');
    $(this).hide();
  });

  $search.keyup(function () {
    if ($search.val() === '') {
      $('.js-search-global-modal__clear_text').hide();
    } else {
      $('.js-search-global-modal__clear_text').show();
    }
  });

  $('.js-open-search').click(function () {
    if ($modal.is(':visible') === true) {
      if (navbar_original === 'dark') {
        $('.c-navbar').addClass('c-navbar--dark').removeClass('c-navbar--light');
      } else {
        $('.c-navbar').addClass('c-navbar--light').removeClass('c-navbar--dark');
      }

      $('.c-navbar').css('position', 'absolute');
      $modal.hide();
      $('body').css('overflow', 'visible');
    } else {
      $modal.show();
      $('.c-navbar').css('position', 'relative');
      $('body').css('overflow', 'hidden');
      $('.c-navbar').addClass('c-navbar--dark').removeClass('c-navbar--light');
    }

    $search.focus();
  });
});
