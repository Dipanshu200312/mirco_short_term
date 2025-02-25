<!-- Blog Single Start -->
<div class="el-blog-single-wrapper el-blog-medium-wrapper">
    <div class="container">
        <div class="row gy-4">
            <?php
            include 'config.php';

            // Pagination setup
            $limit = 6; // Number of posts per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;

            // Fetch total number of blog posts
            $result_count = $conn->query("SELECT COUNT(id) AS total FROM blog");
            $total = $result_count->fetch_assoc()['total'];
            $pages = ceil($total / $limit);

            // SQL query to fetch blog posts with limit and offset
            $sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT $start, $limit";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop through each blog post
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6'>";
                    echo "<div class='el-inner-blog-box el-blog-single'>";
                    echo "<div class='el-blogsingle-img'>";
                    echo "<img src='admin/uploads/" . $row['image'] . "' alt='" . htmlspecialchars($row["name"]) . "'>";
                    echo "</div>";
                    echo "<div class='el-blogsingle-content'>";
                    echo "<h4 class='el-blog-title'>" . htmlspecialchars($row["name"]) . "</h4>";
                    echo "<ul>";
                    // echo "<li><a href='javascript:;'><span><svg viewBox='0 0 13.969 15'> <!-- SVG icon for author --></svg></span> By " . htmlspecialchars($row["author"]) . "</a></li>";
                    // echo "<li><a href='javascript:;'><span><svg viewBox='0 0 20 16'> <!-- SVG icon for comments --></svg></span> " . $row['comments_count'] . " Comments</a></li>";
                    echo "</ul>";
                    echo "<p class='el-para'>" . htmlspecialchars(substr($row["fulldesc"], 0, 100)) . "...</p>";
                    echo "<a href='blog-single.php?id=" . $row["id"] . "' class='el-btn'>Read More</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No blog posts found.</p>";
            }

            // Pagination
            echo "<div class='row'>";
            echo "<div class='col-lg-12'>";
            echo "<div class='el-blog-bottom-pagination'>";
            echo "<nav>";
            echo "<ul class='pagination'>";

            // Previous button
            if ($page > 1) {
                echo "<li><a href='?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
            }

            // Pagination links
            for ($i = 1; $i <= $pages; $i++) {
                echo "<li class='" . ($i == $page ? 'active' : '') . "'><a href='?page=$i'>$i</a></li>";
            }

            // Next button
            if ($page < $pages) {
                echo "<li><a href='?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
            }

            echo "</ul>";
            echo "</nav>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</div>
<!-- Blog Single End -->


