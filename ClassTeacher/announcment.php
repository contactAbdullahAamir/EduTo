<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = ''; // Variable to store status messages

// Check if the form is submitted
// Check if the form is submitted
if (isset($_POST['addAnnouncement'])) {
    $courceName = $_POST['courceName'];
    $title = $_POST['title'];
    $announcement = $_POST['announcement'];
    $createdAt = date("Y-m-d H:i:s");
    $updatedAt = date("Y-m-d H:i:s");
    $active = 1; // Assuming active status is set to 1 for new announcements

    // File upload handling
    // (If you have any file handling, you can add it here)

    // Insert announcement into the database
    $query = mysqli_query($conn, "INSERT INTO announcment (courceName, Title, announcment, createdAt, updateAt, active) 
                VALUES ('$courceName', '$title', '$announcement', '$createdAt', '$updatedAt', '$active')");

    if ($query) {
        $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Announcement Added Successfully!</div>";
    } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred while adding the announcement. Error: " . mysqli_error($conn) . "</div>";
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
    <title>Add Announcement</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Add Announcement</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Announcement</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Form Basic -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Announcement</h6>
                                    <?php echo $statusMsg; ?>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Course Name<span
                                                        class="text-danger ml-2">*</span></label>
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
                                                <label class="form-control-label">Title<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" name="title" required placeholder="Announcement Title">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-12">
                                                <label class="form-control-label">Announcement<span
                                                        class="text-danger ml-2">*</span></label>
                                                <textarea class="form-control" name="announcement" rows="3" placeholder="Announcement Details"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="addAnnouncement"
                                            class="btn btn-primary">Add Announcement</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Announcement Display Section -->
                            
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Announcements</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th>Title</th>
                                                <th>Announcement</th>
                                                <th>Announced Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                          $query = "SELECT * FROM announcment WHERE active = 1";
                          $rs = $conn->query($query);
                          $num = $rs->num_rows;
                          $sn = 0;
                          $status = "";
                          if ($num > 0) {
                            while ($announcementRow = $rs->fetch_assoc()) {
                              $sn = $sn + 1;
                              
                                                    echo "<tr>
                                                        <td>" . $sn . "</td>
                                                        <td>" . $announcementRow['courceName'] . "</td>
                                                        <td>" . $announcementRow['Title'] . "</td>
                                                        <td>" . $announcementRow['announcment'] . "</td>
                                                        <td>" . $announcementRow['createdAt'] . "</td>
                                                       
                                                    </tr>";
                                                    $sn++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No announcements available.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Announcement Display Section -->

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
