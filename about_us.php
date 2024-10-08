<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>About us</title>
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

    <!-- Title Section -->
    <div style="display: flex; width: 1421px; height: 60px; justify-content: flex-start; align-items: center; flex-shrink: 0; position: absolute; top: 200px; left: calc(50% - 710.5px);">
        <h1 style="font-family: Poppins; font-size: 48px; font-weight: 500; line-height: normal; color: var(--Text-buttons, #FFD700); text-transform: capitalize; text-align: left;">
            About Us
        </h1>
    </div>

    <!-- Text Under Title -->
    <div style="display: flex; width: 1421px; height: 310px; justify-content: flex-start; align-items: center; flex-shrink: 0; position: absolute; top: 275px; left: calc(50% - 710.5px); margin-top: 35px;">
        <p style="font-family: Poppins; font-size: 20px; font-weight: 500; line-height: normal; color: #FFF; text-transform: capitalize; text-align: left;">
            Welcome to Time Management, where time management meets efficiency. We are a team of dedicated professionals passionate about helping individuals and businesses optimize their most valuable resource—time. Our mission is to empower you with the tools, strategies, and insights to achieve more in less time, without the stress.<br><br>
            
            At Time Management, we believe that effective time management is the foundation of success. Whether you're a busy professional, a growing business, or simply someone looking to improve productivity, we are here to guide you on your journey. With years of experience and a deep understanding of modern time challenges.<br><br>
            
            From time-saving techniques to advanced tools, we’re committed to helping you take control of your schedule, meet deadlines, and achieve your goals. Join us and discover the freedom that comes with mastering your time.<br><br>
            
            Take control. Achieve more. Live better.
        </p>
    </div>

    <!-- Button Under Text -->
    <a href="main.php">
        <div style="display: flex; width: 231px; height: 60px; padding: 10px; justify-content: center; align-items: center; gap: 10px; flex-shrink: 0; border-radius: 100px; background: var(--Form-input-backgrounds, #E5E9F0); position: absolute; top: 680px; left: calc(50% - 710.5px);">
            <button style="width: 100%; height: 100%; border: none; background: transparent; font-family: Poppins; font-size: 20px; font-weight: 400; line-height: normal; text-transform: capitalize; color: var(--Main-background, #1E1E30);">
                Home
            </button>
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

<!-- Welcome Message Section -->
<div class="absolute left-[33px] top-[130px] w-[222px] h-[325px] flex-shrink-0 text-white font-poppins text-[10px] font-medium capitalize leading-[1.2]">
    <span>Welcome to</span>
    <span class="text-[#e5e9f0]"> Time Management, </span>
    <span>
        where time management meets efficiency. We are a team of dedicated professionals passionate about helping individuals and businesses optimize their most valuable resource—time. Our mission is to empower you with the tools, strategies, and insights to achieve more in less time, without the stress.<br/><br/>
        At Time Management, we believe that effective time management is the foundation of success. Whether you're a busy professional, a growing business, or simply someone looking to improve productivity, we are here to guide you on your journey. With years of experience and a deep understanding of modern time challenges.<br/><br/>
        From time-saving techniques to advanced tools, we’re committed to helping you take control of your schedule, meet deadlines, and achieve your goals. Join us and discover the freedom that comes with mastering your time.<br/><br/>
        Take control. Achieve more. Live better.
    </span>
</div>

    <!-- Settings Heading -->
    <div class="absolute left-[99px] top-[72px] text-[#ffd700] text-xl font-medium font-['Poppins'] capitalize">
        About us
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
