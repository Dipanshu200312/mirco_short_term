<?php
session_start();
@include 'config.php';

$uploadDir = 'uploads/'; // Folder to store uploaded images

// Fetch categories for the category dropdown
$categories = $conn->query("SELECT * FROM categories");

// Handle product addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    // $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $product_url = $_POST['url'];
    $image = '';

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES["image"]["name"]);
        $targetFilePath = $uploadDir . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
    }

    if (!empty($product_name) && $category_id > 0) {
        // Prepare and execute product insertion query
        $stmt = $conn->prepare("INSERT INTO products (name, price, category_id, image, url) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $product_name, $price, $category_id, $image, $product_url);
        $stmt->execute();
        echo '<script>alert("Product added successfully!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php include 'partials/head-css.php'; ?>
</head>
<body>
    <!-- Begin page -->
    <div class="wrapper">
        <?php include 'partials/menu.php'; ?>

        <!-- Add Product Form -->
        <div class="row" style="margin-left: 325px; margin-top: 48px; margin-right: 96px;">
            <h2>Add Product</h2>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card table-card">
                    <div class="card-body" style="width: 93%;">
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="add_product.php">
                                <div class="form-group">
                                    <label for="product_name" class="col-form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" required>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div> -->

                                <div class="form-group">
                                    <label for="price" class="col-form-label">Price</label>
                                    <input type="number" name="price" class="form-control" step="0.01" required>
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="col-form-label">Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php while ($category = $categories->fetch_assoc()) { ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="col-form-label">Product URL</label>
                                    <input type="url" name="url" class="form-control" placeholder="https://example.com" required>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
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
