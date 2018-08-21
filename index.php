<?php

// define variables and set to empty values
$fullNameError = $emailError = $phoneError = $contactPreferenceError = "";
$name = $email = $phone = $message = $url = $success = $date = $hospitalName = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $fullNameError = "Your Name is required";
  } else {
    $fullName = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $fullNameError = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailError = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneError = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phoneError = "Invalid phone number";
    }
  }

  if (empty($_POST["contactPreference"])) {
    $contactPreferenceError = "Please pick which method of contact";
  } else {
    $contactPreference = test_input($_POST["contactPreference"]);
    if(!emailPreference || !phonePreference){
      $contactPreferenceError = "Please pick either Email or Phone";
    }
  }

  if (empty($_POST["date"])) {
    $date = "";
  } else {
    $date = test_input($_POST["date"]);
  }

  if (empty($_POST["hospitalName"])) {
    $hospitalName = "";
  } else {
    $hospitalName = test_input($_POST["hospitalName"]);
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if ($nameError == '' and $emailError == '' and $phoneError == '' and $contactPreferenceError == '' ){
      $messageBody = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $messageBody .=  "$key: $value\n";
      }

      $to = 'jgoncalves189@gmail.com';
      $subject = 'Contact Form Submit - Possible New Client!';
      if (mail($to, $subject, $messageBody)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $contactPreference = $date =  $hospitalName = $message = '';
      }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Doula, Doula Services NJ">
    <meta name="author" content="Jessica Liptak">
    <meta name="keywords" content="doula nj, doula in nj, birth doula nj, labor doula nj, doula support nj, labor support nj, childbirth education nj, placenta encapsulation nj, natural birth nj, natural childbirth nj">

    <title>Goddess Of The Womb</title>

    <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- jquery confirm css -->
    <link href="css/jquery-confirm.min.css" rel="stylesheet">

    <!-- fontawesome CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- custom css -->
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- nav -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand page-scroll" href="#page-top">Goddess Of The Womb</a>
        </div>
        <!-- collect the links and content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav pull-right">
            <!-- the hidden <li> is included to remove the "active" class from the link when scrolled -->
            <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
            <li><a class="page-scroll" href="#about">About Me</a></li>
            <li><a class="page-scroll" href="#services">My Services</a></li>
            <li><a class="page-scroll" href="#contact">Contact Me</a></li>
          </ul>
        </div><!-- end navbar-collapse -->
      </div><!-- end .container -->
    </nav><!-- end of Navigation -->

    <header>
      <div class="image-bg-fluid-height img-responsive">
      </div>
      <div class="quote">
        <p>“If a woman doesn’t look like a goddess during labor, then someone isn’t treating her right.” -Ina May</p>
      </div>
    </header>

    <!-- Content Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="section-heading">About Me <i class="fa fa-heart fa-1x" aria-hidden="true"></i></h1>
                    <p class="section-paragraph">Hello, my name is Jessica Liptak and I am a Birth Doula! I live in New Jersey with my beautiful family. I have two children, ages 8 and 4.</p>

                    <p class="section-paragraph">I was a young first time mother, but I had a tremendous amount of experience with children. Between babysitting since I was 13, raising 2 siblings, and working at a daycare center, I knew what I wanted for my delivery. However, at 8 months pregnant with my daughter, I was diagnosed with preeclampsia. I was induced and was in labor for 40 hours before delivering by c section. I was disappointed with my birth experience. My birth was completely opposite of the natural birth I wanted. Once I was pregnant with my son, I was unable to find a doctor that would perform a vbac for me. I had another c section, and although I had a much easier delivery and a healthy baby, I still felt I had missed out on the birth I had always dreamt of.</p>

                    <p class="section-paragraph">That is when I learned about what a Doula was.</p>

                    <blockquote cite="http://medical-dictionary.thefreedictionary.com/doulas">“A person who assists at labor and birth and in postpartum care of mother and baby. Doulas are trained and certified according to various requirements of local jurisdictions. They are helpful in educating the new family and in helping build their confidence as new parents.”</blockquote>

                    <p class="section-paragraph">I wondered, if I had been educated about the role of a Doula and  if I had the opportunity to have one, would my birth have gone differently? I decided then, that I wanted to pursue becoming a Doula. If I could help even just one mother, to have the birth experience that they desired, I would have achieved so much.</p>

                    <p class="section-paragraph">I completed my Doula training through a <strong><a href="http://www.dona.org">DONA International</a></strong> approved workshop in June 2017. I am currently working towards my certification!</p>

                    <p class="section-paragraph">I am currently working with clients who are delivering at home, and at the following hospitals:</p>
                    <ul class="fa-ul">
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>Overlook Hospital</li>
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>Saint Barnabas Hospital</li>
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>Trinitas Hospital</li>
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>Morristown Medical Center</li>
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>JFK Medical Center</li>
                      <li class="section-para"><i class="fa-li fa fa-heart-o"></i>CentraState Medical Center</li>
                    </ul>
                    <p class="section-paragraph">If you are planning on delivering at another hospital, let's talk <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <hr class="faded">

    <!-- content -->
    <section id="services">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <h1 class="section-heading">So what do I do?</h1>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 service-bg first-service-col">
            <ul class="fa-ul service-content">
              <li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>One prenatal visit in your home.</strong> - I will sit down with you and discuss your wants, priorities, and concerns.
							</li>
              <li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>On-call availability from 37 weeks to 42 weeks.</strong>
							</li>
              <li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Unlimited text, email, and phone support.</strong> - I welcome your questions, concerns, or pictures of "the cutest outfit ever"!
							</li>
							<li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Uninterrupted support during labor and birth.</strong> - I'd prefer you to call me when you believe labor is beginning. When we find it necessary, I will come to you either at your home or meet you at the hospital. You will have my undivided attention for the whole length of your labor.

							</li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 service-bg second-service-col">
            <ul class="fa-ul service-content">

              <li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Use of tools.</strong> - I will bring massage tools, music, a rebozo, birth and peanut balls, hot packs, a fan, and other items to make your stay more comfortable.

							</li>
              <li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Photography.</strong> - I will be there to capture beautiful memories of you, your partner, and your baby.

							</li>
							<li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Breastfeeding support.</strong> - If desired, I will help with getting baby to latch.

							</li>
							<li class="section-para"><i class="fa-li fa fa-heart-o"></i><strong>Two postpartum visits  at your home.</strong> - The first postpartum visit will be within the first week. I can help you get settled, answer any questions, and provide some resources if needed. The second visit will happen within four-six weeks after your birth. We can then discuss your experience and you may receive some keepsakes.

							</li>
            </ul>

        </div>
        <div class="col-lg-12">
            <p class="lead section-lead">The total fee for the above is $550.00.</p>
            <p>Payment plans are available.</p>
            <p>Additional postpartum support is available as well.</p>
          </div>
      </div>
    </section>

    <hr class="faded">

    <section id="contact">
         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="section-heading contact-heading">Lets get in touch</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-md-6 contact-form">
                 <p class="lead section-lead">Congratulations on your pregnancy!  Want more information?</p>


                  <form name="contact" id="contact-us" action="index.php" method="post">
                    <div class="form-group">
                      <label for="name">Name <span class="text-muted"> *</span></label>
                      <input placeholder="Your name" id="name" class="form-control" type="text" name="name" value="<?= $fullName ?>" required>
                      <span class="error"><?= $fullNameError ?></span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email <span class="text-muted"> *</span></label>
                      <input placeholder="Your Email Address" type="text" id="email" class="form-control" name="email" value="<?= $email ?>" required>
                      <span class="error"><?= $emailError ?></span>
                    </div>
                    <div class="form-group">
                      <label for="phone">Number <span class="text-muted"> *</span></label>
                      <input placeholder="Your Phone Number" id="phone" class="form-control" type="text" name="phone" value="<?= $phone ?>" required>
                      <span class="error"><?= $phoneError ?></span>
                    </div>
                    <div class="form-group">
                      <label for="contactPreference">Prefered method of contact <span class="text-muted"> *</span></label>
                      <select class="form-control" id="contactPreference" name="contactPreference" required>
                        <option value="">Select...</option>
                        <option value="<?= emailPreference ?>">Email</option>
                        <option value="<?= phonePreference ?>">Phone</option>
                      </select>
                      <span class="error"><?= $contactPreferenceError ?></span>
                    </div>
                    <div class="form-group">
                      <label for="date">Estimated due date</label>
                      <input type="date" id="date" name="date" value="<?= $date ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="birthLocation">Where will you be having your birth</label>
                      <select class="form-control" name="birthLocation" id="birthLocation">
                        <option value="">Select...</option>
                        <option value="home">At Home</option>
                        <option value="hospital">At the Hospital</option>
                        <option value="other">I'm not sure yet</option>
                      </select>
                    </div>
                    <div id="hospitalNameInput" class="form-group hide-me">
                      <label for="hospitalName">Which Hospital</label>
                      <input placeholder="Name of Hospital" id="hospitalName" class="form-control" type="text" name="hospitalName" value="<?= $hospitalName ?>">
                    </div>
                    <div class="form-group">
                      <label for="message">Questions, Comments, or Concerns</label>
                      <textarea placeholder="Type your Message Here...." name="message" class="form-control" value="<?= $message ?>" type="text"></textarea>
                    </div>
                    <div class="form-group text-center">
                      <button class="btn" name="submit" type="submit" id="contactSubmit" data-submit="...Sending">Submit  <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                    <div class="form-group"><?= $success; ?></div>

                    <hr class="faded">
                    <div class="form-group">
                      <p class="text-muted">If you haven't heard from me within 24 hours, please check your spam folder.</p>
                      <p class="text-muted">fields marked with * are required</p>
                    </div>
                  </form>
                </div>
            </div>
          </div>
            <!-- /.row -->
        <!-- /.container -->
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <p>Follow me on:</p>
                    <p><a href="https://www.facebook.com/goddessofthewomb/" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>  <a href="https://www.instagram.com/goddessofthewomb/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>  <a href="mailto:goddessofthewomb@gmail.com" target="_blank" rel="noopener noreferrer"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p>Copyright &copy; Goddess Of The Womb 2017</p>
                    <p>Website built by Jason M. Goncalves</p>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <!-- jquery-confirm -->
    <script src="js/jquery-confirm.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.min.js"></script>
     <!-- bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

  </body>
</html>
