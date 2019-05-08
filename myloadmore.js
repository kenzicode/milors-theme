jQuery(function($) {
    var count = 5;
    $('.misha_loadmore').click(function() {
        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': {
                    "posts_per_page": 3,
                    "orderby": "date",
                    "order": "DESC",
                },
                'page': params.current_page,
                'cat': params.cat,
                'offset': count
            };

        $.ajax({
            url: params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Loading...');
            },
            success: function(data) {
                if (data) {
                    button.text('More Post').prev().after(data);
                    params.current_page++;
                    count = count + 1;

                    if (params.current_page == params.max_page)
                        button.hide();
                } else {
                    button.remove();
                }
            }
        });
    });
});