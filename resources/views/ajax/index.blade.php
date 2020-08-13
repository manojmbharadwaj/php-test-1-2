<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Test - Ajax Demo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('landing_page') }}">PHP Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('landing_page') }}">Home</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing_page') }}/api/user?id=1,2,3,4,5">API (ID)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing_page') }}/api/user?id=1,2,3,4,5&fmt=1">API (CSV)</span></a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <h1 id="page_users_info">Users Info</h1>
            </div>
            <div class="col-md-12 col-lg-12">
                <button type="button" class="btn btn-primary add-modal-btn" data-toggle="modal">Add User</button>
            </div>

            @if ( count($users) > 0 )
                <div class="col-md-12 col-lg-12 table-responsive mt-1">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            @else
                <div class="card mt-2">
                    <div class="card-header">No Users Added Yet</div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <p>No users have been added. Please run the Seeders. <code>php artisan db:seed --class=UserSeeder</code></p>
                            <p>Alternatively you can <button type="button" class="btn btn-primary btn-sm add-modal-btn" data-toggle="modal">Add User</button></p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal_form" action="" method="">
                    <div class="modal-body">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="action" value="">
                        <input type="hidden" id="model_user" value="">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="modal_name" required="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="modal_email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone</label>
                            <input type="text" class="form-control" id="modal_phone" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">City</label>
                            <input type="text" class="form-control" id="modal_city" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
