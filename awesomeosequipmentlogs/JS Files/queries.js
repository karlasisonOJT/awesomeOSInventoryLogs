<script>
function getName(){
    var uID = document.getElementById("uID").value;
    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    document.getElementById("username").value = firstName.toLowerCase() +lastName.toLowerCase()+uID;
    document.getElementById("password").value = lastName.toLowerCase()+ firstName.charAt(0).toLowerCase()+uID;
}

function enterItems(scannedcode, itemquantity, verifier) {

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

                alert(this.responseText);
                return false;

                //document.getElementById("warningmessage").innerHTML = this.responseText;

            }
        };
  xmlhttp2.open("GET", "../Functions/getTable.php?serialcode=" + scannedcode+ "&verifier="+ verifier+"&qty=" + itemquantity , true);
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
        </script>