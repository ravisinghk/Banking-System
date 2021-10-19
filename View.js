var sno = localStorage.getItem("sno");

console.log(sno);

var senderName;
var senderBalance;
// console.log("Hello")

var ajax = new XMLHttpRequest();
ajax.open("GET", "dataBank.php", true);
ajax.send();


ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        console.log(data);

        let name = document.getElementById("name");
        let email = document.getElementById("email");
        let balance = document.getElementById("balance");

        senderBalance = data[sno - 1]["balance"];
        console.log(parseInt(senderBalance));
        localStorage.setItem("senderBalance", senderBalance);

        name.innerHTML = ` <b>Name:</b> \u00A0 ${data[sno - 1]["name"]}`;
        email.innerHTML = `<b>Email:</b> \u00A0 ${data[sno - 1]["email"]}`;
        balance.innerHTML = `<b>Balance:</b>\u00A0 ${data[sno - 1]["balance"]}`;

        let ben = document.getElementById("sel-ben");

        // ben.innerHTML = ` <option id="null"  selected disabled hidden>Choose here</option> `
        // let undef = document.getElementById("null");
        // undef.setAttribute('value', '');
        for (let key of Object.keys(data)) {

            if (parseInt(key) === parseInt(sno) - 1) {
                continue;
               
            }
           
            ben.innerHTML += `<option style="padding:10%;" value="${parseInt(key)}">${data[key]['name']}\u00A0 <span class="span">(${data[key]['email']})</span></option>`;

            // let key1 = key++
            if(key==0){
              ben.children[key].setAttribute('value',"");
            }
            else{
              ben.children[key].setAttribute('value', data[key]['name']);
            }
            

            console.log(ben.children[key].getAttribute('value'));
            

        }

        // let senderNo = localStorage.getItem("sno");
        senderName = data[parseInt(sno)-1]["name"];
        console.log(senderName);
      


    }
}


// function transfer(){
//     let ben = document.getElementById("sel-ben").value;
//     let amount =  document.getElementById("amount").value;

//     console.log(ben);
//     console.log(amount);

//     localStorage.setItem("sno-ben", ben); 
//     localStorage.setItem("amount", amount); 
// }


// $(document).ready(function () {
//     getCookie("sender", senderName, "1");
//   });

  // function createCookie(name, value, days) {
  //   var expires;
  //   if (days) {
  //     var date = new Date();
  //     date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  //     expires = "; expires=" + date.toGMTString();
  //   }
  //   else { 
  //     expires = "";
  //   }
  //   document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
  // }

  // console.log(` hello ${senderName}`);  

  function transfer(){

    // let sender = senderName;
    // let receiver = document.getElementById("sel-ben").value;

    let receiverName = document.getElementById("sel-ben").value;

    // if(receiverName == ""){
    //     alert("Select Beneficiary");
    //     document.getElementById("principal").focus();
    //     return false;
    // }

    let amount = document.getElementById("amount").value;

    console.log(amount);

    document.cookie = `sendername= ${senderName}; expires=` + new Date(2050, 0, 1).toUTCString();
    document.cookie = `receivername= ${receiverName}; expires=` + new Date(2050, 0, 1).toUTCString();
    
  

  }


  let senderBal = localStorage.getItem("senderBalance");
  console.log("This is"+ senderBal);

function validateForm(){
  if (document.getElementById("sel-ben").value == ""  ) {
    alert("Select Beneficiary ");
    document.getElementById("sel-ben").focus();
    return false;
  }
  
  if (document.getElementById("amount").value <= 0  || parseInt(document.getElementById("amount").value)  > parseInt(senderBal) ) {
      alert("Enter a Valid Amount ");
      document.getElementById("amount").focus();
      return false;
    }
}


