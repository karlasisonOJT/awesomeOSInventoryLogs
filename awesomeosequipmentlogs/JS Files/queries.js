<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("warningmessage").innerHTML = "";
        return;
    } else {
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
        </script>