<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {

  $courseName = $_POST['courseName'];
  $instructor = $_POST['instructor'];
  $session = $_POST['session'];
  $description = $_POST['description'];
  $updatedAt = date("Y-m-d");
  $active = 1; // Assuming active status is set to 1 for a new course

  // File upload handling
  $target_dir = "../img";
  $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

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

  // Upload file if all checks pass
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
      // File uploaded successfully, proceed with database insertion
      $query = mysqli_query($conn, "SELECT * FROM tblcource WHERE name ='$courseName'");
      $ret = mysqli_fetch_array($query);
      if ($ret > 0) {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Course Name Already Exists!</div>";
      } else {
        $query = mysqli_query($conn, "INSERT INTO tblcource (name, instructor, session, description, image, updatedAt, active) 
                    VALUES ('$courseName', '$instructor', '$session', '$description', '$target_file', '$updatedAt', '$active')");

        if ($query) {
          $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Course Created Successfully!</div>";
        } else {
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
      }
    } else {
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Sorry, there was an error uploading your file.</div>";
    }
  }
}

//---------------------------------------EDIT-------------------------------------------------------------
if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
  $Id = $_GET['Id'];
  $query = mysqli_query($conn, "select * from tblcourses where Id ='$Id'");
  $row = mysqli_fetch_array($query);

  // ---------------UPDATE-----------------------------

  if (isset($_POST['update'])) {
    $courseName = $_POST['courseName'];
    $instructor = $_POST['instructor'];
    $session = $_POST['session'];
    $description = $_POST['description'];
    $thumbnail = $_POST['thumbnail'];
    $updatedAt = date("Y-m-d");

    $query = mysqli_query($conn, "update tblcource set name='$courseName', instructor='$instructor',
      session='$session', description='$description', image='$thumbnail', updatedAt='$updatedAt'
      where Id='$Id'");

    if ($query) {
      echo "<script type = \"text/javascript\">
              window.location = (\"addCource.php\")
              </script>";
    } else {
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
  }
}

// --------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
  $Id = $_GET['Id'];
  $query = mysqli_query($conn, "UPDATE tblcource SET active = 0 WHERE Id = '$Id'");
  if ($query == TRUE) {
    echo "<script type='text/javascript'>
          window.location = ('addCource.php')
          </script>";
  } else {
    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred: " . mysqli_error($conn) . "</div>";
  }
}


// ... (Remaining code for edit and delete)

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <?php include 'includes/title.php'; ?>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "Includes/sidebar.php"; ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "Includes/topbar.php"; ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Course</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Course</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Course</h6>
                  <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="courseName"
                          value="<?php echo $row['courseName']; ?>" id="exampleInputFirstName">
                      </div>
                      <div class="col-xl-6">
                        <label class="form-control-label">Instructor<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="instructor"
                          value="<?php echo $row['instructor']; ?>" id="exampleInputFirstName">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Session<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="session" value="<?php echo $row['session']; ?>"
                          id="exampleInputFirstName">
                      </div>
                      <div class="col-xl-6">
                        <label class="form-control-label">Description<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="description"
                          value="<?php echo $row['description']; ?>" id="exampleInputFirstName">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Thumbnail (Image)<span
                            class="text-danger ml-2">*</span></label>
                        <input type="file" class="form-control" name="thumbnail" id="exampleInputFirstName">
                      </div>
                    </div>
                    <?php
                    if (isset($Id)) {
                      ?>
                      <button type="submit" name="update" class="btn btn-warning">Update</button>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php
                    } else {
                      ?>
                      <button type="submit" name="save" class="btn btn-primary">Save</button>
                      <?php
                    }
                    ?>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
                    </div>
                    <div class="table-responsive p-3">
                      <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                          <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Session</th>
                            <th>Description</th>
                            <th>Thumbnail</th>
                            <th>Updated At</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $query = "SELECT * FROM tblcource WHERE active = 1";
                          $rs = $conn->query($query);
                          $num = $rs->num_rows;
                          $sn = 0;
                          $status = "";
                          if ($num > 0) {
                            while ($rows = $rs->fetch_assoc()) {
                              $sn = $sn + 1;
                              echo "
                                <tr>
                                    <td>" . $sn . "</td>
                                    <td>" . $rows['name'] . "</td>
                                    <td>" . $rows['instructor'] . "</td>
                                    <td>" . $rows['session'] . "</td>
                                    <td>" . $rows['description'] . "</td>
                                    <td><img src='" . $rows['image'] . "' alt='thumbnail' style='max-width: 50px; max-height: 50px;'></td>
                                    <td>" . $rows['updatedAt'] . "</td>
                                  </tr>";
                                            }
                          } else {
                            echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>