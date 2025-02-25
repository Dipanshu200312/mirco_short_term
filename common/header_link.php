<!DOCTYPE html>

<html lang="en">


<head>
	<!--=== Required meta tags ===-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--=== custom css ===-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="shortcut icon" type="image/ico" href="assets/images/favicon.png"/>		
	<link rel="stylesheet" href="assets/css/animate.css">		
	<link rel="stylesheet" href="assets/css/all-instructor-style.css">		
    <script type="text/javascript">
    function validateRecaptcha(formId, recaptchaIndex) {
        document.getElementById(formId).addEventListener("submit", function(evt) {
            var response = grecaptcha.getResponse(recaptchaIndex);
            if (response.length === 0) {
                // reCaptcha not verified
                alert("Please verify you are human!"); 
                evt.preventDefault();
                return false;
            }
            // reCaptcha verified
            // Add other validations here if needed
        });
    }
    </script>
	<!--=== custom css ===-->
