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
    <title>Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
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
                                <h2 class="font-weight-bold" style="margin-top:-30px"><?php echo $courseRow['name']; ?></h2>
                                <h3 style="margin-top:30px">Announcements</h3>

                                <?php
                                // Retrieve announcements related to the selected course
                                $announcementsQuery = "SELECT * FROM announcment WHERE courceName = '{$courseRow['name']}' AND active = 1";
                                $announcementsResult = $conn->query($announcementsQuery);

                                if ($announcementsResult->num_rows > 0) {
                                    while ($announcement = $announcementsResult->fetch_assoc()) {
                                        echo '
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $announcement['Title'] . '</h5>
                                                <p class="card-text">' . $announcement['announcment'] . '</p>
                                                <p class="card-text"><small class="text-muted">Posted on ' . $announcement['createdAt'] . '</small></p>
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<p>No announcements available for this course.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Include your footer and other common elements -->
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
</body>

</html>
