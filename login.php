<?php 
    require_once 'database.php';
    include_once 'seja.php';
    ini_set('display_errors', '1');

    if (isset($_POST['sub'])) {
        $email = $_POST['mail']; 
        $password = sha1($_POST['geslo']); 

        $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'"; 
        $result = mysqli_query($link, $sql);

        if ($result) {
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['log'] = true;
                $_SESSION['user_id'] = $row['id'];
                
                header("Location: path.php");
                exit();
            } else {
                echo "Invalid login."; 
                header("Refresh: 1;URL=login.php");
            }
            
        } else {
            echo "Error executing query: " . mysqli_error($link); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <header>
	    <div id="header_1">
            <table>
			    <tr>
				    <td id="main_td2"><a href="../index.php"><img src="../slike/logo.png" alt="jackpot" id="logo"></a></td>
				    <td id="main_td">
				        <table id="table2">
				            <tr>
				                <td><a href="login.php" id="links">Play</a></td>
    				            <td><a href="login.php" id="links">Statistics</a></td>
    				            <td><a href="login.php" id="links">Winning numbers</a></td>
				                <td><a href="login.php" id="links">About</a></td>
				            </tr>
				        </table>
				    </td>
				    <td><b><u><a href="login.php" id="login">LOGIN</a></u></b></td>
			    </tr>  
		    </table>
	    </div>
    </header>
	<div id="div3">
	    <div id="login_del">
	        <h2>Login</h2>
            <form method="post" action="login.php"><br>
            <label id="label1">Email</label><br>
            <input type="email" name="mail" id="input1" required><br>
            <label id="label1">Password</label><br>
            <input type="password" name="geslo" id="input1" required><br><br>
            <input type="submit" name="sub" value="Submit">
            </form>
	    </div>
	</div>
    <footer>
		<div id="bottom_footer">
            <p>Contact Us: <a href="mailto:ken.turk@scv.si">ken.turk@scv.si</a>
            Phone: +386 070 737 282
            <a href="rules.php">Rules</a> | <a href="privacy.php">Privacy Policy</a> | <a href="terms_and_servis.php">Terms of Service</a>
            &copy; 2024 JackpotCentral. All rights reserved.</p>
		</div>
    </footer>
</body>
</html>
