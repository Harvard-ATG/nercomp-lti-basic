<?php 
// Load up the LTI Support code
require_once 'ims-blti/blti.php';

// Set error reporting
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);

// Start the session and send basic HTTP headers
session_start();
header('Content-Type: text/html; charset=utf-8');  

// Initialize, all secrets are 'secret', do not set session, and do not redirect
$context = new BLTI("secret", false, false);

// That's it! As long as the appropriate POST values are submitted, we
// have a valid LTI request. We can now write our PHP code to handle the 
// web page.
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Building Tools With The Learning Tools Operability Specification</title>
  </head>
  
  <body>
  <?php
    if ($context->valid) {
  ?>
     <h2>Hello, World!</h2>
     <p>We have implemented a basic LTI tool!</p>
     <h3>A basic dump of POST parameters:</h3>
     <pre>  
  <?php
    foreach($_POST as $key => $value) {
        print "$key=$value\n";
    }
  ?>
      </pre>
  <?php
    } else {
  ?>
    <h2>This was not a valid LTI launch</h2>
    <p>Error message: <?= $context->message ?></p>
  <?php
    }
  ?>
  </body>
  
</html>