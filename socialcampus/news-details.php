<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Social Campus | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/social-campus.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<?php include('includes/header.php'); ?>

<!-- Page Content -->
<div class="container">


    <div class="row" style="margin-top: 4%">

        <!-- News Entries Column -->
        <div class="col-md-8">

            <!-- News Post -->
            <?php
            $id = intval($_GET['nid']);
            $query = mysqli_query($con, "select title, department, category, link, dbDate from duyurular where id='$id'");
            while ($row = mysqli_fetch_array($query)) {
                ?>

                <div class="card mb-4">

                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlentities($row['title']); ?></h2>
                        <p><b>Category : </b> <a
                                    href="category.php?catid=<?php echo htmlentities($row['category']) ?>"><?php echo htmlentities($row['category']); ?></a>
                            |
                            <b> Posted on </b><?php echo htmlentities($row['dbDate']); ?></p>
                        <hr/>

                        <?php
                        $link = $row['link'];
//                        echo(substr($link, 0)); ?>
                        <a href="<?php echo $link?>"><p class="card-text"> <?php echo $link?> </p>
                        </a>
                    </div>
                    <div class="card-footer text-muted">


                    </div>
                </div>
            <?php } ?>


        </div>

        <!-- Sidebar Widgets Column -->
        <?php include('includes/sidebar.php'); ?>
    </div>

</div>


<?php include('includes/footer.php'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
