<script>
function getName(){
    var uID = document.getElementById("uID").value;
    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    document.getElementById("username").value = firstName.toLowerCase() +lastName.toLowerCase()+uID;
    document.getElementById("password").value = lastName.toLowerCase()+ firstName.charAt(0).toLowerCase()+uID;
}

function enterItems(scannedcode, itemquantity, verifier, officetag) {
    //alert(verifier+"-" +scannedcode+" "+itemquantity);
   
       //var scannedcode = document.getElementById("scancode").value;
        if (scannedcode.length == 0) {
        document.getElementById("scannedItems").innerHTML = "";
        return;
        }
        else{
            var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 location.reload();
                //alert(this.responseText);
             //   return false;

                //document.getElementById("warningmessage").innerHTML = this.responseText;
                if(this.responseText != ""){
                    alert(this.responseText);
                }
            }
        };
  xmlhttp2.open("GET", "../Functions/getTable.php?serialcode=" + scannedcode+ "&verifier="+ verifier+"&qty=" + itemquantity +"&offtag=" +officetag, true);
        xmlhttp2.send();
        }

        
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

                //alert(this.responseText);
                
                if (activity ==1) {
                    document.getElementById(ID).innerHTML = "Activate";
                    activity =2;
                }
                else{
                   document.getElementById(ID).innerHTML = "Deactivate";
                    activity = 1;
                }

                //document.getElementById("warningmessage").innerHTML = this.responseText;

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
    if (x.style.display === "block") {
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
               }
               else{
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
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//---------------------------------------------Modal reset button

function cancelequipment(officetag){
    //var sn = document.getElementById(officetag).innerHTML;
    //alert(officetag);
    document.getElementById(officetag).style.display = "block";
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
}
function emptyTable(){
    //alert("delete " + offtag);
     var xmlhttp9 = new XMLHttpRequest();
        xmlhttp9.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("message").innerHTML = this.responseText +" matches found.";
              // document.getElementById("equipofficetag").innerHTML =this.responseText;
                //alert(this.responseText);
                location.reload();
                //alert();
                //return false;
            }
        };
  xmlhttp9.open("GET", "../pages/emptyScannedItems.php", true);
        xmlhttp9.send();
       
}

        </script>