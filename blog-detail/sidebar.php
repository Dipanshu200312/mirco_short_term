<style>/* Blue and White Form Styles */
.el-form-widget {
  background-color: #f9f9f9; /* Light background for the form */
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.el-form-widget .form-group {
  margin-bottom: 20px;
}

.el-form-widget .form-label {
  font-weight: bold;
  color: #1e3a8a; /* Blue color for labels */
  margin-bottom: 8px;
}

.el-form-widget .form-control {
  width: 100%;
  padding: 12px;
  border: 1px solid #b0c4de; /* Light blue border */
  border-radius: 5px;
  font-size: 14px;
  background-color: #fff; /* White background for inputs */
  color: #333; /* Dark text */
  transition: border-color 0.3s ease;
}

.el-form-widget .form-control:focus {
  border-color: #1e3a8a; /* Blue border on focus */
  outline: none;
}

.el-form-widget .btn-submit {
  background-color: #1e3a8a; /* Blue background */
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.el-form-widget .btn-submit:hover {
  background-color: #374c9c; /* Darker blue on hover */
}

</style>
<div class="col-lg-3 col-md-12">
  <div class="el-blog-sidebar-main">
    <!-- Search Form Widget -->
    <div class="el-inner-blog-box el-search-widget">
      <h4 class="el-blog-title">Search</h4>
      <div class="el-input-field">
        <input type="text" placeholder="Your Email">
        <a href="javascript:;" class="el-btn">
          <img src="assets/images/all-instructor/search-white.svg" alt="Search Icon">
        </a>
      </div>
    </div>

    <!-- Image Section -->
    <div class="el-inner-blog-box el-image-widget">
      <h4 class="el-blog-title">Our Image</h4>
      <div class="el-image-box">
        <img src="path/to/your-image.jpg" alt="Image Description" class="img-fluid">
      </div>
    </div>

    <!-- Improved Blue & White Form Section -->
    <div class="el-inner-blog-box el-form-widget ">
      <h4 class="el-blog-title">Contact Us</h4>
      <form action="#" method="post">
        <div class="form-group">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" id="name" class="form-control" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" id="phone" class="form-control" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
          <label for="message" class="form-label">Your Message</label>
          <textarea id="message" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="el-btn btn-submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div></div></div>