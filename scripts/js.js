        // een functie om de pagina te kunnen printen doormiddel van een print knop
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
    // dit is een functie om dynamisch velden toe te voegen, dit werkte niet helemaal zoals ik wou en wil dit anders doen
    function voegVeldenToe(){
      
        let nummer = document.getElementById("veld").value;
     
        let extraveld = document.getElementById("extraveld");
     
        
        while (extraveld.hasChildNodes()) {
            extraveld.removeChild(extraveld.lastChild);
            
        }
        for (i=0;i<nummer;i++){
            
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
            

            
            extraveld.appendChild(document.createElement("br"));
        }
    }    
