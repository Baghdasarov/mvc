$(document).ready(function () {
    $(document).on('click', '.toggle-task', function () {
        $.ajax({
            url: "/Task/update",
            type: 'post',
            data: {'id': $(this).data('id'),'status': $(this).is(':checked')},
            success: function (result) {
                alert('success');
            },
            error: function () {
                alert('error');
            }
        });
    });

    $("#uploadImage").change(function() {
        readURL(this);
    });

    $('#preview-button').on('click', function () {
        // $('.pr-name').text()
        var formData = $('#task-form').serializeArray();
        for (var i = 0; i < formData.length; i++) {
            $('.' + 'pr-' + formData[i]['name']).html(formData[i]['value']);
        }
        $('#preview').removeClass('d-none');
        $('#hide-preview').removeClass('d-none');
        $('#preview-button').addClass('d-none');
        $('#task-preview').removeClass('d-none');
    });

    $('#hide-preview').on('click', function () {
        $('#hide-preview').addClass('d-none');
        $('#preview').addClass('d-none');
        $('#preview-button').removeClass('d-none');
        $('#task-preview').addClass('d-none');
    })

    $('.cursor-pointer').on('click', function () {

    })

    $(".edit-icon").on("click", function () {
        var description = $(this).siblings().text();
        var id = $(this).attr('data-id');
        $(".modal-body #edited-description").text(description);
        $(".modal-body #id").val(id);
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
            $('.pr-preview').attr('src', e.target.result);
            $('#preview').removeClass('d-none');
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#preview').addClass('d-none');
    }
}
