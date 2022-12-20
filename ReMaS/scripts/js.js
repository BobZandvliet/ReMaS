
       function printpage() {
            let div = document.getElementById("page").innerHTML;
            let page = window.open('', '', 'height=auto;, width=auto;');
            page.document.write('<html>');
            page.document.write('<body > <h1>uitdraai<br>');
            page.document.write(div);
            page.document.write('</body></html>');
            page.document.close();
            page.print();
        }

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
