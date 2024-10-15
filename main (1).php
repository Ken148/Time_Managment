<?php
$currentMonth = date('m');

switch ($currentMonth) {
    case 1:
        $page = "january.php";
        break;
    case 2:
        $page = "february.php";
        break;
    case 3:
        $page = "march.php";
        break;
    case 4:
        $page = "april.php";
        break;
    case 5:
        $page = "may.php";
        break;
    case 6:
        $page = "june.php";
        break;
    case 7:
        $page = "july.php";
        break;
    case 8:
        $page = "august.php";
        break;
    case 9:
        $page = "september.php";
        break;
    case 10:
        $page = "october.php";
        break;
    case 11:
        $page = "november.php";
        break;
    case 12:
        $page = "december.php";
        break;
    default:
        $page = "error.php";
        break;
}

header("Location: $page");
exit;