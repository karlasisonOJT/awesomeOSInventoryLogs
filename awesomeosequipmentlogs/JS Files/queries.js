<script>
function getName(){
    var uID = document.getElementById("uID").value;
    var firstName = document.getElementById("fname").value;
    firstName = firstName.replace(/\s/g, '');
    var lastName = document.getElementById("lname").value;
        lastName = lastName.replace(/\s/g, '');
    document.getElementById("username").value = firstName.toLowerCase() +lastName.toLowerCase()+uID;
    document.getElementById("password").value = lastName.toLowerCase()+ firstName.charAt(0).toLowerCase()+uID;
}

function item(serialNumber, officeTag, equipmentName, equipmentBrand, quantity){
    this.serial_number = serialNumber;
    this.office_tag = officeTag;
    equipment_name = equipmentName;
    equipment_brand = equipmentBrand;
    item_quantity = quantity;
}
       
function changeStatus(ID, activity){
  
     var xmlhttp3 = new XMLHttpRequest();
        xmlhttp3.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var newactivity = this.responseText;
                if (newactivity==2) {
                alert("User number "+ID+" successfully deactivated!");
                }
                else if (newactivity==1) {
                alert("User number "+ID+" now active!");
                }
                location.reload();
            }
        };
  xmlhttp3.open("GET", "../Functions/getUser.php?verifieruname=" + ID+"&activity="+activity, true);
        xmlhttp3.send();
}
function getUser(tosearch) {
   
        var xmlhttp4 = new XMLHttpRequest();
        xmlhttp4.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("message").innerHTML = this.responseText +" matches found.";
                document.getElementById("allUsers").innerHTML ="";
               // alert("jjj");
            }
        };
  xmlhttp4.open("GET", "../Functions/getAllUsers.php?usertosearch=" + tosearch, true);
        xmlhttp4.send();
        
        }
function getequipment(tosearchequipment) {
   
        var xmlhttp5 = new XMLHttpRequest();
        xmlhttp5.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("message").innerHTML = this.responseText +" matches found.";
                document.getElementById("allequipments").innerHTML ="";
               // alert("jjj");
            }
        };
  xmlhttp5.open("GET", "../pages/getAllEquipments.php?tosearchequipment=" + tosearchequipment, true);
        xmlhttp5.send();
        
        }
function getequipmentlog(tosearchequipmentlog) {
   
        var xmlhttp6 = new XMLHttpRequest();
        xmlhttp6.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("message").innerHTML = this.responseText +" matches found.";
                document.getElementById("allequipmentlogs").innerHTML ="";
               // alert("jjj");
            }
        };
  xmlhttp6.open("GET", "../pages/getAllEquipmentLogs.php?tosearchequipmentlog=" + tosearchequipmentlog, true);
        xmlhttp6.send();
        
        }

function showchangepassform(userID) {
  
    var x = document.getElementById("changepassform");
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
    document.getElementById("uid").value = userID;

}
function showpass(){
    //alert("lol");
    var pw = document.getElementById("uPassw");
    if (pw.value != "") {
    if (pw.type == "text"){
        pw.type= "password";
        
        document.getElementById("show").innerHTML = "Show Password";
         document.getElementById("uPasswconfirm").type = "password";
               

    }
    else{
         pw.type= "text";

        document.getElementById("show").innerHTML = "Hide Password";
        document.getElementById("uPasswconfirm").type = "text";
    }
    }
}
function submitNewPW(upw, uID){
   // alert(upw + " = "+ uID);
     var xmlhttp7 = new XMLHttpRequest();
        xmlhttp7.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("message").innerHTML = this.responseText +" matches found.";
               // document.getElementById("allequipmentlogs").innerHTML ="";
                alert(this.responseText);
                return false;
            }
        };
  xmlhttp7.open("GET", "../pages/submitnewpw.php?userID=" + uID + "&newPW=" +upw, true);
        xmlhttp7.send();
}

function getOfficeTags(serialNumber){
    //alert(serialNumber);
    //document.getElementById("officetag").innerHTML = ;
   var xmlhttp8 = new XMLHttpRequest();
        xmlhttp8.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("message").innerHTML = this.responseText +" matches found.";
               document.getElementById("equipofficetag").innerHTML =this.responseText;
               if(this.responseText == "0"){
               alert("Serial Number not in the Database!");
               document.getElementById("scancode").value = "";
                document.getElementById("scancode").focus();
               return false;
               }
               else{
                document.getElementById("equipofficetag").focus();
                return true;
               }
                //alert();
                //return false;
            }
        };
  xmlhttp8.open("GET", "../pages/getOfficeTag.php?serialNumber=" + serialNumber, true);
        xmlhttp8.send();
}
//Modal reset button---------------------------------------------
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
//---------------------------------------------Modal reset button
//Modal reset button---------------------------------------------
// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on the button, open the modal 
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
     if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

//---------------------------------------------Modal reset button

function cancelequipment(officetag){
    //var sn = document.getElementById(officetag).innerHTML;
    //alert(officetag);
    document.getElementById(officetag).style.display = "block";
    document.getElementById("cancelbtn"+officetag).style.display = "none";
    
}
function deletethis(offtag, id){
    //alert("delete " + offtag);
     var xmlhttp9 = new XMLHttpRequest();
        xmlhttp9.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("message").innerHTML = this.responseText +" matches found.";
              // document.getElementById("equipofficetag").innerHTML =this.responseText;
                alert(this.responseText);
                location.reload();
                //alert();
                //return false;
            }
        };
  xmlhttp9.open("GET", "../pages/cancelequipment.php?officeTag=" + offtag, true);
        xmlhttp9.send();
       
}

function canceldelete(ofctag){
    //alert("do not delete " + ofctag);
    document.getElementById(ofctag).style.display = "none";
    document.getElementById("cancelbtn"+ofctag).style.display = "block";
}
function emptyTable(){
    //alert("delete " + offtag);
     var xmlhttp10 = new XMLHttpRequest();
        xmlhttp10.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("message").innerHTML = this.responseText +" matches found.";
              // document.getElementById("equipofficetag").innerHTML =this.responseText;
                //alert(this.responseText);
                location.reload();
                //alert();
                //return false;
            }
        };
  xmlhttp10.open("GET", "../pages/emptyScannedItems.php", true);
        xmlhttp10.send();
       
}

var scannedcount= document.getElementById("scancount").innerHTML;
if (scannedcount==0) {
    document.getElementById("myBtn").disabled = true;
        document.getElementById("myBtn2").disabled = true;
}

                    function writelabel(activity, userid){
                    if (activity == 1) {
                        document.getElementById(userid).innerHTML="Deactivate";
                        if (userid==1) {
                        document.getElementById(userid).disabled = true;
                        }
                    }
                    else{
                        document.getElementById(userid).innerHTML="Activate";
                    }
                    }
        </script>