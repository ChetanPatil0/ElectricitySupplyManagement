<?php
session_start();

if (isset($_SESSION['c_no']) && isset($_SESSION['MobileNo'])) {
    $ConsumerNO = $_SESSION['c_no'];
    $MobileNo = $_SESSION['MobileNo'];

    // echo " (Consumer No: " . $ConsumerNO. ")";
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>HOME PAGE</title>
</head>
<body>

    <header class="w-[100%] bg-gradient-to-r from-pink-500 to-orange-500 py-3">
        <nav class="w-[80%] m-auto flex justify-around items-center">
            <h1 class="text-3xl font-semibold">ESM</h1>
        <ul class="w-[40%] flex justify-around text-lg font-semibold">
            <li>Home</li>
            <li>New Connection</li>
            <li>PayBill</li>
            <li>ContactUs</li>
        </ul>
        <div class="flex items-center">
            <div class="text-sm text-center mr-5"> 
                <p class="font-semibold">Consumer No</p>
                <p><?php  echo $ConsumerNO; ?></p>
            </div>
             <a href="logout.php"><i class="fa-solid fa-right-from-bracket text-2xl "></i></a> 
        </div>
    </nav>
    </header>
    <h1>hello</h1>
</body>
</html>