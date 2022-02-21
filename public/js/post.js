$(function () {

    $("#search").on("keyup change", function (e) {
        let search_text = $(this).val().trim();
        if (search_text.length > 2) {
            let data = {
                request_name: 'search_comment',
                url: 'ajax/comments/search_comment',
                method: 'post',
                post_id: $('#post_id').val(),
                search: search_text
            }

            $('#search').prop('disabled', true);

            ajaxRequest(data);
        } else {
            $('#page_offset').val(0);
            ajaxSelect();
        }
    });

    $("#text_add_comment").val('');

    $('body').on('click', '#btn_add_comment', function (e) {

        let comment = $('#text_add_comment').val();
        if (comment.trim() !== '') {

            $("#text_add_comment").val('');

            let data = {
                request_name: 'add_comment',
                url: 'ajax/comments/comments',
                method: 'post',
                post_id: $('#post_id').val(),
                body: comment
            }

            ajaxRequest(data);
        }
    });

    $('body').on('click', '#show_more', function () {
        let page_offset = parseInt($('#page_offset').val());
        page_offset += 3;
        $('#page_offset').val(page_offset);

        console.log('page_offset:');
        console.log(page_offset);

        let post_id = parseInt($('#post_id').val());
        console.log('post_id:');
        console.log(post_id);

        let data = {
            request_name: 'show_more',
            url: 'ajax/comments/show_more',
            post_id,
            offset: page_offset,
            method: 'post',
        }

        ajaxRequest(data);
    });

    function ajaxSelect() {
        let offset = parseInt($('#page_offset').val());

        let data = {
            request_name: 'ajax_select',
            url: 'ajax/comments/ajax_select',
            method: 'post',
            offset,
            post_id: $('#post_id').val(),
        }

        ajaxRequest(data);
    }

    function ajaxRequest(req) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: req.url,
            method: req.method,
            dataType: 'json',
            data: req,
            success: function (res) {
                ajaxSuccess(req, res);
            },
            error: function (res) {
                ajaxError(req, res);
            }
        });
    }

    function ajaxSuccess(request, response) {

        let comments_list = $('#comments_list');
        let search = $('#search');
        let show_more = $('#show_more');

        switch (request.request_name) {
            case 'add_comment':
                comments_list.prepend(response.data);
                break;

            case 'search_comment':
                comments_list.html(response.data);
                search.prop('disabled', false);
                break;

            case 'ajax_select':
                comments_list.html(response.data);
                search.prop('disabled', false);
                break;

            case 'show_more':
                if (response.status === true) {
                    comments_list.append(response.data);
                    $('html, body').animate({
                        scrollTop: show_more.offset().top
                    });
                } else {
                    console.log('Выбраны все записи');
                    show_more.prop('disabled', true);
                }
                break;
        }
    }

    function ajaxError(request, response) {
        console.log('Ajax error');
        $('#search').prop('disabled', false);
    }

});
