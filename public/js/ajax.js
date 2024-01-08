// AJAX to get users data
function ajax_get_users() {
    $.ajax({
        url: route_get_users,
        method: 'GET',
        success: function(data) {
            ajax_load_content(data);
        }
    });
}

// AJAX to loadmore users data
function ajax_loadmore_users() {
    var page = 2;
    $('#load-more-btn').on('click', function() {
        $.ajax({
            url: route_get_users + '?page=' + page,
            method: 'GET',
            success: function(data) {
                ajax_load_content(data);
                if(page == data.meta.last_page) {
                    $('#load-more-btn').remove();
                }
                page++;
            }
        });
    });
}

// AJAX to laod content
function ajax_load_content(users_data) {
    $.ajax({
        url: route_load_content,
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            users_data: users_data
        },
        dataType: 'html',
        success: function(data) {
            var usersTableBody = $('#js-users-table-body');
            usersTableBody.append(data);
        }
    });
}

// AJAX to create user with image
$('#create-user-form').submit(function(event) {
    event.preventDefault();
    var maxFiles = 20;
    var files = $('#file-input')[0].files;
    if (files.length > maxFiles) {
        alert('Max files: ' + maxFiles);
        return;
    }
    var formData = new FormData($(this)[0]);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    
    console.log(formData);

    $.ajax({
        url: route_create_user,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            alert(data.message);
            $('#create-user-form')[0].reset();
            
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
});

ajax_get_users()
ajax_loadmore_users()