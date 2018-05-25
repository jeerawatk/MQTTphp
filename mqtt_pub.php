<?php

require("./phpMQTT.php");
$server = "server";     // change if necessary
$port = 1883;                     // change if necessary
$username = "user";                   // set your username
$password = "pass";                   // set your password
$client_id = "phpMQTT-publisher"; // make sure this is unique for connecting to sever - you could use uniqid()
use Bluerhinos\phpMQTT;
$mqtt = new phpMQTT($server, $port, $client_id);

echo '<form action="./mqtt_pub.php" method="post">';

echo '<input type="submit" name="btnOff" value="off">';
echo '<input type="submit" name="btnOn" value="on">';

echo '</form>';

$statusmsg = "";
$rcv_message = "";

if ($_POST["btnOff"] == "off")
	{
    if ($mqtt->connect(true, NULL, $username, $password)) {
		//$mqtt->publish("switch1", "Hello World! at " . date("r"), 0);
		$mqtt->publish("switch/test", "0");
		$mqtt->close();
	} else {
	    echo "Time out!\n";
	}				    
	}

if ($_POST["btnOn"] == "on")
	{
	if ($mqtt->connect(true, NULL, $username, $password)) {
		//$mqtt->publish("switch1", "Hello World! at " . date("r"), 0);
		$mqtt->publish("switch/test", "1");
		$mqtt->close();
	} else {
	    echo "Time out!\n";
	}	
	}

?>
