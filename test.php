<html>
<head>
    <title> Verification of valid Password </title>
</head>
<script>
    function verifyPassword() {
        const pw1 = document.getElementById("swt1").value;
        const pw2 = document.getElementById("swt1").value;
        //check empty password field
        if(pw1 == "") {
            document.getElementById("msgpack1").innerHTML = "**Fill the password please!";
            return false;
        }

        //minimum password length validation
        if(pw1.length < 8) {
            document.getElementById("msgpack1").innerHTML = "**Password length must be atleast 8 characters";
            return false;
        }

//maximum length of password validation
        if(pw1.length > 15) {
            document.getElementById("msgpack1").innerHTML = "**Password length must not exceed 15 characters";
            return false;
        }
        if(pw1 != pw2) {
            document.getElementById("msgpack2").innerHTML = "Die Passwörter stimmen nicht überein";
            document.getElementById("msgpack2").innerHTML = "Die Passwörter stimmen nicht überein";
            return false;
        }
    }
</script>

<body>
<center>
    <h1 style="color:green">Javatpoint</h1>
    <h3> Verify valid password Example </h3>

    <form onsubmit ="return verifyPassword()">

        <td>Passwort</td>
            <input type = "password" id = "swt1" value = "">
            <span id = "msgpack1" style="color:red"> </span> <br><br>

        <td>Passwort wiederholen</td>
            <input type = "password" id = "swt2" value = "">
            <span id = "msgpack2" style="color:red"> </span> <br><br>

        <!-- Click to verify valid password -->
        <input type = "submit" value = "Submit">

        <!-- Click to reset fields -->
        <button type = "reset" value = "Reset" >Reset</button>
    </form>
</center>
</body>
</html>


