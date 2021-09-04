$(document).ready(function () {
    $('#eml').blur(function () {
        let val = $(this).val();
        $(this).siblings($('.msg')).html('');
        $.ajax({
            url: 'response.php',
            type: 'POST',
            data: {email: val},
            context: $(this),
            dataType: 'json',
            success: function (data) {
                if (data[0] === "ok") {
                    $(this).after("<div class='msg'><i class=\"fas fa-check\"></i></div>")
                } else
                    $(this).after("<div class='msg'><i class=\"fas fa-times\"></i></div>")
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    });
    $('#phn').blur(function () {
        let val = $(this).val();
        $(this).siblings($('.msg')).html('');
        $.ajax({
            url: 'response.php',
            type: 'POST',
            data: {phone: val},
            context: $(this),
            dataType: 'json',
            success: function (data) {
                if (data[0] === "ok") {
                    $(this).after("<div class='msg'><i class=\"fas fa-check\"></i></div>")
                } else
                    $(this).after("<div class='msg'><i class=\"fas fa-times\"></i></div>")
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    });

    $('.fr').change(function () {
        $fr = $(this).val();
        $user = $('[name=user_id]').val();
        $.ajax({
            url: 'response.php',
            type: 'POST',
            data: {
                user_id: $user,
                friends_id: $fr
            },
            context: $(this),
            dataType: 'json',
            success: function (data) {
                console.log('success', data);
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    });

    $('#approved').bind("click", function () {
        $delete = $(this).attr('name');
        $friends_id = $('[name=friends_id]').val();
        $.ajax({
            url: 'approved.php',
            type: 'POST',
            data: {
                friends_id: $friends_id,
                delete: $delete
            },
            success: function (data) {
                console.log('success', data);
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    });
    $('#delete').bind("click",function () {
        alert('real');
        $reject = $(this).attr('name');
        $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: {
                reject: $reject
            },
            success: function (data) {
                console.log('success', data);
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    });
});
