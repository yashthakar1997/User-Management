<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <title>Install wizard</title>
</head>
<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a href="#"><span class="navbar-brand mb-0 h1">User Management</span></a>
        </div>
    </nav>

    <div class="card col-8 m-5 mx-auto shadow-sm">
      <div class="card-body">
        
          <div class="form-group">
            <label for="hostname">Host name</label>
            <input type="text" class="form-control" id="hostname" placeholder="localhost">
          </div>
          <div class="form-group">
            <label for="username">User name</label>
            <input type="text" class="form-control" id="username" placeholder="root">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" placeholder="root">
          </div>
          <div class="form-group">
            <label for="database">Database</label>
            <input type="text" class="form-control" id="database" placeholder="user_management">
          </div>
          <button class="btn btn-primary mt-4 btn-lg btn-block" id="install-save-changes">Save Changes </button>
        
        <div class="msg-box d-none alert alert-warning alert-dismissible fade show" role="alert">
            <div id="msg"></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

      </div>
    </div>
    
    <script type="text/javascript" src="assets/jquery.js"></script>
    <script type="text/javascript" src="assets/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/admin.js"></script>
</body>
</html>