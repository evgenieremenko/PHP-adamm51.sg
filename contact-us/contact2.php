<!DOCTYPE html>
<html lang="en">
<head>
 	<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5e9c74988a915e1d9a0c78dc" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 	<script src="/js/webflow.js"></script>
 	  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<?php include '../includes/head-content.php' ?>
	<link rel="canonical" href=“https:/aa-inspections.com/contact-us/” />    
  <meta charset="utf-8">
  <title>Contact AA Inspections</title>
  <meta name="description" content="Contact AA Inspections by using the form below or call us - thank you!" />
  <meta content="Contact AA Inspections" property="og:title">
  <meta content="contact AA Inspections" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
</head>
<?php flush(); ?>
<body class="body">
	<!--nav bar -->
	<?php include '../includes/navbar.php' ?>
    <header class="section subhero">
    <div class="container">
      <div class="subhero-content">
        <div class="subhero-divider"></div>
        <h1 class="heading subhero" data-ix="scale">Contact AA Inspections</h1>
        <div class="subhero-divider"></div>
      </div>
    </div>
    <div class="bg-image-wrapper"><img src="/images/IMG_3428.jpg" alt="Contact Image" srcset="/images/IMG_3428-p-500.jpeg 500w, /images/IMG_3428-p-1080.jpeg 1080w, /images/IMG_3428-p-1600.jpeg 1600w, /images/IMG_3428.jpg 1920w" sizes="100vw" class="image-absolute" data-ix="scale-rev">
      <div class="bg-image-overlay"></div>
    </div>
  </header>
  <nav class="breadcrumb-section">
    <div class="container">
      <div class="breadcrumb-wrapper"><a href="/" class="breadcrumb-item home w-inline-block"><img src="images/home-run.svg" alt="" class="breadcrumb-icon"><div>Home</div></a><img src="images/next_1.svg" alt="" class="breadcrumb-icon"><div>Contact</div></div>
    </div>
  </nav>
  <section class="section">
    <div class="container">
      <div class="contact-block">
        <div class="footer-company-block">
          <h2 class="heading contact" data-ix="ud">AA Inspections</h2>
          <address class="address">
            <div class="contact-text" data-ix="du">3224 NW Perimeter Road<br>Palm City, FL 34990</div>
          </address>
           <div class="contact-text" data-ix="du"><strong>Phone:</strong> <a href="tel:7722917788" class="footer-address-link">772 291 7788</a><br><strong>Fax:</strong> <a href="tel:7722917812" class="footer-address-link">772 291 7812</a><br><strong>Email: </strong><a href="mailto:info@aainspectors.com" class="footer-address-link">info@aainspectors.com</a></div>
        </div>
     <!-- Form Started -->
        <div class="form-1-block w-form">
            <form id="reused_form">
            	<label><i class="form-field-label-1" aria-hidden="true"></i> Name</label>
				<input type="text" name="name" class="form-1" data-ix="fade-delay-1" placeholder="Enter Name">
                <label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                <label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
                <textarea rows="3" name="message" class="form-control" placeholder="Type Your Message"></textarea>
                <button class="btn btn-raised btn-block btn-danger">Sumit - Thank You! &rarr;</button>
            </form>
                 <div id="error_message" style="width:100%; height:100%; display:none; ">
                 	<h4>Error</h4>Sorry there was an error sending your form. 
                 <div id="success_message" style="width:100%; height:100%; display:none; ">
				 <h2>Success! Your Message was Sent Successfully.</h2>
            <!-- Form Ended -->
    	</div>
    </div>	
  </section>
  <!-- ********** Pull in Footer -->
  <?php include '../includes/footer.php' ?>
  </body>
</html>