<?php

session_start();

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
echo "Name:";
echo $name."<br>Email:".$email."<br>";



$con=mysqli_connect("localhost","root","","userdata");
if(mysqli_connect_errno())
{

echo "Failed to connect! ".mysqli_connect_error();


}
 if($res=mysqli_query($con,"select * from signup where Email ='$email'"))
{
$count= mysqli_num_rows($res);
}
if($count==0)
{
mysqli_query($con,"insert into signup (Name,Email,Password) values('$name','$email','$password')");

echo "Your profile has been created successfully!<br>";
echo "<a href='homepage.html'>Click here to login</a>";
}
else
{
echo "An account with that email id already exists!<br>";
echo "<a href='homepage.html'>Click here to login</a>";

}

 
?>
<html>
</head>
<style>
a:link{color:#0A86EB;}
a:visited{color:#0A86EB;}
a:hover{color:#0A86EB;}
a:active{color:#0A86EB;}
</style>
</html>
<body style="background-color:#D0D1D2; font-size:18px">
</body>
</html>