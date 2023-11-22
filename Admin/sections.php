<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<?php
if(isset($_POST['submit']))
{
    $section = $_POST['section'];
    
    // Get the current timestamp for 'updatedAt'
    $updatedAt = date("Y-m-d H:i:s");

    // Set 'active' to 1
    $active = 1;

    // 'createdAt' will be automatically set to the current timestamp

    $query = mysqli_query($db_conn, "INSERT INTO sections (section, updatedAt, active) VALUES ('$section', '$updatedAt', '$active')") or die('fdxf');
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark" style="color: #2C387F">Manage Sections</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="color: #3f51b5;">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    <li class="breadcrumb-item active">
                        Sections </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="continer-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            All Sections
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  bg-white">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Actions</th>

                                        <!-- <th>Email</th> -->
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($db_conn, 'SELECT * FROM sections');
                                    $count=1;
                                        while($section= mysqli_fetch_object($query)){?>
                                        <tr>
                                            <td><?=$count++?></td>
                                         <td><?=$section->title?></td>

                                        </tr>


                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Section

                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="section">Add New Section</label>
                                <input type="text" name="section" placeholder="Section" required class="form-control">
                            </div>
                            
                                <button name="submit" class="btn btn-success float-sm-right">Submit</button>
                        </form>
                  
                </div>
            </div>




        </div>
    </div>
</section>
<!-- /.content -->
<?php include('footer.php') ?>