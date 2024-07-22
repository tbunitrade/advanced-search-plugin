console.log('load ok');
jQuery(document).ready(function($) {
    $('#advanced-search-form').on('submit', function(e) {
        e.preventDefault();
        var query = $(this).find('input[name="query"]').val();
        var nonce = $(this).find('input[name="advanced_search_nonce"]').val();
        $.ajax({
            url: advancedSearch.ajax_url,
            method: 'POST',
            data: {
                action: 'advanced_search',
                query: query,
                advanced_search_nonce: nonce,
            },
            success: function(response) {
                $('#search-results').html(response);
            }
        });
    });
});

console.log('jquery ok');
