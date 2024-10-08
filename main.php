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
            position: relative; /
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
            top: 150px; /
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
    
    <div class="absolute flex gap-6 left-[83px] top-1/2 transform -translate-y-[calc(50%-100px)]">
    <!-- Left Box (1248px x 769px) -->
    <div class="relative w-[1248px] h-[769px] rounded-[11px] bg-[#E5E9F0]">
        <!-- Text "January" positioned in the left box -->
        <div class="absolute top-[27px] left-[38px] text-[#1E1E30] font-poppins text-[36px] font-normal capitalize">
            January
        </div>

        <div class="absolute left-[calc(38px + 25px)] top-[39px] w-[100px] h-[40px]">
            <div class="relative w-full h-full">
                <select class="block appearance-none w-full h-full bg-[#D9D9D9] border border-[#1E1E30] rounded-[5px] text-[#1E1E30] font-poppins text-[14px] font-normal capitalize cursor-pointer focus:outline-none">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                </select>
                <!-- Custom Arrow -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="w-4 h-4 text-[#1E1E30]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
        <div class="w-[320px] h-[769px] rounded-[11px] bg-[#E5E9F0]">
            
        <div class="flex flex-col items-center bg-[#E5E9F0] w-80 h-auto p-6 rounded-lg shadow-lg">
            <h2 class="text-gray-800 text-2xl font-semibold mb-4" style="color: #1E1E30; font-size: 20px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Add Your Activities</h2>
            
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Title</label>
                <input id="titleInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" type="text" placeholder="Enter title" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Date</label>
                <input id="dateInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" type="date" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Description</label>
                <textarea id="descriptionInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" rows="4" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;" placeholder="Enter description"></textarea>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Duration</label>
                <input id="durationInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" type="text" placeholder="Enter duration" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Category</label>
                <select id="categoryInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="Sports">Sports</option>
                    <option value="Music">Music</option>
                    <option value="Work">Work</option>
                    <option value="Leisure">Leisure</option>
                </select>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Status</label>
                <select id="statusInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Priority</label>
                <select id="priorityInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Color</label>
                <div class="flex space-x-2 cursor-pointer">
                    <div class="h-8 w-8 bg-[#FF0000] rounded-full" title="Red" onclick="selectColor('#FF0000')"></div>
                    <div class="h-8 w-8 bg-[#F5A800] rounded-full" title="Yellow" onclick="selectColor('#F5A800')"></div>
                    <div class="h-8 w-8 bg-[#FFF700] rounded-full" title="Light Yellow" onclick="selectColor('#FFF700')"></div>
                    <div class="h-8 w-8 bg-[#55F300] rounded-full" title="Green" onclick="selectColor('#55F300')"></div>
                    <div class="h-8 w-8 bg-[#00FFF2] rounded-full" title="Cyan" onclick="selectColor('#00FFF2')"></div>
                    <div class="h-8 w-8 bg-[#1500D1] rounded-full" title="Blue" onclick="selectColor('#1500D1')"></div>
                    <div class="h-8 w-8 bg-[#FF00BF] rounded-full" title="Pink" onclick="selectColor('#FF00BF')"></div>
                </div>
            </div>
        
            <button class="bg-gray-800 text-white rounded-lg p-2 w-full" style="color: #E5E9F0; font-size: 20px; font-family: Poppins; font-weight: 400; text-transform: capitalize;">Add</button>
        </div>
        
        <script>
            function selectColor(color) {
                console.log('Selected Color:', color);
                alert('Selected Color: ' + color);
            }
        </script>
        
        <style>
            select {
                -webkit-appearance: none; 
                -moz-appearance: none; 
                appearance: none; 
                background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"%3E%3Cpolygon points="0,0 20,0 10,10" style="fill:#1E1E30;" /%3E%3C/svg%3E');
                background-repeat: no-repeat;
                background-position: right 10px center; 
                background-size: 12px; 
                cursor: pointer; 
            }
        </style>
    </div>
</div>
        
        
<div class="w-[1180px] h-[572px] relative">
    <!-- Column 1 - Monday -->
    <div class="w-[100px] h-[435px] p-2.5 left-[-1550px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1540px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-1400px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1390px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-1250px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1240px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-1100px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-1090px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-950px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-940px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-800px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-790px] top-[130px] absolute" style="margin-top: 17px;">
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
    <div class="w-[100px] h-[435px] p-2.5 left-[-650px] top-[183px] absolute bg-[#ccd7e9] rounded-[10px]"></div>
    <div class="w-[34px] h-6 justify-center items-center inline-flex left-[-640px] top-[130px] absolute" style="margin-top: 17px;">
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
            <img class="w-[45px] h-[44px] rounded-lg" src="pictures/logo.png" alt="Logo" />
            <div class="flex items-center gap-5">
                <div class="text-[#DFF6FF] text-[20px] font-medium font-poppins capitalize word-wrap-break-word" style="margin-left: 5px;">
                    Time Management
                </div>
            </div>
        </div>
    </a>

    <!-- Registration Header -->
    <div class="absolute left-[36px] top-[82px] text-2xl text-[#FFD700] font-medium" style="left: calc(50% - 90px);">Register</div> <!-- Adjusted to move more to the right -->

    <!-- Form Inputs -->
    <div class="absolute left-[36px] top-[133px] space-y-[23px]">
        <div class="relative"> <!-- Username Box -->
            <label for="mobile_name" class="absolute text-[#FFD700] text-xs -top-3 left-0">Username</label>
            <input id="mobile_name" type="text" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>
        <div class="relative"> <!-- Surname Box -->
            <label for="mobile_surname" class="absolute text-[#FFD700] text-xs -top-3 left-0">Surname</label>
            <input id="mobile_surname" type="text" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>
        <div class="relative"> <!-- Email Box -->
            <label for="mobile_email" class="absolute text-[#FFD700] text-xs -top-3 left-0">Email</label>
            <input id="mobile_email" type="email" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>
        <div class="relative"> <!-- Password Box -->
            <label for="mobile_password" class="absolute text-[#FFD700] text-xs -top-3 left-0">Password</label>
            <input id="mobile_password" type="password" class="w-[216px] h-[35px] bg-[#E5E9F0] border border-[#A8B2D1] rounded-[15px] text-[#FFD700] px-2.5" style="margin-top: 5px;">
        </div>
    </div>

    <!-- Join Time Management Text -->
    <div class="absolute top-[470px] left-[36px] space-y-5"> 
        <div class="text-[#FFD700] font-poppins font-medium text-[14px] text-transform: capitalize">
            Join Time Management Today
        </div>
        <div class="text-[#FFD700] font-poppins font-light text-[11px] text-transform: capitalize opacity-70 space-y-2">
            <p>Create your account to start organizing <br /> your schedule, tracking goals, <br /> and boosting your productivity.</p>
            <p>Let us help you take charge of <br /> your time and achieve more every day!</p>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="absolute left-[83px] top-[360px] w-[113px] h-[29px] bg-[#E5E9F0] rounded-full flex items-center justify-center mt-[28px]">
        <a href="login.html"><button class="text-xs text-[#1E1E30]">Sign In</button></a>
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
</body>
</html>
