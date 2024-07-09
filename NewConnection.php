<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_no = $_POST['c_no']; //consumer no
    $mobile_no = $_POST['mobile_no'];
    $usertype = 'LT';
    $password = $_POST['password'];

    $checkCno = "SELECT `ConsumerNO` FROM `userregistration` WHERE ConsumerNO= $c_no;";

    if (mysqli_num_rows(mysqli_query($conn, $checkCno))>0) {
        echo "<script>
          alert('Consumer NO already register');
        </script>";
        // echo "Consumer NO already register";
    } 
    else {
        $sql = "INSERT INTO userregistration VALUES ('', '$c_no', '$mobile_no', '$usertype', '', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                           alert('Data Successfully Inserted');
                 </script>";      // echo "Consumer No Not already register";
        } else {
            echo "Data Not Inserted: " . mysqli_error($conn);
        }
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
    <title>NewConnection</title>
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
            <div class="text-2xl "><i class="fa-solid fa-user"></i></div>
        </nav>
    </header>
    <div class="" id="errorblock">
        <h1 id="errorMsg"></h1>
    </div>
    <main class="w-[100%]">
        <section class="max-w-[70vh] m-auto  rounded mt-10 border-2 border-red-700 ">
            <h1 class="text-3xl mt-2 font-bold text-red-500 text-center">NEW CONNECTION</h1>
            <form onsubmit="return RegistrationValidation()" action="" method="post" class=" px-[2vh]  py-5 text-gray-200 grid">
            <h1 class="text-center bg-gray-600 py-1 text-lg">Personal Details</h1> 
             <div class="flex justify-between flex-wrap">         
                 <div>
                        <label class="font-semibold text-md">Applicant Name<span class="text-red-500">*</span></label><br>
                        <input type="text" id="aname" name="aname"
                            class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 ">
                </div>
                <div>
                        <label class="font-semibold text-md">Mobile No<span class="text-red-500">*</span></label><br>
                        <input type="text" id="mobile_no" name="mobile_no"
                            class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 ">
                </div>
            </div>


                <div class="flex justify-around">
                    <button type="reset"
                        class="mt-5 px-5 bg-red-500 text-lg font-semibold text-gray-200 text-md border-2 border-red-500 rounded hover:bg-gray-800 hover:text-red-500">Clear</button>
                    <button type="submit"
                        class="mt-5 px-3 bg-green-600 text-lg font-semibold text-gray-200 text-md border-2 border-green-600 rounded hover:bg-gray-800 hover:text-green-600">Submit</button>
                </div>
            </form>
            <p class="text-center text-gray-300 pb-2 font-serif">Already Register ? <a href="login.html"
                    class="text-sky-500">Click For Login</a></p>
        </section>
    </main>

    <script src="validation.js"></script>
</body>

</html>