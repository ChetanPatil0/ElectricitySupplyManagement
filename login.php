<?php 
   include 'connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $c_no = $_POST['c_no']; //consumer no
       $password = $_POST['password'];
   
       $query = "SELECT * FROM `userregistration` WHERE `ConsumerNO`= $c_no AND `Password` = $password;";
       $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result)> 0) {
              session_start();
              $row = mysqli_fetch_assoc($result);

    
               $_SESSION['c_no'] = $row['ConsumerNO'];
               $_SESSION['MobileNo'] = $row['MobileNo']; 

            header("Location: index.php?status=" . $row['ConsumerNO']);
       } 
       else {
                echo "Consumer No and Password Not Match";
           
       }
       mysqli_close($conn);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>UserRegistration</title>
</head>
<body class="bg-gray-800">

    <header class="w-[100%] bg-gradient-to-r from-pink-500 to-orange-500 py-3">
        <nav class="w-[80%] m-auto flex justify-around items-center">
            <h1 class="text-3xl font-semibold">ESM</h1>
        <ul class="w-[40%] flex justify-around text-lg font-semibold">
            <li>Home</li>
            <li>New Connection</li>
            <li>PayBill</li>
            <li>ContactUs</li>
        </ul>
        <div class="text-2xl "><a href="register.php">Register</a></div>
    </nav>
    </header>
    <main class="w-[100%]">
        <section class="w-[50vh] m-auto  rounded mt-10 border-2 border-red-700">
            <h1 class="text-3xl mt-2 font-bold text-red-500 text-center">USER LOGIN</h1>
            <form action="" method="post" class="grid px-[7vh] py-5 text-gray-200">
                <label class="font-semibold text-md">Consumer No<span class="text-red-500">*</span></label>
                <input type="text" name="c_no" class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">
                
                <label class="font-semibold text-md mt-2">Password<span class="text-red-500">*</span></label>
                <input type="password" name="password"  class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">
                 <button type="login" class="mt-5 px-3 bg-green-600 text-lg font-semibold text-gray-200 text-md border-2 border-green-600 rounded hover:bg-gray-800 hover:text-green-600">LOGIN</button>      
                </form>
                <p class="text-center text-gray-300 pb-2 font-serif">If Not Register <a href="register.php" class="text-sky-500">Click For Registration</a></p>
        </section>
    </main>


</body>
</html>