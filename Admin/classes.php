<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<?php

if (isset($_POST['submit'])) {
    $session = $_POST['session'];
    // $sectionsi = $_POST['session'];
// implode kisi array ko string mai convert krta hai
    $sections = implode(',', $_POST['section']);
    //    print_r($section);
    $createdAt = date('Y-m-d H:i:s');
    $updatedAt = date('Y-m-d H:i:s');
    $query = mysqli_query($db_conn, "INSERT INTO classess (session, section,createdAt,active,updatedAt ) VALUE ('$session', '$sections','$createdAt' , 1, '$updatedAt')") or die('fdxf');
}

?>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark" style="color: #2C387F">Manage Sessions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="color: #3f51b5;">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    <li class="breadcrumb-item active">
                        Sessions </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="continer-fluid">
        <?php

        if (isset($_REQUEST['action'])) { ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Add New Session
                    </h3>

                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="session">Session</label>
                            <input type="text" name="session" placeholder="Session" required class="form-control">
                        </div>
                        <div class="form-group">

                            <label for="title">Sections</label>
                            <?php
                            $query = mysqli_query($db_conn, 'SELECT * FROM sections');
                            while ($sections = mysqli_fetch_array($query)) { ?>
                                <div>
                                    <label for="section<?= $sections['id'] ?>">
                                        <input type="checkbox" id="section<?= $sections['id'] ?>" name="section[]"
                                            value="<?= $sections['id'] ?>">
                                        <?= $sections['title'] ?>
                                    </label>
                                </div>
                            <?php } ?>
                            <button name="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } else { ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Classes

                    </h3>
                    <div class="card-tools">
                        <a href="?action=add-new" class="btn btn-success"><i class="fa fa-plus mr-2">Add New</i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  bg-white">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Session Name</th>
                                    <th>Sectiions</th>
                                    <!-- <th>Actions</th> -->
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $query = mysqli_query($db_conn, 'SELECT * FROM classess');
                                while ($class = mysqli_fetch_object($query)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $count++ ?>
                                        </td>
                                        <td>
                                            <?= $class->session ?>
                                        </td>
                                        <td>
                                            <?php
                                            $sections = explode(',', $class->section);
                                            foreach ($sections as $section) {
                                                $section_query = mysqli_query($db_conn, 'SELECT * FROM sections WHERE id = '. $section.'');
                                                $section_value = mysqli_fetch_object($section_query);

                                                // Check the query and result
                                                // echo 'Query: SELECT * FROM sections WHERE id = '. $section.'';
                                                echo $section_value->title .'<br>';
                                                // print_r($section_value);
                                                // echo ;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>

                        </table>

                    </div>
                </div>



            </div>


        <?php } ?>




</section>
<!-- /.content -->
<?php include('footer.php') ?>