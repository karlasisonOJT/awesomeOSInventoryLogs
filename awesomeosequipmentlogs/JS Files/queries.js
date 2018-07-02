<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("warningmessage").innerHTML = "";
        return;
    } else {
        document.getElementById("username_err").innerHTML = "";
    document.getElementById("password_err").innerHTML = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("warningmessage").innerHTML = this.responseText;

            }
        };
  xmlhttp.open("GET", "../Functions/getwarning.php?q=" + str, true);
        xmlhttp.send();
        }
        }

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
                }
                else{
                    document.getElementById(ID).innerHTML = "Deactivate";
                }

                //document.getElementById("warningmessage").innerHTML = this.responseText;

            }
        };
  xmlhttp3.open("GET", "../Functions/getUser.php?verifieruname=" + ID+"&activity="+activity, true);
        xmlhttp3.send();
}

        </script>