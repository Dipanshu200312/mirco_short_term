<?php
// Include your database connection file (config.php)
include 'config.php';

// Fetch all products along with their category name
$sql = "SELECT p.id, p.name, p.description, p.price, p.image, p.url, c.name AS category_name
        FROM products p
        JOIN categories c ON p.category_id = c.id";
$result = $conn->query($sql);
?>

<?php include 'partials/main.php'; ?>

<head>
    <?php
    $title = "Product List";
    include 'partials/title-meta.php'; ?>

    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />

    <?php include 'partials/head-css.php'; ?>
</head>

<body>
    <!-- Begin page -->
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
                        <a href="add_product.php">
                            <button type="button" class="btn btn-primary" style="margin-left: 30px;width: 179px;">Add New Product</button>
                        </a>
                    </div>

                    <div class="container table-container">
                        <h2>Product List</h2>
                        <table class="table table-striped">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>View</th>
                            </tr>
                            <?php while ($product = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td>
                                        <?php if ($product['image']) { ?>
                                            <img src="uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" style="width: 100px;">
                                        <?php } else { echo "No Image"; } ?>
                                    </td>
                                    <td><?= $product['name'] ?></td>
                                    <td><?= $product['description'] ?></td>
                                    <td>$<?= number_format($product['price'], 2) ?></td>
                                    <td><?= $product['category_name'] ?></td>
                                    <td>
                                        <a href="<?= $product['url'] ?>" class="btn btn-info" target="_blank">View</a>
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
