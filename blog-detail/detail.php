
    <!-- Blog Single Start -->
    <div class="el-blog-single-wrapper">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-9 col-md-12">
                    <div class="el-inner-blog-box el-blog-single">
                        <div class="el-blogsingle-img">
                            <img src="admin/uploads/<?php echo escapeHtml($blog['image']); ?>" alt="<?php echo escapeHtml($blog['name']); ?>" />
                        </div>
                        <div class="el-blogsingle-content">
                            <h4 class="el-blog-title"><?php echo escapeHtml($blog['name']); ?></h4>
                            <ul>
                                <li>
                                    <a href="javascript:;">
                                        <span>Published on <?php echo formatPublishDate($blog['created_at']); ?></span>
                                    </a>
                                </li>
                            </ul>
                            <p><?php echo nl2br(escapeHtml($blog['fulldesc'])); ?></p>
                            <div class="back-link">
                                <a href="blog.php">Back to Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            
</body>
</html>
