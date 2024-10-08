<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Error 404</title>
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
    </style>
</head>

<body class="bg-[#1E1E30]">
    
<div class="hidden lg:flex relative w-full content">
<!-- Purple Box Structure -->
    <div style="width: 100%; height: 100%; display: inline-flex; position: absolute; left: 0; top: 0;">
        <div style="width: 1788px; height: 1058px; background: #7C6DAF;"></div>
    </div>
    
    <!-- Header Section -->
    <div class="absolute w-[1651px] left-[83px] top-[41px] flex justify-between items-center">
        <!-- Logo Section -->
        <a href="index.php">
            <div class="flex items-center gap-5">
                <img class="w-[60px] h-[60px] rounded-lg" src="pictures/logo.png" alt="Logo" />
                <div class="text-[#DFF6FF] text-[36px] font-medium">Time Management</div>
            </div>
        </a>
    
    <!-- Error 404 Message Moved to the Left -->
    <div class="absolute w-full flex justify-start" style="top: calc(584px - 365px); left: 795px;">
        <div class="text-[#FFD700] text-[48px] font-medium capitalize">Error 404</div>
    </div>
    
    <!-- Error Description and Home Button (Left-Aligned) -->
    <div class="absolute left-[734px] top-[321px] w-[619px] h-[345px] flex flex-col justify-start items-start">
        <div class="flex flex-col gap-5">
            <div class="text-[#FFD700] text-[24px] font-medium capitalize">
                Oh something went <br/> wrong
            </div>
            <div class="text-[#FFD700] opacity-[0.78] text-[20px] font-light capitalize break-words">
                This page you are looking for <br /> has <br /> been moved, <br /> deleted or possibly never existed
            </div>
        </div>
    
        <!-- Home Button -->
        <a href="index.php" class="mt-10">
            <div class="w-[231px] h-[60px] bg-[#E5E9F0] rounded-full flex justify-center items-center">
                <div class="text-[#1E1E30] text-[20px] font-normal capitalize">Home</div>
            </div>
        </a>
    </div>
</div>


<!-- Mobile Container -->
<div class="flex lg:hidden relative w-full h-screen">
    <div class="absolute w-[300px] h-full flex flex-col items-center" style="background: #7C6DAF;">
        <!-- Purple Box -->
    </div>

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

    <!-- Settings Heading -->
    <div class="absolute left-[99px] top-[72px] text-[#ffd700] text-xl font-medium font-['Poppins'] capitalize">
        Error 404
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
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
                <div class="menu-item" style="text-align: left; padding-left: 0;">Calendar</div>
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
            </div>
        </a>

        <a href="settings.php">
            <div class="menu-item-container" style="left: 16px; top: 180px; position: absolute; display: flex; flex-direction: column; align-items: flex-start;">
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
                <div class="menu-item" style="text-align: left; padding-left: 0;">Settings</div>
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
            </div>
        </a>

        <a href="about_us.php">
            <div class="menu-item-container" style="left: 16px; top: 270px; position: absolute; display: flex; flex-direction: column; align-items: flex-start;">
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
                <div class="menu-item" style="text-align: left; padding-left: 0;">About Us</div>
                <div class="menu-line" style="width: calc(100% - 32px); margin-right: auto;"></div>
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
                        If you are interested follow us on other <br /> platforms. <br />If you have any questions regarding <br />how <br /> to use the app, let us know via email.
                    </div>
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
