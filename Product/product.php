<?php
include 'config.php';

// Fetch categories from the database
$category_query = "SELECT * FROM categories";
$category_result = $conn->query($category_query);

// Get selected category_id from URL
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
?>
<style>
   
</style>
<?php
// Assuming $category_result contains all categories
$first_category = null;

// Fetch the first category
if ($category_result->num_rows > 0) {
    $first_category = $category_result->fetch_assoc();
    // Reset the result pointer to the start
    $category_result->data_seek(0);
}

// Set the category_id to the first category's ID if not already set
if (!isset($category_id) || $category_id <= 0) {
    $category_id = $first_category['id'];
}
?>

<div class="category-buttons text-center mt-4">
    <?php while ($category = $category_result->fetch_assoc()) { ?>
        <a href="Product.php?category_id=<?= $category['id'] ?>" 
           class="<?= ($category_id == $category['id']) ? 'active' : '' ?>">
            <?= $category['name'] ?>
        </a>
    <?php } ?>
</div>

<div class="el-blog-single-wrapper">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-12 col-md-12">
                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
                    <?php
                    if ($category_id > 0) {
                        $sql = "SELECT * FROM products WHERE category_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $category_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($product = $result->fetch_assoc()) {
                                echo "<div class='col'>";
                                echo "<div class='el-inner-blog-box el-blog-single' style='text-align: center;'>";
                                echo "<div class='el-blogsingle-img'>";
                                echo "<img src='admin/uploads/" . $product['image'] . "' alt='Product Image' style='width: 200px; height: 200px; object-fit: cover;'>";
                                echo "</div>";
                                echo "<div class='el-blogsingle-content'>";
                                echo "<h6 class='el-blog-title'>" . $product['name'] . "</h6>";
                                // echo "<p class='el-para'>" . $product['description'] . "</p>";
                                echo "<h5><strong>₹" . number_format($product['price'], 2) . "</strong></h5>";
                                echo "<a href='" . $product['url'] . "' class='el-btn' style=' margin-top: 10px;'>Buy Now</a>";
                                echo "</div></div></div>";
                            }
                        } else {
                            echo "<h2 class='text-center'>No products found in this category.</h2>";
                        }
                    } else {
                        echo "<h2 class='text-center'>Please select a category.</h2>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
