<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../includes/head-content.php' ?>
	  <script src="../js/plugins.js" defer="defer"></script>
   	<script src="../js/site.js" defer="defer"></script>
	<link rel="canonical" href=“https:/aa-inspections.com/contact-confirmation.php/” />    
  <meta charset="utf-8">
  <title>Contact Confirmation - AA Inspections</title>
  <meta name="description" content="Thank you for contacting AA Inspections" />
  <meta content="Contact AA Inspections" property="og:title">
  <meta content="contact AA Inspections" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
   <script src="//code.jquery.com/jquery-2.2.1.min.js" defer="defer"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" defer="defer"></script>
  <script src="/js/plugins.js" defer="defer"></script>
  <script src="/js/site.js" defer="defer"></script>
</head>
<?php flush(); ?>
<body class="body">
	<!--nav bar -->
	<?php include '../includes/navbar.php' ?>
    <header class="section subhero">
    <div class="container">
      <div class="subhero-content">
        <div class="subhero-divider"></div>
        <h1 class="heading subhero" data-ix="scale">Contact Confirmation - AA Inspections</h1>
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
           <div class="contact-text" data-ix="du"><strong>Phone:</strong> <a href="tel:7722917788" class="footer-address-link">772 291 7788</a><br><strong>Fax:</strong> <a href="tel:7722917812" class="footer-address-link">772 291 7812</a><br></div>
        </div> 
       <div class="form-1-block w-form">
	       <p class="paragraph l">Thank you for contacting AA Inspections, We will follow up shortly</p><br /><br />
	       <p class="paragraph l">Here is a summary of the information you submitted:</p><br /><br />
        <?php
	        echo 'Name: ' . $_POST ["name"] . '<br />';
			echo 'Email: ' . $_POST ["email"] . '<br /><br />';
			echo 'Message: ' . $_POST ["reason"];
		?>
      </div>
    </div>
  </section>	
	  <!-- ********** Pull in Footer -->
  <?php include '../includes/footer.php' ?>
   </body>
</html>