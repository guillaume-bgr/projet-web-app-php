jQuery(function () {
$(".get-current").attr("href", "/views/project-list.php?id=" + $('.project__card').eq(4).data('id'));
$('#next-project').on('click', function() {
    $('.project__card').find('.content').fadeOut();
    $('#display').animate({
        left: '-=15.5%',
    }, 500);
    $('#display').animate({
        left: '0'
    }, 0);
    $('.project__card').find('.content').fadeIn();
    $('#display').append($('.project__card').first());
    $(".get-current").attr("href", "/views/project-list.php?id=" + $('.project__card').eq(4).data('id'));
});

$('#previous-project').on('click', function() {
    $('.project__card').find('.content').fadeOut();
    $('#display').animate({
        left: '+=15.5%',
    }, 500);
    $('#display').animate({
        left: '0'
    }, 0);
    $('.project__card').find('.content').fadeIn();
    $('#display').prepend($('.project__card').last());
    $(".get-current").attr("href", "/views/project-list.php?id=" + $('.project__card').eq(4).data('id'));
});
});