
     function showHint(str,id) {
            if (str.length == 0) {
               document.getElementById("form").innerHTML = "";
               return;
            }
            else 
            {

            	window.console.log(id)
                  window.console.log(str)
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                     document.getElementById("form").innerHTML = xmlhttp.responseText;
                  }
               }
               xmlhttp.open("GET", "../controller/c_search_ajax.php?q=" + str+"&id="+id, true);
               xmlhttp.send();
            }
         }