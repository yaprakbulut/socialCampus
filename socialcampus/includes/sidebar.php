<head>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <style>
        /* Style the input field */
        #myInput {
            padding: 10px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
            background: #f1f1f1;
        }
    </style>
</head>
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form name="search" action="search.php" method="post">
                <div class="input-group">

                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </form>
        </div>
    </div>
</div>

<!-- Filter Widget -->
<div class="card mb-4">
    <h5 class="card-header">Filter</h5>
    <div class="card-body">
        <form action="myfilter.php" method="post">
            <div>
                <h5>Category</h5>
            </div>
            <div>
                <select class="form-control" id="myCategoryInput" name="myCategoryInput">
                    <option value="" disabled selected>Select Category</option>

                    <?php $query = mysqli_query($con, "select id,category from duyurular group by category");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>

                    <?php } ?>
                </select>
            </div>
            <div>
                <br>
                <h5>Department</h5>
            </div>
            <div>
                <select class="form-control" id="myDepartmentInput" name="myDepartmentInput">
                    <option value="" disabled selected>Select Department</option>

                    <?php $query = mysqli_query($con, "select id,department from duyurular group by department");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>

                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="">
        <div class="" style="text-align: center">
            <button class="btn btn-secondary" type="submit" name="submit" id="filter">Filter</button>
        </div>
        </br>

    </div>
    </form>

    <!--  </form> -->
</div>

<script>
    $(document).ready(function () {


        $("#myDepartmentInput").change(function () {
            var selectedDeparment = $(this).children("option:selected").val();


        })
        $("#myCategoryInput").change(function () {
            var selectedCategory = $(this).children("option:selected").val();


        })


    });


</script>

<?php

if (isset($_POST['data2'])) {

    echo "data0";
}

function select()
{
    echo "The select function is called.";
    exit;
}

function insert()
{
    echo "The insert function is called.";
    exit;
}

?>
<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <?php $query = mysqli_query($con, "select id,category from duyurular group by category");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <li>
                            <a href="category.php?catid=<?php echo htmlentities($row['category']) ?>"><?php echo htmlentities($row['category']); ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Recent News</h5>
    <div class="card-body">
        <ul class="mb-0">
            <?php
            $query = mysqli_query($con, "select id, title from duyurular group by dbDate desc limit 8");
            while ($row = mysqli_fetch_array($query)) {

                ?>

                <li>
                    <a href="news-details.php?nid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['title']); ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

</div>
