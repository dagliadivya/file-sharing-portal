<?php
session_start();
$e1=$_POST['email2'];
$pass=$_POST['password2'];
$_SESSION['emailid']=$e1;
$con=mysqli_connect("localhost","root","","userdata");
if(mysqli_connect_errno())
{
echo "Failed to connect! ".mysqli_connect_error();
}
if($res=mysqli_query($con,"select * from signup where Email ='$e1' and Password='$pass'"))
{
$count= mysqli_num_rows($res);
}
if($count==0)
{
echo "<p style='margin-top:50px; margin-left:30px; font-size:20px;' >Userid or password is incorrect! Click <a href='homepage.html'>here</a> to  go to go back!</p>";
}
else
{
header("Location:profile.php ");
}
?>
<html>
<head>
<style>
a:link{color:#0A86EB;}
a:visited{color:#0A86EB;}
a:hover{color:#0A86EB;}
a:active{color:#0A86EB;}
<body style="background-color:#D0D1D2;">

</body>
</html>