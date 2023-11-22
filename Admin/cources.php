<?php
include('../includes/config.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Make sure to start the session

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $instructor = $_POST['instructor'];
    $session = $_POST['session'];
    $description = $_POST['description'];
    $image = $_FILES["thumbnail"]["name"];
    // $createdAt = date('Y-m-d');
    $updatedAt = date('Y-m-d');
    $active = 1;

    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["thumbnail"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            mysqli_query($db_conn, "INSERT INTO courses (`name`, `instructor`, `session`, `description`, `image`,  `active`, `updatedAt`) VALUES ('$name', '$instructor', '$session', '$description', '$image',  '$active', '$updatedAt')") or die(mysqli_error($db_conn));
            $_SESSION['success_msg'] = 'Course has been uploaded successfully';
            header('Location: courses.php');
            exit;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

include('header.php');
include('sidebar.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Courses </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action'])) {
        ?>
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">Add New Course</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" name="name" placeholder="Course Name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="instructor">Instructor Name</label>
                            <input type="text" name="instructor" placeholder="Instructor" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="duration">For Session</label>
                            <input type="text" name="session" id="session" class="form-control" placeholder="For Session" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Course Description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="thumbnail" id="thumbnail" required>
                        </div>
                        <button name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        <?php
        } else {
        ?>
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">Courses</h3>
                    <div class="card-tools">
                        <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Instructor</th>
                                    <th>For Session</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $course_query = mysqli_query($db_conn, 'SELECT * FROM courses');
                                while ($course = mysqli_fetch_object($course_query)) {
                                ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><img src="../dist/uploads/<?= $course->image ?>" height="100" alt="<?= $course->name ?>" class="border"></td>
                                        <td><?= $course->name ?></td>
                                        <td><?= $course->instructor ?></td>
                                        <td><?= $course->session ?></td>
                                        <td><?= $course->description ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div><!--/. container-fluid -->
</section>

<!-- /.content -->
<?php include('footer.php'); ?>
