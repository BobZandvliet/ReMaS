<?php
include 'header.php';
?>
<head><title>Register</title></head>
<h1>Register</h1>
<div class="formdiv">

  <form class="regform" action="includes\insert.php" method="POST">
    <label for="fName">Your First Name</label><br>
    <input type="text" name="fName" required><br>

    <label for="lName">Your Last Name</label><br>
    <input type="text" name="lName" required><br>

    <label for="uName">Your User Name</label><br>
    <input type="text" name="uName" required><br>

    <label for="password">Choose a Password</label><br>
    <input type="password" name="Password" required><br>

    <label for="eMail">E-mail</label><br>
    <input type="text" name="eMail" required><br>

    <label for="town">Phone number</label><br>
    <input type="text" name="Phone" required><br>

    <label for="town">Town / City</label><br>
    <input type="text" name="City" required><br>

    <label for="zCode">ZIP Code</label><br>
    <input type="text" name="zCode" required><br>


    <input type="submit" name="submit" value="Submit">



  </form>

</div>

<?php
include 'footer.php';
?>