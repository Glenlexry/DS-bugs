<?php
include 'mail_config.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	/* special ajax here */
	$servername = "localhost";
    $username = "dsadmin_ong";
    $password = "#oyk2017#";
    $dbname = "dsadmin_dswebsite";
    
    $mailto = '<ahdesya@digitalsymphony.it>,<haq@digitalsymphony.it>,<kuhan@digitalsymphony.it>';
    $subject = "Contact Us";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if ($con->connect_error)
    {
    	die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    
    //Form Input
    $name = mysqli_real_escape_string($con, $_REQUEST['name']);
    $phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $message = mysqli_real_escape_string($con, $_REQUEST['message']);
    $timestamp = date("Y-m-d H:i:s");
    
    $content = '<html><body>';
    			$content .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    			$content .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
    			$content .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
    			$content .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $phone . "</td></tr>";
    			$content .= "<tr><td><strong>Message:</strong> </td><td>" . $message . "</td></tr>";
    			$content .= "</table>";
    			$content .= "</body></html>";
    
    $text = '';
    $tag = '';
    			
    $sql = "INSERT INTO contactus(id, name, phone, email, message, created_at, updated_at) VALUES(NULL, '".$name."', '".$phone."', '".$email."', '".$message."', '".$timestamp."', '".$timestamp."')";
    
    if (isset($name, $phone, $email, $message))
    {
    	if (!empty($name) && !empty($phone) && !empty($email) && !empty($message))
    	{
    		if (mysqli_query($con, $sql))
    		{
    			sendmailbymailgun($mailto,$subject,$content,$text,$tag);
    		}
    		else
    		{
    			echo "Error: " . $sql . "<br>" . $con->error;
    		}
    	}
    }
    $con->close();
}
else
{
    header("Location: https://www.digitalsymphony.it/404");
}

?>