<?php

// Oracle DB user name
$username = 'beh_user';

// Oracle DB user password
$password = 'pwd_beh';

// Oracle DB connection string
$connection_string = '172.16.0.27/hospital';

// Connect to an Oracle database
$connection = oci_connect($username, $password, $connection_string);

// Check the connection
if (!$connection) {
    // If connection failed, display error message
    $e = oci_error();

    echo 'Oops :( connection failed. Error: ' . $e['message'];
} else {
    // If connection successful, display a success message
    echo 'Hooray !!! :) Oracle DB + PHP => OK';
}

// Close connection
oci_close($connection);

?>
