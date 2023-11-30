<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAVE CONTENT--------------------------------------------------

if (isset($_POST['saveContent'])) {
  $courceName = $_POST['courceName'];
  $title = $_POST['title'];
  $contentDesc = $_POST['contentDesc'];
  $createdAt = date("Y-m-d H:i:s");
  $active = 1; // Assuming active status is set to 1 for new content
  $updatedAt = date("Y-m-d H:i:s");
  // File upload handling
  $target_dir = "../img/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check file size
  if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  $allowedFormats = ["pdf", "doc", "docx", "ppt", "pptx"];
  if (!in_array($fileType, $allowedFormats)) {
    echo "Sorry, only PDF, DOC, DOCX, PPT, PPTX files are allowed.";
    $uploadOk = 0;
  }

  // Upload file if all checks pass
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      // File uploaded successfully, proceed with database insertion
      $query = mysqli_query($conn, "INSERT INTO tblcontent (courceName, title, contentDesc, file, createdAt, active, updatedAt) 
                VALUES ('$courceName', '$title', '$contentDesc', '$target_file', '$createdAt', '$active', '$updatedAt')");

      if ($query) {
        $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Content Added Successfully!</div>";
      } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
      }
    } else {
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Sorry, there was an error uploading your file.</div>";
    }
  }
}

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
  <title>Add Content</title>
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
            <h1 class="h3 mb-0 text-gray-800">Add Content</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Content</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Content</h6>
                  <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                        <!-- Fetch course names from tblcource -->
                        <select class="form-control" name="courceName" required>
                          <?php
                          $courseQuery = mysqli_query($conn, "SELECT name FROM tblcource WHERE active = 1");
                          while ($courseRow = mysqli_fetch_assoc($courseQuery)) {
                            echo "<option value='" . $courseRow['name'] . "'>" . $courseRow['name'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-xl-6">
                        <label class="form-control-label">Title<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <div class="col-xl-12">
                        <label class="form-control-label">Description<span class="text-danger ml-2">*</span></label>
                        <textarea class="form-control" name="contentDesc" rows="3" required></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">File<span class="text-danger ml-2">*</span></label>
                        <input type="file" class="form-control" name="file" required>
                      </div>
                    </div>
                    <button type="submit" name="saveContent" class="btn btn-primary">Save Content</button>
                  </form>
                </div>
              </div>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Uploaded At</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "SELECT * FROM tblcontent WHERE active = 1";
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
                              <td>" . $rows['courceName'] . "</td>
                              <td>" . $rows['title'] . "</td>
                              <td>" . $rows['contentDesc'] . "</td>
                              <td>" . $rows['createdAt'] . "</td>
                              <td>
                                  <a href='" . $rows['file'] . "' target='_blank'>" . basename($rows['file']) . "</a>
                              </td>
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
              <!-- End Content Display Section -->

            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php  ?>
      <!-- Footer -->
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

  <!-- End of the file -->
</body>

</html>