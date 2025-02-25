
<?php
include 'config.php';

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
$blogId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($blogId) {
    // Fetch the blog details
    $stmt = $conn->prepare("SELECT * FROM blog WHERE id = ?");
    $stmt->bind_param("i", $blogId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        exit("<h1>Blog post not found.</h1>");
    }
    $stmt->close();
} else {
    exit("<h1>No blog ID specified.</h1>");
}

// Prepare meta tags if blog data is available
$meta_title = $blog ? escapeHtml($blog['meta_title']) : "Default Meta Title";
$meta_description = $blog ? escapeHtml($blog['meta_description'] ?: "Default description for this blog post.") : "Default Meta Description";
$image = $blog ? escapeHtml($blog['image']) : "default-image.jpg";
$imageUrl = "https://yourwebsite.com/uploads/" . $image;
$url = "https://yourwebsite.com/blog_detail.php?id=" . $blogId;

// Generate meta tags
$metaTags = <<<META
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="$meta_title">
<meta property="og:description" content="$meta_description">
<meta property="og:image" content="$imageUrl">
<meta property="og:url" content="$url">
<meta property="og:type" content="article">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="$meta_title">
<meta name="twitter:description" content="$meta_description">
<meta name="twitter:image" content="$imageUrl">
<meta name="twitter:site" content="@YourTwitterHandle">
META;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <title><?php echo $meta_title; ?></title>
    <?php echo $metaTags; ?>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="shortcut icon" type="image/ico" href="assets/images/all-instructor/favicon.png"/>		
	<link rel="stylesheet" href="assets/css/animate.css">		
	<link rel="stylesheet" href="assets/css/all-instructor-style.css">		
</head>
<body></body>
<?php include 'common/navbar.php'; ?>
<?php include 'blog-detail/banner.php'; ?>
<?php include 'blog-detail/detail.php'; ?>
<?php include 'blog-detail/sidebar.php'; ?>
<?php include 'common/footer.php'; ?>