$('.index_links li a').append('<div class="ripple-container" />');
function $_seacrhformClose() {
    $('.search-form').removeClass('is-open').on('transitionend', function () {
        $(this).find('input').val('');
    })
}
function $_seacrhformOpen() {
    $('.search-form').addClass('is-open');
}
