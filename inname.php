<?php
include 'header.php';
?>
    <script type='text/javascript' >
        function remove(){
                while (extraveld.hasChildNodes()) {
                extraveld.removeChild(extraveld.lastChild);
                
            }
        }

        function voegVeldenToe(){
            // Generate a dynamic number of inputs
            let nummer = document.getElementById("veld").value;
            // Get the element where the inputs will be added to
            let extraveld = document.getElementById("extraveld");
         
            // Remove every children it had before
            while (extraveld.hasChildNodes()) {
                extraveld.removeChild(extraveld.lastChild);
                
            }
            for (i=0;i<nummer;i++){
                // Create an <input> element, set its type and name attributes
                let apparaat = document.createElement("input");
                apparaat.type = "text";
                apparaat.name = "apparaat" + i;
                apparaat.placeholder = "Product";
                //apparaat.style.cssText ="";
                extraveld.appendChild(apparaat);

                let apparaat2 = document.createElement("input");
                apparaat2.type = "text";
                apparaat2.name = "gewicht" + i;
                apparaat2.placeholder = "Gewicht";
                //apparaat2.style.cssText ="";
                extraveld.appendChild(apparaat2);
                

                // Append a line break 
                extraveld.appendChild(document.createElement("br"));
            }
        }    



    </script>
<head><title>Welkom bij ReMaS</title></head>

  <div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">



    <form action="" method="POST">

                <select name="medewerker" class="rolselect">
                <section class="boven">
                  <option value="<?= $_SESSION['naam']?>"><?= $_SESSION['naam']?></option>
                </select>
                <input type="text" class="rolselect" id="tijd" name="tijd">
                </section>
                <section>
                <input type="text" class="rolselect" id="veld" name="veld" placeholder="Aantal producten">
                <a href="#" class="greenbutton" id="voegtoe" onclick="voegVeldenToe()">Voeg toe</a>
                <a href="#" class="greenbutton" onclick="remove()">Verwijder</a>
                </section>
                <section>
                <h3>Apparaten</h3>
                <div>
                <h3>naam</h3>
                <h3>Gewicht</h3>
                </div>
                <div id="extraveld"> </div>
        

                </section>

    </form>



  </div>


  </div>


  <?php
include_once 'footer.php';
?>