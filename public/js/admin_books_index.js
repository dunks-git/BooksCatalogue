$(document).ready(function () {
    $('#invalid').click(function () {
        $(this).hide();
    });

    $('#success').click(function () {
        $(this).hide();
    });

    $('.edit-button').click(function (e) {
        e.stopPropagation();
        $('.edit-button').show();
        $(this).hide();
        $('.update-button').hide();
        $('table.edit tr').removeClass('tr-selected');
        $('.editable').prop('readonly', true);
        $(this).parent().find('.update-button').show();
        var activeTr = $(this).closest('tr');
        activeTr.addClass('tr-selected');
        activeTr.find('.editable').prop('readonly', false);
    });

    $('#import').submit(function (e) {
        e.preventDefault();
        $('#importBtn').prop('disabled', true);
        var formData = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#importBtn').html('Loading.....');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var htmlErrors = textStatus + ": " + jqXHR.status + ": " + errorThrown + ": " + jqXHR.responseText;
                $('#invalid').show().html(htmlErrors);
            },
            success: function (response, textStatus, jqXHR) {
                $('#success').show().html('Books imported! Refresh to see them.').fadeOut(6000);
            },
            complete: function () {
                $('#importBtn').prop('disabled', false).html('Import from public/xml/books.xml');
            },
        });
    });

    $('.book-delete-form').submit(function (e) {
        e.preventDefault();
        var deleteButton = $(this).find('.delete-button');
        deleteButton.prop('disabled', true);
        var formData = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                deleteButton.html('Deleting...');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var htmlErrors = textStatus + ": " + jqXHR.status + ": " + errorThrown + ": " + jqXHR.responseText;
                $('#invalid').show().html(htmlErrors);
                deleteButton.prop('disabled', false).html('Delete');
            },
            success: function (response, textStatus, jqXHR) {
                var deleteRow = deleteButton.closest('tr');
                deleteRow.find('.deletable').hide();
                deleteRow.removeClass('tr-selected');
                $('#success').show().html('Book deleted!').fadeOut(4000);
            },
        });
    });

    $('.book-update-form').submit(function (e) {
        e.preventDefault();
        var updateTr = $(this).parent();
        var updateButton = updateTr.find('.update-button');
        var editButton = updateTr.find('.edit-button');
        updateButton.prop('disabled', true);
        var formData = new FormData(this);
        console.info(formData);
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                updateButton.html('Updating...');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var htmlErrors = textStatus + ": " + jqXHR.status + ": " + errorThrown + ": " + jqXHR.responseText;
                $('#invalid').show().html(htmlErrors);
            },
            success: function (response, textStatus, jqXHR) {
                updateTr.removeClass('tr-selected');
                $('#success').show().html('Book updated!').fadeOut(4000);
            },
            complete: function () {
                updateButton.prop('disabled', false).html('Save');
                updateButton.hide();
                editButton.show();
                updateTr.find('.editable').prop('readonly', true);
            },
        });
    });

    $('#createForm').submit(function (e) {
        e.preventDefault();
        var createBtn = $('#createBtn');
        createBtn.prop('disabled', true);
        var formData = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                createBtn.html('Saving...');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var htmlErrors = textStatus + ": " + jqXHR.status + ": " + errorThrown + ": " + jqXHR.responseText;
                $('#invalid').show().html(htmlErrors);
            },
            success: function (response, textStatus, jqXHR) {
                $('#success').show().html('Book bk' + response.data.id + ' created! Refresh to see it.');
            },
            complete: function () {
                createBtn.prop('disabled', false).html('Save');
            },
        });
    });

    $('#newBtn').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#create-block').show();
        $(this).hide();
        $('#hideNewBtn').show();
        $(document).scrollTop($(document).height());
    });

    $('#hideNewBtn').click(function (e) {
        e.stopPropagation();
        $('#create-block').hide();
        $(this).hide();
        $('#newBtn').show();
    });
});
