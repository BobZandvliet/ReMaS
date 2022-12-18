<?php
include 'header.php';
?>
    <script type='text/javascript'>
        function voegVeldenToe(){
            // Generate a dynamic number of inputs
            var nummer = document.getElementById("veld").value;
            // Get the element where the inputs will be added to
            var extraveld = document.getElementById("extraveld");
            // Remove every children it had before
            while (extraveld.hasChildNodes()) {
                extraveld.removeChild(extraveld.lastChild);
            }
            for (i=0;i<nummer;i++){
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "veld" + i;
                input.placeholder = "product ";
                
                extraveld.appendChild(input);
                // Append a line break 
                extraveld.appendChild(document.createElement("br"));
            }
        }
    </script>
<head><title>Welkom bij ReMaS</title></head>

  <div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">

    <input type="text" id="veld" name="veld" placeholder="Aantal producten"><br />
    <a href="#" id="voegtoe" onclick="voegVeldenToe()">Voeg toe</a>
    <div id="extraveld"> </div>

  </div>


  </div>


  <?php
include_once 'footer.php';
?>