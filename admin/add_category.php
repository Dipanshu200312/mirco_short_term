<?php
session_start();
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    
    if (!empty($category_name)) {
        // Prepare and execute category insertion query
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
        echo '<script>alert("Category added successfully!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <?php include 'partials/head-css.php'; ?>
</head>
<body>
    <!-- Begin page -->
    <div class="wrapper">
        <?php include 'partials/menu.php'; ?>

        <!-- Add Category Form -->
        <div class="row" style="margin-left: 325px; margin-top: 48px; margin-right: 96px;">
            <h2>Add Category</h2>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card table-card">
                    <div class="card-body" style="width: 93%;">
                        <div class="modal-body">
                            <form method="POST" action="add_category.php">
                                <div class="form-group">
                                    <label for="category_name" class="col-form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" required>
                                </div>
                                <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'partials/footer.php'; ?>
    </div>
    <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>
