jQuery(function () {
$('#detailModal').hide();
$('#modifyDetails').on('click', function() {
    $('#detailModal').fadeIn(100);
})
$('.dismiss i').on('click', function() {
    $('.modal__underlay').hide();
})

})