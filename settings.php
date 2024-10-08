<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Calendar</title>
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
            background-color: #1E1E30; /* Set background color */
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        .content {
            flex: 1; /* Allow content to grow */
            position: relative; /* For absolute positioning */
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
    
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-[calc(50%+350px)] w-[226px] h-[60px] flex justify-center items-center text-[#FFD700] font-poppins text-[48px] font-medium capitalize">
        Settings
    </div>
    
    <div class="absolute flex gap-6 left-[83px] top-1/2 transform -translate-y-[calc(50%-100px)]">

        <div class="relative w-[1589px] h-[769px] rounded-[11px] bg-[#E5E9F0]">

            <div style="width: 100%; height: 100%; position: relative">
                <div style="width: 1589px; height: 769px; left: 0px; top: 0px; position: absolute">
                    <div style="width: 1589px; height: 769px; left: 0px; top: 0px; position: absolute; background: #E5E9F0; border-radius: 11px;"></div>

                    <!-- User Info Section -->
                    <div style="padding: 30px; position: absolute; top: 20px; left: 38px;">
                        <!-- Email Display -->
                        <div style="color: #1E1E30; font-size: 36px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;">
                            ken.turk@scv.si
                        </div>

                        <!-- Input Boxes -->
                        <div style="margin-top: 20px; display: flex; flex-direction: column;">
                            <input type="text" placeholder="Change your name" style="width: 396px; height: 44px; padding: 10px; margin-bottom: 10px; background: #CDD7EA; border-radius: 100px; border: none; color: #1E1E30; font-size: 15px; font-family: Poppins; font-weight: 400; text-transform: capitalize;" />
                            <input type="text" placeholder="Change your surname" style="width: 396px; height: 44px; padding: 10px; margin-bottom: 10px; background: #CDD7EA; border-radius: 100px; border: none; color: #1E1E30; font-size: 15px; font-family: Poppins; font-weight: 400; text-transform: capitalize;" />
                            <input type="email" placeholder="Change your email" style="width: 396px; height: 44px; padding: 10px; margin-bottom: 10px; background: #CDD7EA; border-radius: 100px; border: none; color: #1E1E30; font-size: 15px; font-family: Poppins; font-weight: 400; text-transform: capitalize;" />
                            <input type="password" placeholder="Change your password" style="width: 396px; height: 44px; padding: 10px; margin-bottom: 20px; background: #CDD7EA; border-radius: 100px; border: none; color: #1E1E30; font-size: 15px; font-family: Poppins; font-weight: 400; text-transform: capitalize;" />
                        </div>

                        <!-- Save Button -->
                        <button style="width: 189px; height: 54px; background: #1E1E30; border-radius: 100px; display: flex; justify-content: center; align-items: center; border: none; cursor: pointer;">
                            <div style="color: #E5E9F0; font-size: 32px; font-family: Poppins; font-weight: 400; text-transform: capitalize;">Save</div>
                        </button>
                    </div>

                    <!-- Profile Picture -->
                    <img style="width: 152px; height: 152px; left: 1355px; top: 39px; position: absolute;" src="pictures/usericon.png" />
                    <div style="width: 211px; height: 52px; left: 1325px; top: 205px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                        <div style="width: 211px; height: 52px; color: #1E1E30; font-size: 48px; font-family: Poppins; font-weight: 500; text-transform: capitalize; word-wrap: break-word">Ken Turk</div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Profile Editing Section -->
    <div class="w-[268px] h-[290px] absolute left-[9px] top-[129px] bg-[#e5e9f0] rounded-xl">
        <!-- Form Fields -->
        <div class="absolute left-[9px] top-[36px] w-[240px] h-[19px] p-2.5 bg-[#ccd7e9] rounded-[100px] flex items-center gap-2.5">
            <input type="email" placeholder="Change your email" class="text-[#1e1e30] text-[10px] font-normal font-['Poppins'] capitalize bg-transparent outline-none w-full" />
        </div>
        <div class="absolute left-[9px] top-[72px] w-[240px] h-[19px] p-2.5 bg-[#ccd7e9] rounded-[100px] flex items-center gap-2.5">
            <input type="text" placeholder="Change your name" class="text-[#1e1e30] text-[10px] font-normal font-['Poppins'] capitalize bg-transparent outline-none w-full" />
        </div>
        <div class="absolute left-[9px] top-[108px] w-[240px] h-[19px] p-2.5 bg-[#ccd7e9] rounded-[100px] flex items-center gap-2.5">
            <input type="text" placeholder="Change your surname" class="text-[#1e1e30] text-[10px] font-normal font-['Poppins'] capitalize bg-transparent outline-none w-full" />
        </div>
        <div class="absolute left-[9px] top-[144px] w-[240px] h-[19px] p-2.5 bg-[#ccd7e9] rounded-[100px] flex items-center gap-2.5">
            <input type="password" placeholder="Reset your password" class="text-[#1e1e30] text-[10px] font-normal font-['Poppins'] capitalize bg-transparent outline-none w-full" />
        </div>

        <!-- Email Display -->
        <div class="absolute left-[14px] top-[12px] text-[#1e1e30] text-[11px] font-medium font-['Poppins'] capitalize">
            Ken.turk@scv.si
        </div>
        
        <!-- Save Button -->
        <button class="absolute left-[184px] top-[254px] w-[73px] h-[23px] bg-[#1e1e30] rounded-[100px] flex items-center justify-center p-2.5 text-[#e5e9f0] text-[13px] font-normal font-['Poppins'] capitalize">
            Save
        </button>
    </div>

    <!-- User Icon and Name -->
    <div class="absolute left-[35px] top-[310px] flex flex-col items-center">
        <!-- Profile Image -->
        <img class="w-10 h-10" src="pictures/usericon.png" alt="Profile Image" />
        <!-- Profile Name Display -->
        <div class="text-[#1e1e30] text-[11px] font-medium font-['Poppins'] capitalize mt-2">
            Ken Turk
        </div>
    </div>

    <!-- Settings Heading -->
    <div class="absolute left-[99px] top-[72px] text-[#ffd700] text-xl font-medium font-['Poppins'] capitalize">
        Settings
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
</body>
</html>
