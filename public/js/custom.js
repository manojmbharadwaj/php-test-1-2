$(document).ready(function(){
    $('.add-modal-btn').click(function() {
        $('#userModalLabel').text('Add User');
        $('#action').val('ADD');
        // reset modal fields
        $('#model_user').val('');
        $('#modal_name').val('');
        $('#modal_email').val('');
        $('#modal_phone').val('');
        $('#modal_city').val('');
        $('#userModal').modal('show');
    });

    $('body').on('click', '.edit-modal-btn', function() {
        let td = $(this).closest('tr').children('td:first');

        $('#userModalLabel').text('Edit User');
        $('#action').val('EDIT');
        $('#model_user').val( td.find('.u_id').val() );
        $('#modal_name').val( td.find('.u_name').val() );
        $('#modal_email').val( td.find('.u_email').val() );
        $('#modal_phone').val( td.find('.u_phone').val() );
        $('#modal_city').val( td.find('.u_city').val() );

        $('#userModal').modal('show');
    });

    $("#modal_form").submit(function() {

        const action = $('#action').val();
        const userId = $('#model_user').val();
        const name = $('#modal_name').val();
        const email = $('#modal_email').val();
        const phone = $('#modal_phone').val();
        const city = $('#modal_city').val();
        const _token = $('#_token').val();

        let actionUrl = ( action == 'ADD' ) ? '/ajax/store' : '/ajax/update/' + userId;

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: { id: userId, name: name, email:email, phone:phone, city:city, _token:_token },
            success: function(msg) {
                $('#userModal').modal('hide');
                loadUsers();
            },
            error: function() {
                alert("Something went wrong!. Please try again");
            }
        });

        return false;
    });

    if ( $('#page_users_info').length == 1 ) loadUsers();;

    function loadUsers()
    {
        $.ajax({
            type: 'GET',
            url: '/ajax/getUsers/',
            success: function(msg) {
                $('table thead').html(msg);
            },
            error: function() {
                alert("Something went wrong!. Please try again");
            }
        });
    }

});
