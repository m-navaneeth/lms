<?php
session_start();

$con = mysqli_connect("localhost","root","","nanda");
$usernamenotify="";
$passwordnotify="";
$_SESSION['usernamenotify']="";
$_SESSION['passwordnotify']="";
$passverify;
$fun=100;
if(isset($_POST["signin"]))
{
$name = $_POST["username"];
$pass = $_POST["password"];
$userquery="SELECT * FROM login where username= '$name';";
$userqueryresult= mysqli_query($con,$userquery);
$userqueryresultcheck = mysqli_num_rows($userqueryresult);
$uname="";
$id="";
$section="";
$attendence="";
$cgpa="";
$adaa;
$acn;
$aoops;
$acoa;
$adbms;
$aels;
$aemsa;



if($userqueryresultcheck>0 and $pass!=""){
$passquery="SELECT * FROM login where username= '$name' and  password= '$pass';";
$passqueryresult= mysqli_query($con,$passquery);
$passqueryresultcheck = mysqli_num_rows($passqueryresult);
if($passqueryresultcheck==1)
{
while ($set=mysqli_fetch_assoc($passqueryresult)) {
	
	$uname=$set['name'];
$id=$set['id'];
$section=$set['section'];
$attendence=$set['attendence'];
$cgpa=$set['cgpa'];
$passverify=$set['password'];
$adaa=$set['adaa'];
$acn=$set['acn'];
$aoops=$set['aoops'];
$acoa=$set['acoa'];
$adbms=$set['adbms'];
$aels=$set['aels'];
$aemsa=$set['aemsa'];

}

	$_SESSION['name']=$uname;
	$_SESSION['id']=$id;
	$_SESSION['section']=$section;
	$_SESSION['attendence']=$attendence;
	$_SESSION['cgpa']=$cgpa;
	$_SESSION['adaa']=$adaa;
	$_SESSION['acn']=$acn;
	$_SESSION['aoops']=$aoops;
	$_SESSION['acoa']=$acoa;
	$_SESSION['adbms']=$adbms;
	$_SESSION['aels']=$aels;
	$_SESSION['aemsa']=$aemsa;

$_SESSION['fun']=$fun;
	$part=strcmp($pass, $passverify);

echo "$part";


	if($part==0)
	{
	header('location:index.php');
}
else
{
	$passwordnotify="incorrect password";
	$_SESSION['passwordnotify']=$passwordnotify;

		header('location:lms.php');
}

}
else{
	$passwordnotify="incorrect password";
	$_SESSION['passwordnotify']=$passwordnotify;

		header('location:lms.php');
}

}

else{
	if($userqueryresultcheck==0)
	{
		$usernamenotify="user name doesnot exist";
		$_SESSION['usernamenotify']=$usernamenotify;
		header('location:lms.php');
	}
else{
	$passwordnotify="fill the password section";
	$_SESSION['passwordnotify']=$passwordnotify;
	header('location:lms.php');
}

}
}
?> 