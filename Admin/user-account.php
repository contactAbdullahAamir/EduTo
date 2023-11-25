<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="d-flex">
          <h1 class="m-0 text-dark">Manage Users Accounts</h1>
          <a href="user-account.php?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-sm" style="float:right; margin-left:40px">Add New+</a>
        </div>
      </div><!-- /.col -->

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="color: #3f51b5;">
          <li class="breadcrumb-item"><a href="#">Accounts</a></li>
          <!-- <li class="breadcrumb-item active">Dashboard</li> -->
          <li class="breadcrumb-item active">
            <?php echo isset($_REQUEST['user']) ? ucfirst($_REQUEST['user']) : ''; ?>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="continer-fluid">
    <?php if (isset($_GET['action']) && $_GET['action']) { ?>
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Full Name" name="name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email Address" name="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Role" name="name">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" value="Register">Register</button>
          </form>
        </div>
      </div>

    <?php } else { ?>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>S.No</th>
              <th>FullName</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $users_query = 'SELECT * from accounts WHERE `role` = "' . $_REQUEST['user'] . '"';
            $user_result = mysqli_query($db_conn, $users_query);
            // $users =  mysqli_fetch_array($user_result);
            // print_r($users)
            $count = 1;
            while ($user = mysqli_fetch_object($user_result)) {

              // echo $user -> email .'<br>';
              // for each loop
              // $users = mysqli_fetch_all($user_result, MYSQLI_ASSOC);
              // print_r($users);
          
              ?>
              <tr>
                <td>
                  <?= $count++ ?>
                </td>
                <td>
                  <?= $user->fullName ?>
                </td>
                <td>
                  <?= $user->email ?>
                </td>
                <td></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>
  </div>
</section>
<!-- /.content -->
<?php include('footer.php') ?>