let cNo = document.getElementById('c_no');
let mobNo = document.getElementById('mobile_no');
let password = document.getElementById('password');
let conPassword = document.getElementById('confirm_password');
let errorMsg = document.getElementById('errorMsg');
let errorBlock = document.getElementById('errorblock');
let flag=0;

let RegistrationValidation=()=>
{
    if(cNo.value.length==0 ){
        errorMsg.innerHTML=`Consumer No Required `+ '<i class="fa-solid fa-xmark float-right text-gray-900" id="error-remove" onclick="RemoveErrorBlock()"></i>';    
            DisplayErrorBlock();
            flag=0;
     } 
     else if(cNo.value.length!=10 ){
        errorMsg.innerHTML=`Consumer No Must Be 10 Digit `+ '<i class="fa-solid fa-xmark float-right text-gray-900" id="error-remove" onclick="RemoveErrorBlock()"></i>';    
            DisplayErrorBlock();
            flag=0
             }
     else if(mobNo.value.length!=10 ){
        errorMsg.innerHTML=`Enter 10 Digit Mobile No`+ '<i class="fa-solid fa-xmark float-right text-gray-900" id="error-remove" onclick="RemoveErrorBlock()"></i>';    
            DisplayErrorBlock();
            flag=0;
     }
     else if(password.value.length<8 ){
        errorMsg.innerHTML=`Password Should 8 Digit Long`+ '<i class="fa-solid fa-xmark float-right text-gray-900" id="error-remove" onclick="RemoveErrorBlock()"></i>';    
            DisplayErrorBlock();
            flag=0;
     }
     else if(password.value!=conPassword.value)
        {
            errorMsg.innerHTML=`Confirm Password Not Match`+ '<i class="fa-solid fa-xmark float-right text-gray-900 font-bold cursor-pointer" id="error-remove" onclick="RemoveErrorBlock()"></i>';    
            DisplayErrorBlock();
            flag=0;
        }
     else{
        errorMsg.innerHTML=`Registration Successfully Done`+ '<i class="fa-solid fa-xmark float-right text-gray-900 font-bold cursor-pointer" id="error-remove" onclick="RemoveErrorBlock()"></i>'; 
        DisplaySuccesBlock();
        flag=1;
     }

     if(flag==1)
        {
           return true;
        }
        else{
           return false;
        }
}

let DisplayErrorBlock = () =>{
    errorBlock.classList="bg-red-600 w-[40%] m-auto text-gray-200 text-lg text-center mt-5 p-3 rounded  absolute right-20";
    setTimeout(RemoveErrorBlock,5000);
}
let DisplaySuccesBlock = () =>{
    errorBlock.classList="bg-green-600 w-[40%] m-auto text-gray-200 text-lg text-center mt-5 p-3 rounded  absolute right-20";
}
let RemoveErrorBlock=() =>{
    errorBlock.className="hidden";
}

