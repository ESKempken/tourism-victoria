<?php

// //Localhost - TESTING
// define('HOST','localhost');
// define('USER','root');
// define('PASS','');
// define('DB','tourism_victoria');

// //Jacob 5 - DEPLOY
// define('HOST','talsprddb02.int.its.rmit.edu.au');
// define('USER','s3603698');
// define('PASS','Pa55word');
// define('DB','s3603698');

// // Merged server statement
// if $_SERVER['SERVER_NAME'] == 'localhost' {
//     define('HOST','localhost');
//     define('USER','root');
//     define('PASS','');
//     define('DB','tourism_victoria');
// } else {
//     define('HOST','talsprddb02.int.its.rmit.edu.au');
//     define('USER','s3603698');
//     define('PASS','Pa55word');
//     define('DB','s3603698');
// }

// Merge server statement short-hand
define('HOST', strstr($_SERVER['SERVER_NAME'], 'localhost') ? 'localhost' : 'talsprddb02.int.its.rmit.edu.au');
define('USER', strstr($_SERVER['SERVER_NAME'], 'localhost') ? 'root' : 's3603698');
define('PASS', strstr($_SERVER['SERVER_NAME'], 'localhost') ? '' : 'Pa55word');
define('DB', strstr($_SERVER['SERVER_NAME'], 'localhost') ? 'tourism_victoria' : 's3603698');

?>