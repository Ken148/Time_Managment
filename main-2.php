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
            background-color: #1E1E30; 
            overflow-x: hidden; 
        }

        .content {
            flex: 1;
            position: relative;
        }

        /* Overlay Styles */
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
        Hi, User
    </div>
    
    <!-- Two Boxes moved down by 40px -->
    <div class="absolute flex gap-6 left-[83px] top-1/2 transform -translate-y-[calc(50%-100px)]">
        <!-- Left Box (1248px x 769px) -->
        <div class="relative w-[1248px] h-[769px] rounded-[11px] bg-[#E5E9F0]">
            <!-- Text "January" positioned in the left box -->
            <div class="absolute top-[27px] left-[38px] text-[#1E1E30] font-poppins text-[36px] font-normal capitalize">
                January
            </div>

            <!-- Button "2024" positioned next to "January" -->
            <div style="position: absolute; left: calc(38px + 139px + 25px); top: calc(27px + 12px); width: 100%; height: 100%; display: relative;">
                <!-- Button Container -->
                <div style="width: 69.97px; height: 29px; position: absolute;">
                    <div style="width: 69.97px; height: 29px; background: #D9D9D9; border-radius: 5px;"></div>
                    <div style="width: 29.70px; height: 18.12px; left: 20.90px; top: 4px; position: absolute; display: flex; justify-content: center; align-items: center;">
                        <div style="color: #1E1E30; font-size: 14px; font-family: Poppins; font-weight: 400; text-transform: capitalize; word-wrap: break-word;">
                            2024
                        </div>
                    </div>
                </div>
                <!-- Vertical Line -->
                <div style="width: 29px; height: 69.97px; padding: 12px; left: 69.97px; top: 0px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border-radius: 5px; border: 1px #1E1E30 solid;"></div>
            </div>
        </div>
    
        <!-- Right Box (320px x 769px) -->
        <div class="w-[320px] h-[769px] rounded-[11px] bg-[#E5E9F0]"></div>
        
        
<div class="w-[1180px] h-[572px] relative">
    <!-- Column 1 - Monday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-1550px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1540px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Mon</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-1540px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1540px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1540px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1540px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-1513px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">1</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-1514px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">8</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-1515px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">15</div>
    </div>
    <div class="w-3 h-[15px] left-[-1516px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">22</div>
    </div>
    <div class="w-3 h-[15px] left-[-1517px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>

    <!-- Column 2 - Tuesday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-1400px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1390px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Tue</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-1390px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1390px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1390px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1390px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-1363px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">2</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-1364px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">9</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-1365px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">16</div>
    </div>
    <div class="w-3 h-[15px] left-[-1366px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">23</div>
    </div>
    <div class="w-3 h-[15px] left-[-1367px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>

    <!-- Column 3 - Wednesday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-1250px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1240px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Wed</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-1240px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1240px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1240px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1240px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-1213px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">3</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-1214px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">10</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-1215px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">17</div>
    </div>
    <div class="w-3 h-[15px] left-[-1216px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">24</div>
    </div>
    <div class="w-3 h-[15px] left-[-1217px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>

    <!-- Column 4 - Thursday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-1100px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1090px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Thu</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-1090px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1090px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1090px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-1090px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-1063px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">4</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-1064px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">11</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-1065px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">18</div>
    </div>
    <div class="w-3 h-[15px] left-[-1066px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">25</div>
    </div>
    <div class="w-3 h-[15px] left-[-1067px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>

    <!-- Column 5 - Friday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-950px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-940px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Fri</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-940px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-940px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-940px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-940px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-913px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">5</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-914px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">12</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-915px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">19</div>
    </div>
    <div class="w-3 h-[15px] left-[-916px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">26</div>
    </div>
    <div class="w-3 h-[15px] left-[-917px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>
    
    <!-- Column 6 - Saturday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-800px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-790px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Sat</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-790px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-790px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-790px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-790px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-763px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">6</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-764px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">13</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-765px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">20</div>
    </div>
    <div class="w-3 h-[15px] left-[-766px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">27</div>
    </div>
    <div class="w-3 h-[15px] left-[-767px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>


    <!-- Column 7 - Sunday -->
    <div class="w-[100px] h-[539px] p-2.5 left-[-650px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-640px] top-[0px] absolute" style="margin-top: 17px;">
        <div class="w-[34px] h-6 pr-px pb-px justify-center items-center inline-flex">
            <div class="text-[#1e1e30] text-[15px] font-normal font-['Poppins'] capitalize">Sun</div>
        </div>
    </div>
    <div class="w-20 h-[93px] p-2.5 left-[-640px] top-[190px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-640px] top-[298px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-640px] top-[406px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-20 h-[93px] p-2.5 left-[-640px] top-[514px] absolute bg-[#e5e9f0] rounded-[10px]"></div>
    <div class="w-[5px] h-3.5 left-[-613px] top-[201px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">7</div>
    </div>
    <div class="w-[7px] h-[15px] left-[-614px] top-[305px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">14</div>
    </div>
    <div class="w-2.5 h-[15px] left-[-615px] top-[413px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">21</div>
    </div>
    <div class="w-3 h-[15px] left-[-616px] top-[521px] absolute flex-col justify-center items-center inline-flex">
        <div class="text-[#1e1e30] text-[10px] font-normal">28</div>
    </div>
    <div class="w-3 h-[15px] left-[-617px] top-[629px] absolute flex-col justify-center items-center inline-flex"></div>
</div>


<!-- Mobile Container -->
<div class="flex lg:hidden relative w-full h-screen">
    <!-- Purple Box -->
    <div class="absolute w-[300px] h-full flex flex-col items-center" style="background: #7C6DAF;"></div>

    <!-- Logo and Title -->
    <a href="index.php">
        <div class="absolute left-[12px] top-[18px] flex items-center">
            <img class="w-[45px] h-[44px] rounded-lg" src="pictures/picture.png" alt="Logo" />
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
    </div>

    <!-- Centered Sign In Button (moved down by 20px) -->
    <a href="login.php">
        <div class="absolute left-[83px] top-[299px] w-[113px] h-[29px] bg-[#E5E9F0] rounded-full flex items-center justify-center mt-[28px]">
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

    <!-- Hamburger Button -->
    <div class="absolute right-5 top-5 flex items-center">
        <div style="width: 48px; height: 48px; position: relative; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: flex;">
            <img style="width: 48px; height: 48px; border-radius: 5px; border: 2px solid #E5E9F0;" src="pictures/hamburger.png" alt="Hamburger Icon" />
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
