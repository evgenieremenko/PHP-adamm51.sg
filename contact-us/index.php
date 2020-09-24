<!-- logic for form -->
<?php

$success = isset($_GET['success']);

function atrim($a)
{
    if (is_array($a))
        foreach ($a as $key => $val)
            $a[$key] = atrim($val);
    else
        $a = trim($a);

    return $a;
}

function valid($p_value, $p_type)
{
    switch($p_type)
    {
        case 'alpha-numeric':	return preg_match( "/^[A-Za-z\d]+$/", $p_value );
        case 'decimal':			return preg_match( "/^\d*([.]?\d+){0,1}$/", $p_value );
        case 'decimal2':		return preg_match( "/^[+\-]?(?:\d+(?:\.\d*)?|\.\d+)$/", $p_value );
        case 'email':			return preg_match( "/^[a-zA-Z\+\d._-]+@([a-zA-Z\d.-]+\.)+[a-zA-Z\d.-]{2,4}$/", $p_value );
        case 'integer': 		return (strval(intval($p_value)) == strval($p_value) ? true : false);
        case 'integer-list':

            if (strval(intval($p_value)) == strval($p_value))
                return true;

            $items = atrim(explode(",", $p_value));
            if (!is_array($items))
                return false;

            foreach ($items as $item)
                if (strval(intval($item)) != strval($item))
                    return false;

            return true;

        case 'name':			return preg_match( "/^[A-Za-z .-]*$/", $p_value );
        default:				die("The rule, $p_type,  wasn't found");
    }
}

$error = Array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $_POST = atrim($_POST);

	// if ($_POST['name'] == '')		$error[] = "<strong>Name</strong> was blank.  Please enter a name.";
	// if (!valid($_POST['email'], 'email'))	$error[] = "<strong>Email</strong> is not a valid email address. Please enter a valid email.";

    // if (count($error) == 0)
    // {
		// $header	= 'From: no-reply@aa-inspections' . "\r\n" . 'Reply-To: adammeyerson@gmail.com'."\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";

		// $body = "Name: " . $_POST['name'] . "\n"
			// . "Email: " . $_POST['email'] . "\n"
			// . (($_POST['reason'] != '') ? "Reason: " . $_POST['reason'] . "\n" : '');

		// mail('adammeyerson@gmail.com', 'AA Inspections Contact Form Request - ' . $_POST['email'], $body, $header);
		
		// exit(header('Location: ' . $_SERVER['PHP_SELF'] . '?success', true, '302'));
    // }

    // for ($i=0; $i<count($error); $i++)
	// {
		// $errors .= $error[$i].'<br />';
	// }
	
	
	require 'phpmailer/PHPMailerAutoload.php';
 require 'phpmailer/class.phpmailer.php';	
 require 'phpmailer/class.smtp.php';	

$mail= new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;	
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Username='youremail@gmail.com';
$mail->Password='password';
$mail->setFrom('youremail@gmail.com','Demo');
$mail->addAddress('receiver@gmail.com');
$mail->addReplyTo('youremail@gmail.com');
$mail->isHTML(true);
$mail->Subject='Demo email';
$mail->Body='<p align="left">This is demo email</p>';

if(!$mail->send()){
	echo "msg counld not send";
	echo 'Error: '. $mail->ErrorInfo;
}else{
	echo "successfully";
}
	
	
}


 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../includes/head-content.php' ?>
	  <script src="../js/plugins.js" defer="defer"></script>
   	<script src="../js/site.js" defer="defer"></script>
	<link rel="canonical" href=“https:/aa-inspections.com/contact-us/” />    
  <meta charset="utf-8">
  <title>Contact AA Inspections</title>
  <meta name="description" content="Contact AA Inspections by using the form below or call us - thank you!" />
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
           <div class="contact-text" data-ix="du"><strong>Phone:</strong> <a href="tel:7722917788" class="footer-address-link">772 291 7788</a><br><strong>Fax:</strong> <a href="tel:7722917812" class="footer-address-link">772 291 7812</a><br></div>
        </div> 
       <? if ($success) {  ?>
         <div class="form-1-block w-form">
	       <p class="paragraph l">Thank you for contacting AA Inspections, We will follow up shortly<br /><br />
	        Here is a summary of the information you submitted:<br /><br />
	        echo 'Name: ' . $_POST ["name"] . '<br />';
			echo 'Email: ' . $_POST ["email"] . '<br /><br />';
			echo 'Message: ' . $_POST ["reason"];
	       </p>
         </div>
			<? } else if (!empty($errors)) { ?>
			<div class="form-1-block w-form">
				<p class="paragraph l"><? echo $errors?></p>
			</div>
		<? } ?>
       <!-- Start Original Contact Form ------------------------ --> 
         <div class="form-1-block w-form">
          <form id="Contact-Form"  method="post" action="<?=$_SERVER['REQUEST_URI']?>">
	          <label for="Contact-Form-Name" class="form-field-label-1">Name</label>
	          <input type="text" name="name" class="form-field-1 w-input" value="<?=$_POST['name']?>" required>
	          <label for="Contact-Form-Email" class="form-field-label-1">Email</label>
	          <input type="email" type="email" name="email" id="email" class="form-field-1 w-input" value="<?=$_POST['email']?>" required>
	          <label for="Contact-Form-Message" class="form-field-label-1">Message</label>
	          <textarea name="reason" id="reason" class="form-field-1 form-field-1-text w-input"><?=$_POST['reason']?></textarea>
	          <input type="submit" value="Submit" class="form-submit w-button">
	      </form>
	    <? } ?>  
      </div>
    </div>
  </section>	
	  <!-- ********** Pull in Footer -->
  <?php include '../includes/footer.php' ?>
  <script src="//code.jquery.com/jquery-2.2.1.min.js" defer="defer"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="/js/plugins.js" defer="defer"></script>
<script src="/js/site.js" defer="defer"></script>
   </body>
</html>