
       function printUsers() {
            let div = document.getElementById("page").innerHTML;
            let page = window.open('', '', 'height=auto;, width=auto;');
            page.document.write('<html>');
            page.document.write('<body > <h1>Werknemers<br>');
            page.document.write(div);
            page.document.write('</body></html>');
            page.document.close();
            page.print();
        }