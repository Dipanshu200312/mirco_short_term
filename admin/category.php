<?php
session_start();
@include 'config.php';

// Fetch existing categories from the database
$categories = $conn->query("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <?php include 'partials/head-css.php'; ?>
</head>
<body>

    <div class="wrapper">

        <?php include 'partials/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="container my-4">
                        <a href="add_category.php">
                            <button type="button" class="btn btn-primary" style="margin-left: 30px;width: 179px;">Add New Category</button>
                        </a>
                    </div>

                    <div class="container table-container">
                        <h2>Categories List</h2>
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                            <?php while ($category = $categories->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td>
                                        <!-- Edit and Delete Actions -->
                                        <a href="edit_category.php?id=<?= $category['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete_category.php?id=<?= $category['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end content -->

        </div> <!-- end content-page -->

    </div> <!-- end wrapper -->

    <?php include 'partials/footer.php'; ?>

    <!-- Include required JS files -->
    <?php include 'partials/footer-scripts.php'; ?>

    <script src="assets/js/app.min.js"></script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
