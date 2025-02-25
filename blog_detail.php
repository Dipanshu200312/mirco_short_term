<?php
include 'config2.php';

// Function to escape HTML entities to avoid XSS
function escapeHtml($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Function to format the publish date
function formatPublishDate($dateString) {
    return date('F j, Y', strtotime($dateString));
}

// Initialize variables
$blog = null;
$topPost = null;
$latestPost = null;
$recentPostsResult = null;
$blogId = null; // Initialize $blogId to avoid undefined variable

// Check if a blog post ID is passed
if (isset($_GET['id'])) {
    $blogId = intval($_GET['id']); // Safely convert to integer

    // Fetch the blog details from the database using a prepared statement
    $sql = "SELECT * FROM blog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blogId); // Bind the blog ID as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the blog post data
        $blog = $result->fetch_assoc();
    } else {
        // If no blog post found, output an error message
        echo "Blog post not found.";
        exit;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No blog ID specified.";
    exit;
}

// Fetch the latest post
$sqlLatestPost = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 1"; // Get the latest post by created date
$latestPostResult = $conn->query($sqlLatestPost);

if ($latestPostResult && $latestPostResult->num_rows > 0) {
    $latestPost = $latestPostResult->fetch_assoc(); // Fetch the latest post data
} else {
    echo "No latest post found.";
}

// Fetch the top post
$sqlTopPost = "SELECT * FROM blog ORDER BY views DESC LIMIT 1"; // Assuming 'views' is a column to determine the top post
$topPostResult = $conn->query($sqlTopPost);

if ($topPostResult && $topPostResult->num_rows > 0) {
    $topPost = $topPostResult->fetch_assoc();
}

// Fetch recent posts
$sqlRecentPosts = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 5"; // Adjust as needed for recent posts
$recentPostsResult = $conn->query($sqlRecentPosts);

// Prepare meta tags only if $blog is fetched
if ($blog) {
    $title = escapeHtml($blog['name']);
    $meta_title = escapeHtml($blog['meta_title']);
    $meta_description = escapeHtml(!empty($blog['meta_description']) ? $blog['meta_description'] : "Default description for this blog post.");
    $description = escapeHtml($blog['fulldesc']);
    $image = escapeHtml($blog['image']);
} else {
    $meta_title = "Default Meta Title";
    $meta_description = "Default Meta Description";
    $image = "default-image.jpg"; // Default image if none found
}

// Set up URLs for the Open Graph and Twitter meta tags
$imageUrl = "https://yourwebsite.com/uploads/" . escapeHtml($image); // Escape for security
$url = "https://yourwebsite.com/blog_detail.php?id=" . $blogId;

// Generate the Open Graph and Twitter meta tags
$metaTags = '
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="' . escapeHtml($meta_title) . '">
<meta property="og:description" content="' . escapeHtml($meta_description) . '">
<meta property="og:image" content="' . escapeHtml($imageUrl) . '">
<meta property="og:url" content="' . escapeHtml($url) . '">
<meta property="og:type" content="article">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="' . escapeHtml($meta_title) . '">
<meta name="twitter:description" content="' . escapeHtml($meta_description) . '">
<meta name="twitter:image" content="' . escapeHtml($imageUrl) . '">
<meta name="twitter:site" content="@YourTwitterHandle">
';

// Output the meta tags
echo $metaTags;


// Close the database connection
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>" >

    <title><?php echo htmlspecialchars($meta_title); ?></title>

    <?php 
    if (isset($metaTags)) {
        echo $metaTags; 
    }
    ?>
   
    
</head>
<body>
<?php include("header.php"); ?>



<div class="blog-container">
  <!-- Blog Content Section -->
  <div class="blog-content">
  <p class="publish-date"><?php echo formatPublishDate($blog['created_at']); ?></p> <!-- Display publish date -->

    <img src="http://localhost/event_dashboard/user/admin/uploads//<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['name']); ?>"  class="cover-image" />
    <div class="blog-body">
    <h2 class="subheading"><?php echo htmlspecialchars($blog['name']); ?></h2>
    <p style="text-align: justify;"><?php echo nl2br(htmlspecialchars($blog['fulldesc'])); ?></p>
    
      
    </div>
    <div class="back-link">
      <a href="blog.php">Back to Blog</a>
    </div>
  </div>

  <!-- Sidebar Section -->
  <div class="sidebar">
    <div class="sidebar-inner">
      <h2>Search</h2>
      <div class="search-box">
        <input type="text" placeholder="Search..." class="search-input" />
        <button class="search-button">Search</button>
      </div>

      <!-- Image Box -->
      <!-- <div class="image-box">
        <img src="https://via.placeholder.com/400x400" alt="Sample Image" class="image-sample" />
      </div> -->

      <!-- Top Post Card -->
      <div class="latest-post-card">
  <h2>LATEST POST</h2>
  <div class="post-card">
    <?php if($latestPost): ?>
      <img src="http://localhost/event_dashboard/user/admin/uploads/<?php echo escapeHtml($latestPost['image']); ?>" alt="<?php echo escapeHtml($latestPost['name']); ?>" class="post-image" />
      <div class="post-details">
        <h6><?php echo escapeHtml($latestPost['name']); ?></h6>
        <p style="    padding-bottom: 20px;"><?php echo escapeHtml(substr($latestPost['fulldesc'], 0, 100)); ?>...</p>
        <a href="blog_detail.php?id=<?php echo $latestPost['id']; ?>" class="read-more">Read More</a>
      </div>
    <?php else: ?>
      <p>No latest post available.</p>
    <?php endif; ?>
  </div>
</div>


      <!-- Recent Posts -->
   <!-- Recent Posts -->
<div class="recent-posts">
    <h2>Recent Posts</h2>
    <?php if ($recentPostsResult && $recentPostsResult->num_rows > 0): ?>
        <?php while($recentPost = $recentPostsResult->fetch_assoc()): ?>
            <div class="recent-post">
                <div class="recent-post-image">
                    <img src="http://localhost/event_dashboard/user/admin/uploads/<?php echo escapeHtml($recentPost['image']); ?>" alt="<?php echo escapeHtml($recentPost['name']); ?>" />
                </div>
                <div class="recent-post-content">
                    <h3><?php echo escapeHtml($recentPost['name']); ?></h3>
                    <p><?php echo escapeHtml(substr($recentPost['fulldesc'], 0, 80)); ?>...</p>
                    <a href="blog_detail.php?id=<?php echo $recentPost['id']; ?>">Read More</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No recent posts available.</p>
    <?php endif; ?>
</div>

       


<?php include("footer.php"); ?>

<!-- Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nivo-lightbox/1.3.1/nivo-lightbox.min.js"></script>
<script src="asset/js/animate.js"></script>
<script src="asset/js/main.js"></script>
<script src="asset/js/responsive.js"></script>
<script src="asset/js/all.min.js"></script>
<script src="asset/js/owl.carousel.min.js"></script>
<script src="asset/js/slick.min.js"></script>
<script src="asset/js/aos.js"></script>

</body>
</html>
