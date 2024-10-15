<?php
require_once 'database.php'; 
include_once 'session.php'; 
ini_set('display_errors', '1'); 

if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['sub'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    $hours = $_POST['hours'];
    $minutes = $_POST['minutes'];
    $cat = $_POST['cat'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $user_id = $_SESSION['user_id'];
    
    if (empty($user_id)) {
        echo "User is not logged in. Cannot create activity.";
        exit;
    }

    // Prepare the SQL statement
    $stmt = $link->prepare("INSERT INTO activity (name, hours, minutes, priority, status, categories, description, user_id, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters correctly
    // Assuming user_id is an integer, change the type to 'i' for integer and others as 's' for string
    $stmt->bind_param('sssssssis', $title, $hours, $minutes, $priority, $status, $cat, $desc, $user_id, $date);

    if ($stmt->execute()) {
        header("Location: may.php");
        exit; 
    } else {
        echo "Failed to add activity: " . htmlspecialchars($stmt->error) . "<br>";
    }

    $stmt->close(); 
}
?>
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
        <div style="width: 1788px; height: 1150px; background: #7C6DAF;"></div>
    </div>

    <div class="absolute w-[1651px] left-[83px] top-[41px] flex justify-between items-center">
        <!-- Logo Section -->
        <a href="main.php">
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
    
    <div class="absolute flex gap-6 left-[83px] top-1/2 transform -translate-y-[calc(50%-50px)]">
    <!-- Left Box (1248px x 769px) -->
    <div class="relative w-[1248px] h-[800px] rounded-[11px] bg-[#E5E9F0]">
        <!-- Text "January" positioned in the left box -->
        <div class="absolute top-[27px] left-[38px] text-[#1E1E30] font-poppins text-[36px] font-normal capitalize">
            May
            
            <div class="absolute left-[top-[39px] w-[100px] h-[40px]">
                <div class="relative w-full h-full">
                    <select class="block appearance-none w-full h-full bg-[#D9D9D9] border border-[#1E1E30] rounded-[5px] text-[#1E1E30] font-poppins text-[14px] font-normal capitalize cursor-pointer focus:outline-none" name="year" id="yearSelect" onchange="changeYear()">
                        <option value="2024" <?php echo (isset($_GET['year']) && $_GET['year'] == 2024) ? 'selected' : ''; ?>>2024</option>
                        <option value="2025" <?php echo (isset($_GET['year']) && $_GET['year'] == 2025) ? 'selected' : ''; ?>>2025</option>
                        <option value="2026" <?php echo (isset($_GET['year']) && $_GET['year'] == 2026) ? 'selected' : ''; ?>>2026</option>
                        <option value="2027" <?php echo (isset($_GET['year']) && $_GET['year'] == 2027) ? 'selected' : ''; ?>>2027</option>
                        <option value="2028" <?php echo (isset($_GET['year']) && $_GET['year'] == 2028) ? 'selected' : ''; ?>>2028</option>
                    </select>
                    <!-- Dropdown Arrow Icon -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-[#1E1E30]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        
<?php
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$stmt = $link->prepare("SELECT id, name, hours, minutes, priority, status, categories, description, date FROM activity WHERE MONTH(date) = 5 AND YEAR(date) = ? AND user_id = ?");
$stmt->bind_param('si', $year, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Handle the update and delete requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle Save Request
    if (isset($_POST['save'])) {
        $activity_id = $_POST['activity_id'];
        $new_name = $_POST['name'];
        $new_hours = $_POST['hours'];
        $new_minutes = $_POST['minutes'];
        $new_priority = $_POST['priority'];
        $new_status = $_POST['status'];
        $new_categories = $_POST['categories'];
        $new_description = $_POST['description'];
    
        // Update query (removed color)
        $update_stmt = $link->prepare("UPDATE activity SET name=?, hours=?, minutes=?, priority=?, status=?, categories=?, description=? WHERE id=? AND user_id=?");
        $update_stmt->bind_param('siissssii', $new_name, $new_hours, $new_minutes, $new_priority, $new_status, $new_categories, $new_description, $activity_id, $_SESSION['user_id']);
        $update_stmt->execute();
    }
    
    // Handle Delete Request
    if (isset($_POST['delete'])) {
        $activity_id = $_POST['activity_id'];
        
        // Delete query
        $delete_stmt = $link->prepare("DELETE FROM activity WHERE id=? AND user_id=?");
        $delete_stmt->bind_param('ii', $activity_id, $_SESSION['user_id']);
        $delete_stmt->execute();
    }
    // Re-fetch the activities to reflect changes
    $stmt->execute();
    $result = $stmt->get_result();
}

echo "<div class='activity-container w-full p-5 overflow-y-auto' style='margin-top: 130px; max-height: calc(85vh - 150px);'>"; // Adjusted max-height


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='activity bg-[#E5E9F0] border border-gray-300 rounded-lg p-6 mb-5 shadow-lg mx-5'>";
        echo "<form method='POST' class='activity-form'>"; // Start form for each activity
        
        echo "<input type='hidden' name='activity_id' value='" . htmlspecialchars($row['id']) . "'>";
        
        // Title input
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Title</label>";
        echo "<input type='text' name='name' value='" . htmlspecialchars($row['name']) . "' class='border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none' placeholder='Enter title' required>";
        echo "</div>";

        // Duration inputs
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Duration</label>";
        echo "<div class='flex items-center'>"; // Added flex container for inline layout
        echo "<input type='number' name='hours' value='" . htmlspecialchars($row['hours']) . "' min='0' class='border rounded-lg p-2 w-16 bg-[#CDD7EA] focus:outline-none' placeholder='Hours'> ";
        echo "<span class='mx-2' style='color: #1E1E30;'>Hours</span>"; // Hours label
        echo "<input type='number' name='minutes' value='" . htmlspecialchars($row['minutes']) . "' min='0' max='59' class='border rounded-lg p-2 w-16 bg-[#CDD7EA] focus:outline-none' placeholder='Minutes'>";
        echo "<span class='mx-2' style='color: #1E1E30;'>Minutes</span>"; // Minutes label
        echo "</div>";
        echo "</div>";

        // Category dropdown
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Category</label>";
        echo "<select name='categories' class='border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none'>";
        $categories = ['Work', 'Personal', 'Fitness', 'Education', 'Other']; // Example categories
        foreach ($categories as $category) {
            $selected = ($row['categories'] === $category) ? 'selected' : '';
            echo "<option value='$category' $selected>$category</option>";
        }
        echo "</select>";
        echo "</div>";

        // Status dropdown
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Status</label>";
        echo "<select name='status' class='border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none'>";
        echo "<option value='In Progress' " . ($row['status'] === 'In Progress' ? 'selected' : '') . ">In Progress</option>";
        echo "<option value='Completed' " . ($row['status'] === 'Completed' ? 'selected' : '') . ">Completed</option>";
        echo "<option value='Pending' " . ($row['status'] === 'Pending' ? 'selected' : '') . ">Pending</option>";
        echo "<option value='Cancelled' " . ($row['status'] === 'Cancelled' ? 'selected' : '') . ">Cancelled</option>";
        echo "</select>";
        echo "</div>";

        // Priority dropdown
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Priority</label>";
        echo "<select name='priority' class='border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none'>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<option value='$i' " . ($row['priority'] === $i ? 'selected' : '') . ">$i</option>";
        }
        echo "</select>";
        echo "</div>";

        // Description input
        echo "<div class='mb-4'>";
        echo "<label class='block' style='color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500;'>Description</label>";
        echo "<textarea name='description' class='border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none' placeholder='Enter description'>" . htmlspecialchars($row['description']) . "</textarea>";
        echo "</div>";

        // Save and Delete buttons aligned to the right
        echo "<div class='flex justify-end space-x-2'>"; // Added space-x-2 for horizontal spacing
        echo "<button type='button' onclick='confirmDelete(" . htmlspecialchars($row['id']) . ")' class='bg-red-600 text-white rounded-lg p-2' style='font-size: 20px; font-family: Poppins; font-weight: 400; white-space: nowrap;'>Delete</button>";
        echo "<button type='submit' name='save' class='bg-gray-800 text-white rounded-lg p-2' style='font-size: 20px; font-family: Poppins; font-weight: 400; white-space: nowrap;'>Save Changes</button>";
        echo "</div>"; // End of button container
        
        echo "</form>"; // End of form
        echo "</div>"; // End of activity div
    }
} else {
    // No activities found message
    echo "<div class='bg-[#F9F3D3] border border-[#E0C86A] text-[#6C4A28] rounded-lg p-4 mb-5 mx-5' style='font-size: 18px; font-family: Poppins;'>
        No activities added for this date.
      </div>";
}

