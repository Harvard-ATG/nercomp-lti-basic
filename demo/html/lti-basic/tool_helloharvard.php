<?php
// Load up the LTI Support code
require_once 'ims-blti/blti.php';

// Set error reporting
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);

// Start the session and send basic HTTP headers.
session_start();
header('Content-Type: text/html; charset=utf-8');  

// Initialize, all secrets are 'secret', do not set session, and do not redirect.
$context = new BLTI("secret", false, false);

// Sort the POST array, just for kicks.
ksort($_POST);

// That's it! As long as the appropriate POST values are submitted, we
// have a valid LTI request. We can now write our PHP code to handle the 
// web page.
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/helloharvard.css" />
    <title>Hello, Harvard!</title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <header class="header-footer">
        <p id="header-image">
          <img src="images/harvard_shield.png" alt="Harvard University" />
        </p>
        <h2>
          A Very Basic LTI Tool
        </h2>
      </header>
       
      <div id="page-content">
<?php
    if ($context->valid) {
?>
        <h2>Hello, <?= $context->getUserName() ?>!</h2>
        <p id="image-wrapper">
          <img src="<?= $context->getUserImage() ?>" alt="<?= $context->getUserName() ?>" />
        </p>
        <p class="clearme">
        </p>
<?php
        if ($_POST['launch_presentation_return_url']) {
?>
         <p>
           The LMS is allowing you to make a call-back. Feel free to send the LMS a message that it will display back to the user.
         </p>
         <form method="GET" action="<?= $_POST['launch_presentation_return_url'] ?>" enctype="application/x-www-form-urlencoded">
           <input type="text" name="lti_msg" value="" width="50" />
           <input type="submit" name="sbmt" value="Send Message" />
         </form>
         <p>
           Or you can send the LMS a message that an error occurred.
         </p>
         <form method="GET" action="<?= $_POST['launch_presentation_return_url'] ?>" enctype="application/x-www-form-urlencoded">
           <input type="text" name="lti_errormsg" value="" width="50" />
           <input type="submit" name="sbmt" value="Send Error" />
         </form>

<?php
        } 
?>
         <p id="table-wrapper">
         
         <h3>Here is a list of all the POST/LTI parameters sent by the LMS:</h3>
         <table>
           <thead>
             <th scope="col">Name</th>
             <th scope="col">Value</th>
           </thead>
           <tbody>
<?php
        foreach($_POST as $key => $value) {
?>
             <tr>
               <td><?= $key ?></td>
               <td><?= $value ?></td>
             </tr>
<?php
        }
?>
            </tbody>
         </table>
<?php
    } else {
?>
    <h2>This was not a valid LTI launch</h2>
    <p>Error message: <?= $context->message ?></p>
<?php
    }
?>
      </div>
      
      <footer class="header-footer">
        A footer goes here.
      </footer>
    </div>
  </body>
  
</html>