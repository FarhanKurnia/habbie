$(document).ready(function() {
    $('.menu-manage-product li a').on('click', function() {
        $('.menu-manage-product li a').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        $($(this).attr('href')).show();
        return false;
    });

    // Show the first tab by default
    $('.menu-manage-product li:first a').click();
});