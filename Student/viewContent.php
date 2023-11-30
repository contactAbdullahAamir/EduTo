<?php
include '../Includes/dbcon.php';
include '../Includes/session.php';

// Retrieve course details based on the ID passed in the URL
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    $courseQuery = "SELECT * FROM tblcource WHERE id = $courseId AND active = 1";
    $courseResult = $conn->query($courseQuery);

    if ($courseResult->num_rows > 0) {
        $courseRow = $courseResult->fetch_assoc();
    } else {
        // Handle the case where the course with the specified ID is not found
        // Redirect or display an error message, as needed
        header("Location: index.php");
        exit();
    }

    // Retrieve content for the selected course
    $contentQuery = "SELECT * FROM tblcontent WHERE courceName = '{$courseRow['name']}' AND active = 1";
    $contentResult = $conn->query($contentQuery);
} else {
    // Handle the case where no course ID is provided in the URL
    // Redirect or display an error message, as needed
    header("Location: index.php");
    exit();
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
    <title>Course Content</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <!-- ... (your head section remains unchanged) ... -->
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "Includes/sidebar.php";?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "Includes/topbar.php";?>

                <!-- Display the course details -->
                <section class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="font-weight-bold" style="margin-top: -30px;"><?php echo $courseRow['name']; ?></h2>
                                <h3 style="margin-top: 30px;">Course Content:</h3>
                                <?php
                                if ($contentResult->num_rows > 0) {
                                    while ($contentRow = $contentResult->fetch_assoc()) {
                                ?>
                                        <div class="card my-3">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $contentRow['title']; ?></h5>
                                                <p class="card-text"><?php echo $contentRow['contentDesc']; ?></p>
                                                <?php
                                                // Display file link
                                                $fileLink = "../" . $contentRow['file']; // Adjust the relative path based on your project structure
                                                ?>
                                                <a href="<?php echo $fileLink; ?>" download>Download File</a>
                                                <!-- Additional details or actions can be added here -->
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<p>No content available for this course.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
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
    <!-- ... (your scripts remain unchanged) ... -->
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

</body>

</html>
