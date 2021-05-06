$(function() {
    $('#open-search').click(function(){
        $('#open-search').css('display','none');
        $('#close-search').css('display','inline');
        $('#narrow-down').slideDown();
    });
    $('#close-search').click(function(){
        $('#close-search').css('display','none');
        $('#open-search').css('display','inline');
        $('#narrow-down').slideUp();
    });
    $('#file_select').on('change', function () {
        var file = $(this).prop('files')[0];
        $('#file_name').text(file.name);
    });
});