echo "</div>"; 
?>

<script>
    function confirmDelete(activityId) {
        if (confirm("Are you sure you want to delete this activity?")) {
            // Create a form dynamically to submit the delete request
            const form = document.createElement("form");
            form.method = "POST";
            form.action = ""; // Current URL
            
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "activity_id";
            input.value = activityId;
            
            const deleteInput = document.createElement("input");
            deleteInput.type = "hidden";
            deleteInput.name = "delete";
            deleteInput.value = "1";
            
            form.appendChild(input);
            form.appendChild(deleteInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

        <script>
                function changeYear() {
                    const yearSelect = document.getElementById('yearSelect');
                    const selectedYear = yearSelect.value;
                
                    window.location.href = `may.php?year=${selectedYear}`;
            }
        </script>

        <!-- Left Arrow Button -->
        <a href="april.php">
            <div class="absolute left-[150px] top-[35px] w-[40px] h-[40px] flex items-center justify-center bg-[#E5E9F0] border border-[#1E1E30] rounded-[5px] cursor-pointer">
                <div class="w-0 h-0 border-t-[6px] border-t-transparent border-b-[6px] border-b-transparent border-r-[10px] border-r-[#1E1E30]"></div>
            </div>
        </a>
        
        <!-- Right Arrow Button -->
        <a href="june.php">
            <div class="absolute left-[200px] top-[35px] w-[40px] h-[40px] flex items-center justify-center bg-[#E5E9F0] border border-[#1E1E30] rounded-[5px] cursor-pointer">
                <div class="w-0 h-0 border-t-[6px] border-t-transparent border-b-[6px] border-b-transparent border-l-[10px] border-l-[#1E1E30]"></div>
            </div>
        </a>

    </div>
    <form method="POST" action="may.php">
    <div class="w-[320px] h-[800px] rounded-[11px] bg-[#E5E9F0]">
        <div class="flex flex-col items-center bg-[#E5E9F0] w-80 h-full p-6 rounded-lg shadow-lg overflow-auto"> <!-- Added -mt-1.5 for negative margin -->
            <h2 class="text-gray-800 text-2xl font-semibold mb-4" style="color: #1E1E30; font-size: 20px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Add Your Activities</h2>
            
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Title</label>
                <input id="titleInput" name="title" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" type="text" placeholder="Enter title" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;" required>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Date</label>
                <input id="dateInput" name="date" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none" type="date" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;" required>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Description</label>
                <textarea id="descriptionInput" name="desc" class="border rounded-lg py-1.5 px-2 w-full bg-[#CDD7EA] focus:outline-none" rows="3" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;" placeholder="Enter description" required></textarea>
            </div>

        
            <div class="mb-4 w-full flex justify-between items-center">
    <div class="w-[48%]">
        <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Duration (Hours)</label>
        <select name="hours" id="durationHours" class="border rounded-lg py-1.5 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
            <!-- Hours from 0 to 24 -->
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
        </select>
    </div>

    <div class="w-[48%]">
        <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Duration (Minutes)</label>
        <select name="minutes" id="durationMinutes" class="border rounded-lg py-1.5 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
            <!-- Minutes from 0 to 59 -->
            <option value="0">0</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="35">35</option>
            <option value="40">40</option>
            <option value="45">45</option>
            <option value="50">50</option>
            <option value="55">55</option>
        </select>
    </div>
</div>

        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Category</label>
                <select name="cat" id="categoryInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="Sports">Work</option>
                    <option value="Music">Personal</option>
                    <option value="Work">Fitness</option>
                    <option value="Leisure">Education</option>
                    <option value="Leisure">Other</option>
                </select>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Status</label>
                <select name="status" id="statusInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        
            <div class="mb-4 w-full">
                <label class="block cursor-pointer" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize;">Priority</label>
                <select name="priority" id="priorityInput" class="border rounded-lg p-2 w-full bg-[#CDD7EA] focus:outline-none appearance-none" style="color: #1E1E30; font-size: 16px; font-family: Poppins; font-weight: 500; text-transform: capitalize; background: #CDD7EA;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
                
            <input type="submit" name="sub" value="Add" class="bg-gray-800 text-white rounded-lg p-2 w-full" style="color: #E5E9F0; font-size: 20px; font-family: Poppins; font-weight: 400; text-transform: capitalize;">

        </div>
    </div>
</form>
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
