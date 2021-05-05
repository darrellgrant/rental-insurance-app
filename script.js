let navi = document.querySelectorAll("li");
//navi[0].style.display = "none";
//alert(navi[0].style.display)
/* document.querySelector('body').style.backgroundColor = "black";
document.querySelector('.main-wrapper').style.backgroundColor = "black"; */
// document.querySelector('.navbar').style.backgroundColor = "black";
document.querySelector(".navbar").style.position = "fixed";

//************************************/
//********VALIDATION******************/

//1) Registration Form Validation//

let errorMessage = "";
let letters = /^[a-zA-Z\s]+$/;
let emailCheck = /^([a-zA-Z0-9\.-_]+)@([a-zA-Z0-9-]+)(\.[a-z]{2,20})$/;
let passwordCheck = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
let usernameCheck = /^[a-zA-Z0-9]+$/;

let valid = true;

let msg1 = document.querySelector("#errMsg1");
let msg2 = document.querySelector("#errMsg2");
let msg3 = document.querySelector("#errMsg3");
let msg4 = document.querySelector("#errMsg4");
let msg5 = document.querySelector("#errMsg5");

let inputs = document.querySelectorAll(".all-inputs");
let inputGroup = document.querySelectorAll(".all-inputs");
let i;
let btn = document.querySelector("#btn");

function validateRegister() {
  let fname = document.querySelector("#first-name").value.trim();
  let lname = document.querySelector("#last-name").value.trim();
  let email = document.querySelector("#email").value.trim();
  let username = document.querySelector("#username").value.trim();
  let pwd = document.querySelector("#password").value.trim();

  if (fname != "" && !letters.test(fname)) {
    errorMessage = "Please enter only letters";
    msg1.innerHTML = errorMessage;
    valid = false;
    inputs[0].onkeyup = function () {
      msg1.innerHTML = "";
      valid = true;
    };
  }

  if (lname != "" && !letters.test(lname)) {
    errorMessage = "Please enter only letters";
    msg2.innerHTML = errorMessage;
    valid = false;
    inputs[1].onkeyup = function () {
      msg2.innerHTML = "";
      valid = true;
      console.log(valid);
    };
  }

  if (email != "" && !emailCheck.test(email)) {
    errorMessage = "Please enter a valid email address";
    msg3.innerHTML = errorMessage;
    valid = false;
    inputs[2].onkeyup = function () {
      msg3.innerHTML = "";
      valid = true;
    };
  }

  if (username != "" && !usernameCheck.test(username)) {
    errorMessage = "Username does not meet the requirements";
    msg4.innerHTML = errorMessage;
    valid = false;
    inputs[3].onkeyup = function () {
      msg4.innerHTML = "";
      valid = true;
    };
  }
  if (pwd != "" && !passwordCheck.test(pwd)) {
    errorMessage = "Your password does not meet the requirements";
    msg5.innerHTML = errorMessage;
    valid = false;
    inputs[4].onkeyup = function () {
      msg5.innerHTML = "";
      valid = true;
    };
  } else {
  }
  return valid;
} //end validateRegister function

function errorMsg(e) {
  let count = 0;
  for (i = 0; i < inputGroup.length; i++) {
    if (inputGroup[i].value == "") {
      count++;
    }
  }
  if (count > 0) {
    console.log(count);
    e.preventDefault();
    errorMessage = "Please fill in all fields";
    document.getElementById("errMsgMain").innerHTML = errorMessage;
  }

  if (valid == false) {
    e.preventDefault();
    errorMessage = "One or more fields are incorrect";
    document.getElementById("errMsgMain").innerHTML = errorMessage;
  } else {
  }
}

if (btn) {
  btn.addEventListener("click", function (e) {
    errorMsg(e);
  });
}

//2) *************CONTACT Form Validation*******************************//

let contactMsgMain = document.querySelector("#contact-errMAIN");
let contactMsg_1 = document.querySelector("#contact-err1");
let contactMsg_2 = document.querySelector("#contact-err2");

let contactInputList = document.querySelectorAll(".contact-input");
let contactBTN = document.querySelector("#contact-btn");

//button function

function validateContactFormOnSubmit(e) {
  let contactName = document.querySelector("#contact-name").value.trim();
  let contactEmail = document.querySelector("#contact-email").value.trim();
  let contactMessage = document.querySelector("#contact-message").value.trim();
  let contactErrMsg = "";
  let contactSuccessMsg = "";
  let successMSG = document.querySelector("#successMSG");

  if (contactName == "" || contactEmail == "" || contactMessage == "") {
    //some code to prevent button from sending data
    e.preventDefault();
    contactErrMsg = "Please fill in all fields";
    contactMsgMain.innerHTML = contactErrMsg;
  } else {
    if (valid == false) {
      e.preventDefault();
    } else {
      contactSuccessMsg = "Thank you! Your message was sent";
      successMSG.innerHTML = contactSuccessMsg;
    }
  }
}

//end btn function
if (contactBTN) {
  contactBTN.addEventListener("click", function (e) {
    validateContactFormOnSubmit(e);
  });
}
function contactValidate() {
  let contactName = document.querySelector("#contact-name").value.trim();
  let contactEmail = document.querySelector("#contact-email").value.trim();
  let contactMessage = document.querySelector("#contact-message").value.trim();
  let contactErrMsg = "";

  if (contactName != "" && !letters.test(contactName)) {
    contactErrMsg = "Please enter only letters";
    contactMsg_1.innerHTML = contactErrMsg;
    valid = false;
    //additonal code---
    contactInputList[0].onkeyup = function () {
      contactMsg_1.innerHTML = "";
      valid = true;
    };
  }
  if (contactEmail != "" && !emailCheck.test(contactEmail)) {
    contactErrMsg = "Please enter a valid email address";
    contactMsg_2.innerHTML = contactErrMsg;
    valid = false;
    contactInputList[1].onkeyup = function () {
      contactMsg_2.innerHTML = "";
      valid = true;
    };
  } else {
  }
  return valid;
}
//3) *************LOGIN Form Validation*******************************//

let loginBTN = document.querySelector("#loginBTN");

function loginValidate(e) {
  let loginUser = document.querySelector("#loginUser").value.trim();
  let loginPass = document.querySelector("#loginPass").value.trim();
  let loginErrMsg = "";
  let loginErrMsg_Main = document.querySelector("#loginErrMsg_Main");

  if (loginUser == "" || loginPass == "") {
    e.preventDefault();
    loginErrMsg = "--Please fill in all fields--";
    loginErrMsg_Main.innerHTML = loginErrMsg;
  }
}
if (loginBTN) {
  loginBTN.addEventListener("click", function (e) {
    loginValidate(e);
  });
}
/**************************************************************/

/************************END VALIDATION************************/

/**************************************************************/

/************************UNDERLINE ANIMATION*******************/

/* let navContainer = document.querySelector("#nav-wrapper");

let navLinks = navContainer.querySelectorAll(".underline");

for(let i = 0; i < navLinks.length; i++) {
    navLinks[i].addEventListener('click', function(){
        let current = document.getElementsByClassName("active");
        
        if (current.length > 0){
            current[0].className = current[0].className.replace(" active", "");
        }

        this.className += " active";
    });

} */

/************************NAVIGATION MENU TOGGLE*******************/
/*****************************************************************/

let hamburger = document.querySelector("#hamburger");
let navUL = document.querySelector("#nav-ul");

hamburger.addEventListener("click", function () {
  navUL.classList.toggle("show");
});
