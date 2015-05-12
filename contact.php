<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Webspiration</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

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

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Webspiration</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Featured Websites<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

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
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
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
    <footer class="footer">
      <div class="container">
        <p class="text-muted">all rights reserved. 2015. have you seen a webspiring design? <a href="contact.php">contact us</a>!</p>
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
