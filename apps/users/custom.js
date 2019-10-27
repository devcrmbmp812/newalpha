$(function () {
    'use strict';
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });

    $('#edit_password, #edit_confirm_password').on('keyup', function () {
        if ($('#edit_password').val() == $('#edit_confirm_password').val()) {
            $('#edit_message').html('Matching').css('color', 'green');
        } else
            $('#edit_message').html('Not Matching').css('color', 'red');
    });

    $('.add-new-user').click(function (e) {
        console.log($('#message').html());
        if($('#message').html() == 'Matching' ){
            if($('input name="first_name"').val() != "" && $('input name="last_name"').val() != "" && $('input name="user_email"').val() != "") {
                $('.user-add-modal form').submit();
            } else {
                if($('input name="first_name"').val() != "") {
                    $("#.user-add-modal form").validate().element('input name="first_name"');
                } else if($('input name="last_name"').val() != "") {
                    $("#.user-add-modal form").validate().element('input name="last_name"');
                } else if($('input name="user_email"').val() != "") {
                    $("#.user-add-modal form").validate().element('input name="user_email"');
                }
            }
        } else if($('#message').html() == 'Not Matching'){
            e.preventDefault();
        }
    });

    // $('.edit-user').click(function (e) {
    //     e.preventDefault();
    //     if($('#edit_message').html() == 'Matching') {
    //         $('.user-edit-modal form').submit();
    //     }
    // });

    $('.edit').click(function () {
        var id = $(this).attr('id').substring(5);

        $.ajax({
           url: '/apps/users/ajax_users.php',
            type: "POST",
            data: {
                id: id,
                mode: 'edit'
            },
            success:function(result){
               console.log(result);
                var response_json = JSON.parse(result);
                $('.user-edit-modal').modal('toggle');
                console.log(response_json.id);
                $('#edit_id').val(response_json.id);
                $('.user-edit-modal input[name="first_name"]').val(response_json.first_name);
                $('.user-edit-modal input[name="last_name"]').val(response_json.last_name);
                $('.user-edit-modal input[name="user_email"]').val(response_json.user_email);

                $('.user-edit-modal input[name="phone_no"]').val(response_json.phone_no);
                $('.user-edit-modal input[name="note"]').val(response_json.note);
            }
        });
    });

    $('.delete').click(function () {
        var id = $(this).attr('id').substring(7);
        $('#user-delete-modal').modal('toggle');
        $('#user-delete-modal #del_id').val(id);
        console.log("id", id);

    });
});