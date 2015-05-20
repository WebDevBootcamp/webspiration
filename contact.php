<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Learn About Us</title>

    <!-- ======== CSS STYLESHEETS ======= -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/scrolling-nav.css">
    <link rel="stylesheet" href="css/carouselV2.css">
<!--    <link href="css/main.css" rel="stylesheet">-->


    <!-- ======== FONTS ======= -->
    <link rel="stylesheet" href="fonts/webfonts_Dagerotypos/Dagerotypos.css" charset="utf-8" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>


<?php
    // Using the ini_set()
//     ini_set("SMTP", "mail.cleemakethings.com");
// //    ini_set("sendmail_from", "shlomo@zend.com");
//     ini_set("smtp_port", "2525");

    // Turn off all error reporting
    error_reporting(0);

    if($_POST['submit']){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $human = intval($_POST['human']);

        $from = 'Webspiration Inquiry Form';
        $to = 'catherinel2108@yahoo.com';
        $subject = 'Message from Webspiration';
        $body = "From: $name\n Email: $email\n Comment:\n $comment";


        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }

        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }

        if ($human !== 6) {
            $errHuman = 'Are you a robot?';
        }

        if (!$_POST['comment']) {
            $errComment = 'Please enter a comment.';
        }


        if (!$errName && !$errEmail && !$errHuman && !$errComment) {
            if (isset($_POST['carbonCopy']) && $_POST['carbonCopy'] == 'Yes') {
                $to = 'catherinel@yahoo.com' . ', ';
                $to .= $email;
                if (mail ($to, $email, $subject, $body, $from)) {
                    $result = '<div class="alert alert-success">Success! And CCd!</div>';
                } else {
                    $result = '<div class="alert alert-danger>Not Successful or CCd!</div>';
                }
            } else if (mail ($to, $subject, $body)) {
                $result = '<div class="alert alert-success">Alrighty, I will get right back to you!</div>';
            } else {
                $result = '<div class="alert alert-danger>Oh my, something went wrong. Try later or ping me on social media.</div>';
            }
        }
    }

?>

<!-- ======== FIXED NAVBAR ======= -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- NAVBAR BRAND LOGO -->
            <a class="navbar-brand" href="carouselV2.html"><span style="color: #FF5A14">&lt;</span><span class="brand-font"> Webspiration </span><span style="color: #FF5A14">&gt;</span> </a>
        </div>

        <!-- NAVBAR MENU ITEMS -->
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
              <li><a href="carouselV2.html"><i class="fa fa-home"> Home</i></a></li>
              <li ><a href="carouselV2.html#articles"><i class="fa fa-newspaper-o"> Articles</i></a></li>
              <li><a href="about.html"><i class="fa fa-users"> About</i></a></li>
        </div>
</nav>

<!--Start Content-->
<div class="container">
<div class='row'>
    <div class='col-med-12' id='skills'>
        <h1>Contact us at Webspiration</h1>
    </div>
</div>

<form method="post" role="form" action="contact.php">

        <div class="form-group">
            <label for="name" class="control-label">Your Name</label>
            <input type="text" class="form-control" name="name" placeholder="Jane Doe" value="<?php ($_POST['name']); ?>"></input>
            <?php echo "<p class='text-danger'>$errName</p>";?>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Your Email</label>
            <input class="form-control" type="text" name="email" placeholder="jane.doe@email.com" value="<?php ($_POST['email']); ?>"></input>
            <?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
        <div class="form-group">
            <label for="comment" class="control-label">Submit Your Great Idea</label>
            <textarea class="form-control" type="text" rows="6" name="comment" placeholder="leave us a message about your favorite website"></textarea>
            <?php echo "<p class='text-danger'>$errComment</p>"; ?>
        </div>
        <div class="form-group">
            <label for="human" class="control-label">Answer me these questions one: 1 + 5 = ? </label>
            <input class="form-control" type="text" id="human" name="human" placeholder="i am not afraid">
            <?php echo "<p class='text-danger'>$errHuman</p>";?>
        </div>
        <div class="form-group">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-default">
        </div>
<!--        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" name="carbonCopy" value="Yes">Send Carbon Copy?</label>
        </div>-->
        <div class="form-group">
            <div class="col-med-12">
                <?php echo $result; ?>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<div id="spacer"></div>
   
    <!-- ======= FOOTER ======= -->
    
    <footer class="footer">
        <div class="container">
          <p class="text-muted"><span style="color: #FF5A14">&lt;</span> <span style="font-family: 'Dagerotypos'; font-size:30px; color:black"> Webspiration </span><span style="color: #FF5A14">&gt;</span> 2015, all rights reserved. have you seen a webspiring design? <a href="contact.php"><i class="fa fa-envelope-o"> contact us </i></a></p>
        </div>   
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
