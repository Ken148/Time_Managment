<?php
require_once 'database.php'; 
include_once 'session.php';  
require_once 'vendor/autoload.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['sub'])) {
    $email = $_POST['mail']; 
    $password = $_POST['pass']; 

    $stmt = $link->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['log'] = true;
                $_SESSION['user_id'] = $row['id'];
                header("Location: main.php");
                exit();
            } else {
                header("Location: login-error.php");
                exit();
            }
        } else {
            header("Location: login-error.php");
            exit();
        }
    } else {
        echo "Error executing query: " . $link->error;
    }
}

$client = new Google_Client();
$client->setClientId(''); 
$client->setClientSecret('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'); 
$client->setRedirectUri('https://time.ken-turk.eu/callback.php'); 
$client->addScope("email");
$client->addScope("profile");

$authUrl = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #1E1E30;
            overflow-x: hidden;
        }

        .content {
            flex: 1;
            position: relative; 
        }

        .overlay {
            position: fixed;
            top: 0;
            right: 0;
            width: 75%;
            height: 100%;
            background-color: rgba(30, 30, 48, 0.9);
            z-index: 1000;
            display: none;
            transition: transform 0.3s ease-in-out;
            transform: translateX(100%);
        }

        .overlay.active {
            display: block;
            transform: translateX(0);
        }

        .overlay-content {
            padding: 20px;
        }

        .overlay .close-btn {
            position: absolute;
            top: 18px;
            left: 14px;
            cursor: pointer;
        }

        .hamburger {
            position: absolute;
            right: 18px;
            top: 35px;
            cursor: pointer;
        }

        .hamburger img {
            width: 73px;
            height: 73px;
            border-radius: 8px;
            border: 1px solid #E5E9F0;
        }

        .menu-item {
            color: #FFD700;
            font-size: 18px;
            margin: 10px 0;
            text-decoration: none;
        }

        .menu-item-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
        }

        .menu-line {
            width: 100%;
            height: 2px; 
            background-color: #A8B2D1; 
            margin: 0; 
            display: block; 
        }

        .image-container {
            position: absolute;
            right: 18px;
            top: 150px; 
            display: none; 
            flex-direction: column;
            gap: 50px; 
            z-index: 999;
        }

        .image-container img {
            width: 60px; 
            height: 60px; 
            opacity: 0; 
            transform: translateY(-10px); 
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .image-container.show img {
            opacity: 1; 
            transform: translateY(0); 
        }
        input {
            color: #000000; 
        }
        
        input:focus {
            color: #000000;
        }
    </style>
</head>

<body class="bg-[#1E1E30]">
    
<!-- Container Desktop Version -->
<div class="hidden lg:flex relative w-full content">
    <!-- Purple Box Structure -->
    <div style="width: 100%; height: 100%; display: inline-flex; position: absolute; left: 0; top: 0;">
        <div style="width: 1788px; height: 1058px; background: #7C6DAF;"></div>
    </div>

    <div class="absolute w-[1651px] left-[83px] top-[41px] flex justify-between items-center">
        <!-- Logo Section -->
        <a href="index.php">
            <div class="flex items-center gap-5">
                <img class="w-[60px] h-[60px] rounded-lg" src="pictures/logo.png" alt="Logo" />
                <div style="color: rgba(223, 246, 255, 0.99); font-size: 36px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word;">
                    Time Management
                </div>
            </div>
        </a>
    </div>

    <!-- Centered Login Section -->
    <div class="absolute top-[155px] left-1/2 transform -translate-x-1/2 flex flex-col items-center">
        <!-- Sign In Title -->
        <div style="color: #FFD700; font-size: 48px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word; margin-bottom: 32px;">
            Login
        </div>

        <!-- Error Message -->
        <div style="width: 100%; color: #FF0000; font-size: 24px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word; margin-bottom: 20px; text-align: center;">
            Wrong username or password!!
        </div>

        <form method="POST" action="login.php">
            <div class="space-y-[14px]"> 
                <div class="relative w-[450px] mb-[14px]">
                    <label style="color: #FFD700; font-size: 24px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;" class="block">Email</label>
                    <input type="email" name="mail" class="w-full h-[50px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#1E1E30] px-4" required>
                </div>
                
                <div class="relative w-[450px] mb-[14px]">
                    <label style="color: #FFD700; font-size: 24px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;">Password</label>
                    <input type="password" name="pass" class="w-full h-[50px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#1E1E30] px-4" required>
                </div>
            </div>
            
            <a href="register.php">
                <div style="text-align: left; margin-bottom: 12px; margin-top: 5px;">
                    <div style="color: #1E1E30; font-size: 20px; font-family: Poppins; font-weight: 400; text-decoration: underline; text-transform: capitalize; word-wrap: break-word;">REGISTER</div>
                </div>
            </a>

            <!-- Google Login Button aligned to the right of the input boxes -->
            <div style="display: flex; justify-content: flex-end; width: 475px; margin-top: -50px;"> <!-- Added -20px margin-top -->
                <a href="<?php echo $authUrl; ?>" style="text-decoration: none;">
                    <img src="pictures/google.png" style="width: 250px; height: auto;">
                </a>
            </div>
            
            
            <div class="mt-8" style="text-align: center;">
                <input type="submit" name="sub" value="Login" style="width: 300px; height: 60px; background: #E5E9F0; color: #1E1E30; border-radius: 30px; font-size: 20px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;">
            </div>
        </form>
    </div>

    <!-- Welcome Section -->
    <div class="absolute top-[276px] left-[83px] flex flex-col gap-5">
        <!-- Welcome Text -->
        <div style="color: #FFD700; font-size: 24px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word;">
            Welcome to Time Management
        </div>
        <div style="color: #FFD700; font-size: 20px; font-family: Poppins; font-weight: 300; text-transform: capitalize; word-wrap: break-word;">
            Log in to easily organize your tasks,<br />
            track your goals, and stay productive.<br /><br />
            Take control of your day,<br />
            and let us help you<br /><br />
            make the most of your time.
        </div>
    </div>

    <!-- Check out our own app Section -->
    <a href="index.php">
        <div class="absolute left-[83px] top-[855px] w-[358px] h-[42px] border border-[#FFD700] rounded-full flex items-center justify-between px-5">
            <div class="relative w-[30px] h-[30px]">
                <img src="pictures/webhook.png" alt="Webhook Icon" class="absolute w-[30px] h-[30px] left-0" />
            </div>
            <div style="color: #FFD700; font-size: 20px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;">
                Check out our own app 
            </div>
            <div class="relative w-[24px] h-[24px]">
                <img src="pictures/arrow.png" alt="Arrow Icon" class="absolute w-[24px] h-[24px] right-0" />
            </div>
        </div>
    </a>

    <!-- Hamburger Menu Button -->
        <div class="hamburger" id="desktopHamburger">
            <img src="pictures/hamburger.png" alt="Desktop Hamburger Icon" />
        </div>
    
    <!-- Image Container for Desktop -->
        <div class="image-container" id="desktopImageContainer">
            
            <a href="main.php">
                <img src="pictures/Calander.png" alt="Image 2" style="transform: translateX(-8px);" />
            </a>
            
            <a href="settings.php">
                <img src="pictures/settings.png" alt="Image 4" style="transform: translateX(-8px);" />
            </a>
            
            <a href="about_us.php">
                <img src="pictures/aboutus.png" alt="Image 5" style="transform: translateX(-8px);" />
            </a>
        </div>
</div>


<!-- Mobile Container -->
<div class="flex lg:hidden relative w-full h-screen">
    <!-- Purple Box -->
    <div class="absolute w-[300px] h-full flex flex-col items-center" style="background: #7C6DAF;"></div>

    <!-- Logo and Title -->
    <a href="index.php">
        <div class="absolute left-[12px] top-[18px] flex items-center">
            <img class="w-[45px] h-[44px] rounded-lg" src="pictures/logo.png" alt="Logo" />
            <div class="flex items-center gap-5">
                <div class="text-[#DFF6FF] text-[20px] font-medium font-poppins capitalize word-wrap-break-word" style="margin-left: 5px;">
                    Time Management
                </div>
            </div>
        </div>
    </a>

    <!-- Login Header (moved up by 10px) -->
    <div class="absolute left-[36px] top-[120px] text-2xl text-[#FFD700] font-medium" style="left: calc(50% - 90px);">Login</div>

    <!-- Error Message (aligned to left of email and moved up by 10px) -->
    <div style="width: 100%; color: #FF0000; font-size: 14px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word; margin-bottom: 20px; text-align: left; position: absolute; top: 160px; left: 36px;">
        Wrong username or password!!
    </div>

    <!-- Form Inputs (moved down by 20px) -->
    <div class="absolute left-[36px] top-[201px] space-y-[23px]">
        <!-- Email Box -->
        <div class="relative">
            <label for="mobile_email" class="absolute text-[#FFD700] text-xs -top-3 left-0">Email</label>
            <input id="mobile_email" type="email" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>

        <!-- Password Box -->
        <div class="relative">
            <label for="mobile_password" class="absolute text-[#FFD700] text-xs -top-3 left-0">Password</label>
            <input id="mobile_password" type="password" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>
        
        <!-- REGISTER Link styled and aligned -->
        <a href="register.php">
            <div class="w-[450px] flex justify-start mt-[10px]"> <!-- Margin for spacing -->
                <div style="display: flex; width: 82px; height: 31px; padding: 0px 29px 13px 0px; align-items: center; flex-shrink: 0;">
                    <div style="color: #1E1E30; font-size: 15px; font-family: Poppins; font-weight: 400; text-decoration: underline; text-transform: capitalize; word-wrap: break-word;">
                        REGISTER
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Centered Sign In Button (moved down by 20px) -->
    <a href="404.php">
        <div class="absolute left-[83px] top-[315px] w-[113px] h-[29px] bg-[#E5E9F0] rounded-full flex items-center justify-center mt-[28px]">
            <button class="text-xs text-[#1E1E30]">Sign In</button>
        </div>
    </a>

    <!-- Join Time Management Text -->
    <div class="absolute top-[490px] left-[36px] space-y-5"> 
        <div class="text-[#FFD700] font-poppins font-medium text-[14px] text-transform: capitalize">
            Join Time Management Today
        </div>
        <div class="text-[#FFD700] font-poppins font-light text-[11px] text-transform: capitalize opacity-70 space-y-2">
            <p>Create your account to start organizing <br /> your schedule, tracking goals, <br /> and boosting your productivity.</p>
            <p>Let us help you take charge of <br /> your time and achieve more every day!</p>
        </div>
    </div>

    <!-- Hamburger Menu Button -->
        <div class="hamburger" id="hamburger" style="width: 70px; position: relative; top: 9px; right: -305px;">
            <img src="pictures/hamburger.png" alt="Hamburger Icon" />
        </div>

<!-- Overlay Menu -->
<div class="overlay" id="overlay">
    <!-- Close Button -->
    <div class="close-btn" id="closeBtn">.</div>

    <!-- Menu Items -->
    
    <a href="main.php">
        <div class="menu-item-container" style="left: 16px; top: 90px; position: absolute; display: flex; flex-direction: column; align-items: flex-start;">
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Top line -->
            <div class="menu-item" style="text-align: left; padding-left: 0;">Calendar</div>
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Bottom line -->
        </div>
    </a>

    <a href="settings.php">
        <div class="menu-item-container" style="left: 16px; top: 180px; position: absolute; display: flex; flex-direction: column; align-items: flex-start;">
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Top line -->
            <div class="menu-item" style="text-align: left; padding-left: 0;">Settings</div>
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Bottom line -->
        </div>
    </a>
    
    <a href="about_us.php">
        <div class="menu-item-container" style="left: 16px; top: 270px; position: absolute; display: flex; flex-direction: column; align-items: flex-start;">
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Top line -->
            <div class="menu-item" style="text-align: left; padding-left: 0;">About Us</div>
            <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div> <!-- Bottom line -->
        </div>
    </a>

    <!-- Contact Info -->
    <div style="left: 16px; top: 570px; position: absolute; flex-direction: column; display: inline-flex;">
        <div style="width: 550px; flex-direction: column; display: flex;">
            <div style="flex-direction: column; display: flex;">
                <a href="mailto:ken.turk@scv.si" class="menu-item" style="color: #FFD700;">
                    ken.turk@scv.si
                </a>
                <div style="opacity: 0.70; color: #A8B2D1; font-size: 13px; font-family: Poppins;"> <!-- Increased font size by 3px -->
                    If you are interested follow us on other <br/> platforms. <br />If you have any questions regarding <br/>how <br/> to use the app, let us know via email.
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        const desktopHamburger = document.getElementById('desktopHamburger');
        const desktopImageContainer = document.getElementById('desktopImageContainer');

        desktopHamburger.addEventListener('click', () => {
            if (desktopImageContainer.style.display === "none" || desktopImageContainer.style.display === "") {
                desktopImageContainer.style.display = "flex";
                setTimeout(() => desktopImageContainer.classList.add('show'), 10); 
            } else {
                desktopImageContainer.classList.remove('show');
                setTimeout(() => desktopImageContainer.style.display = "none", 300);
            }
        });

        const hamburger = document.getElementById('hamburger');
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('closeBtn'); 

        hamburger.addEventListener('click', () => {
            overlay.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) { 
                overlay.classList.remove('active');
            }
        });
    </script>
</div>
</body>
</html>
