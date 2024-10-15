<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Time Management</title>
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
            position: relative; /
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

        /* Hamburger Icon */
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
    </style>
</head>

<body class="bg-[#1E1E30]">
    <!-- Container for Desktop Version -->
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
                    <div class="text-[#DFF6FF] text-[36px] font-medium">Time Management</div>
                </div>
            </a>

            <!-- Login Button -->
            <a href="login.php">
                <div style="position: relative; display: flex; align-items: center;">
                    <img src="pictures/account_circle.png" alt="Account Icon" style="width: 35px; height: 35px;" />
                    <div style="margin-left: 10px; color: #FFD700; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 400;">
                        Login
                    </div>
                </div>
            </a>
        </div>

        <div class="absolute w-[469px] h-[114px] left-[260px] top-[637px] flex items-center">
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: flex-start;">
                <div style="color: #FFD700; font-size: 20px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word; padding-left: 20px;">
                    Whether you're organizing your daily tasks <br />
                    or striving to meet long-term goals, <br /><br />
                    effective time management is the key. <br />
                    Let us help you take charge.
                </div>
            </div>
        </div>

        <a href="register.php">
            <div class="absolute w-[231px] h-[60px] left-[1121px] top-[725px] flex justify-center items-center bg-[#E5E9F0] rounded-full">
                <div class="text-[#1E1E30] text-[20px] font-normal">Get started</div>
            </div>
        </a>

        <div class="absolute w-[441px] h-[142px] left-[1121px] top-[552px] flex items-center justify-center">
            <div style="width: 100%; height: 100%; justify-content: center; align-items: center; display: inline-flex;">
                <div style="width: 441px; height: 142px; color: #FFD700; font-size: 48px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word;">
                    Fine-Tune Your <br />Schedule
                </div>
            </div>
        </div>

        <img class="absolute w-[770px] h-[421px] left-[100px] top-[202px]" src="pictures/picture.png" alt="Main Placeholder Image" />
        <a href="index.php">
            <div class="absolute w-[358px] h-[42px] left-[1121px] top-[483px] border border-[#FFD700] rounded-full flex items-center justify-between px-5">
                <img src="pictures/webhook.png" alt="Webhook Icon" style="width: 30px; height: 30px;" />
                <div class="text-[#FFD700] text-[20px] font-normal">Check out our own app </div>
                <img src="pictures/arrow.png" alt="Arrow Icon" style="width: 24px; height: 24px;" />
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

    <a href="index.php">
        <div class="absolute left-[12px] top-[18px] flex items-center">
            <img class="w-[45px] h-[44px] rounded-lg" src="pictures/logo.png" alt="Logo" />
            <div class="flex items-center" style="margin-left: 4px;">
                <div class="text-[#DFF6F0] text-[20px] font-medium">Time Management</div>
            </div>
        </div>
    </a>

    <div class="absolute w-[195px] h-[69px] left-[22px] top-[291px] flex items-center justify-center">
        <div class="text-[#FFD700] text-[20px] font-medium">Fine-Tune Your Schedule</div>
    </div>

    <div class="absolute w-[265px] left-[18px] top-[368px] flex items-center justify-start">
        <div class="text-[#FFD700] text-[12px] text-left">
            Whether you're organizing your daily tasks <br /> or striving to meet long-term goals, <br /><br />
            effective time management is the key. <br /> Let us help you take charge.
        </div>
    </div>

    <a href="register.php">
        <div class="absolute left-[18px] top-[482px] flex items-center">
            <div class="bg-[#E5E9F0] rounded-full px-10 py-2">
                <div class="text-[#1E1E30] text-[13px] font-normal">Get started</div>
            </div>
        </div>
    </a>

    <!-- Hamburger Menu Button -->
    <div class="hamburger" id="hamburger" style="width: 70px; position: relative; top: 9px; right: -305px;">
        <img src="pictures/hamburger.png" alt="Hamburger Icon" />
    </div>


    <img class="absolute w-[278px] h-[152px] left-[0px] top-[139px]" src="pictures/picture.png" alt="Placeholder Image" />
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
                <div style="opacity: 0.70; color: #A8B2D1; font-size: 13px; font-family: Poppins;"> 
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
</body>
</html>
