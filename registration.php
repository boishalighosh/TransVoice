<?php
$insert=false;
if(isset($_POST['btn']))
{
	$server="localhost";
	$username="root";
	$password="";
	$database="transvoice"; 

	$con=mysqli_connect($server,$username,$password,$database);
	
	if (!$con)
	{
		die("failed".mysqli_connect_error());
	}
	
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$sql="INSERT INTO `user` (`Name`, `DOB`, `Gender`, `Phone_Number`, `Email_Id`, `Address`) VALUES ('$name', '$dob', '$gender', '$phone', '$email', '$address');";
	
	if($con->query($sql)==true)
	{
		$insert=true;
	}
	else
	{
		echo"ERROR <br> $con->error";
	}
	$con->close();
}
?>
<html>
	<head>
		<title>Login</title>
		<script src="https://kit.fontawesome.com/5dd0cc1318.js" crossorigin="anonymous"></script>
        <style>
			body{margin:0;padding:0;background:url(login.jpg) no-repeat center center fixed;background-size:cover;}
			.container {color:white;position:absolute;top:20%;left:36%;}
            td{color:white;}
            .msg{color:white;}
		</style>
	</head>
    <body>
        <div class="container">
        <form action="registration.php" method="post">
            <table>
                <tr>
					<td align="center" colspan="2" style="background-color:rgba(231, 231, 219, 0.5);color:black;"><h3 style="font-weight:bold;"><br>Register yourself in TransVoice</h3></td>
                </tr>
                <tr>
					<td><br><br></td>
				</tr>
                <tr>
                    <td>Name:</td>
                    <td><input style="background:lightgray;color:black;border-right:none;" type="text" name="name" id="name" placeholder="Enter your Full Name"></td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input style="background:lightgray;color:black;border-right:none;" type="text" name="dob" id="dob" placeholder="Enter your DOB"></td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" id="m" name="gender" value="Male" checked>
                        <label for="m">Male</label>
                        <input type="radio" id="f" name="gender" value="Female">
                        <label for="f">Female</label>
                        <input type="radio" id="o" name="gender" value="Others">
                        <label for="o">Others</label>
                    </td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input style="background:lightgray;color:black;border-right:none;" type="text" name="phone" id="phone" placeholder="Enter your Phone Number"></td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
                    <td>Email ID:</td>
                    <td><input style="background:lightgray;color:black;border-right:none;" type="text" name="email" id="email" placeholder="Enter your Email ID"></td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
                    <td>Address:</td>
                    <td><input style="background:lightgray;color:black;border-right:none;" type="textarea" name="address" id="address" placeholder="Enter your Address"></td>
                </tr>
                <tr>
					<td><br></td>
				</tr>
                <tr>
					<td align="center" colspan="2"><button class="btn" name="btn"><i class="fa fa-sign-in" style="margin-right:8px;"></i>Sign in</button></td>
				</tr>
            </table>
            <?php
                if($insert==true)
                {
                    echo "<p class='msg'>Successfully registered</p>";
                } 
            
            ?>
        </form>
        </div>
    </body>
</html>