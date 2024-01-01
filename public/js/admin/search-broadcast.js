$(document).ready(function () {
    $('#simple-search').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        $('.broadcast-message').each(function () {
            var title = $(this).find('.message-title').text().toLowerCase();
            var content = $(this).find('.message-content').text().toLowerCase();

            if (title.includes(searchText) || content.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});