<?php
include 'config.php';

$uploadDir = 'uploads/'; // Folder to store uploaded images

// Handle category addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    if (!empty($category_name)) {
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
    }
}

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
        $stmt = $conn->prepare("INSERT INTO products (name, price, category_id, image, url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsss", $product_name , $price, $category_id, $image, $product_url);
        $stmt->execute();
    }
}

// Fetch categories for dropdown
$categories = $conn->query("SELECT * FROM categories");

// Fetch products to display
$products = $conn->query("SELECT products.*, categories.name AS category_name FROM products 
                          JOIN categories ON products.category_id = categories.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #45a049;
        }
        .table-container {
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        img {
            max-width: 80px;
            border-radius: 5px;
        }
        .btn-view {
            background: #007BFF;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-view:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<h1>Admin Panel</h1>

<div class="container">
    <!-- Add Category Form -->
    <h2>Add Category</h2>
    <form method="POST">
        <label>Category Name:</label>
        <input type="text" name="category_name" required>
        <button type="submit" name="add_category">Add Category</button>
    </form>

    <!-- Add Product Form -->
    <h2>Add Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="product_name" required>

        <!-- <label>Description:</label>
        <textarea name="description" required></textarea> -->

        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>

        <label>Category:</label>
        <select name="category_id" required>
            <option value="">Select Category</option>
            <?php while ($category = $categories->fetch_assoc()) { ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php } ?>
        </select>

        <label>Product Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <label>Product URL:</label>
        <input type="url" name="url" placeholder="https://example.com" required>

        <button type="submit" name="add_product">Add Product</button>
    </form>
</div>

<!-- Product List -->
<div class="container table-container">
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <!-- <th>Description</th> -->
            <th>Price</th>
            <th>Category</th>
            <th>View</th>
        </tr>
        <?php while ($product = $products->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php if ($product['image']) { ?>
                        <img src="uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    <?php } else { echo "No Image"; } ?>
                </td>
                <td><?= $product['name'] ?></td>
                <!-- <td><?= $product['description'] ?></td> -->
                <td>$<?= number_format($product['price'], 2) ?></td>
                <td><?= $product['category_name'] ?></td>
                <td>
                    <a href="<?= $product['url'] ?>" class="btn-view" target="_blank">View</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
