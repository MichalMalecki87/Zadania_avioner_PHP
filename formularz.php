<html>
    <head>
        <title>Zadanie- formularz</title>
    </head>
    <body>
    <?php 
        $name_error = $surname_error = $password_error = $password_2_error = $email_error = $login_error = '';
        $name = $surname = $login = $password = $password_2 = $email = $sex = $voivodship = '';
    ?>
    <?php
        //walidacja danych
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["name"])){
                $name_error = "Imię jest wymagane";
            }else{
                $name = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z ąćęłóńźżĄĆĘŁÓŃŹŻ]*$/", $name)){
                    $name_error = "Imię może składać się tylko z liter i białych znaków";
                }
            }

            if (empty($_POST["surname"])){
                $surname_error = "Nazwisko jest wymagane";
            }else{
                $surname = test_input($_POST["surname"]);
                if(!preg_match("/^[a-zA-Z- ąćęłóńźżĄĆĘŁÓŃŹŻ]*$/", $surname)){
                    $surname_error = "Nazwisko może składać się tylko z liter, myślników i białych znaków";
                }
            }

            if (empty($_POST["login"])){
                $login_error = "Login jest wymagany";
            }else{
                $login = test_input($_POST["login"]);
            }

            if (empty($_POST["password"])){
                $password_error = "Proszę podać hasło do konta";
            }else{
                $password = $_POST["password"];
                if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $password)){
                    $password_error = "Hasło musi się składać z conajmniej 8 znaków, musi zawierać duże i małe litery oraz cyfry";
                }
            }

            if (empty($_POST["password_2"])){
                $password_2_error = "Proszę powtórzyć hasło do konta";
            }else{
                $password_2 = $_POST["password_2"];
                if($password != $password_2){
                    $password_2_error = "Proszę się upewnić, że oba wpisane hasła są identyczne";
                }
            }

            if (empty($_POST["email"])){
                $email_error = "Proszę podać adres email";
            }else{
                $email = test_input($_POST["email"]);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    $email_error = "Nieprawidłowy adres email";
            }
            

            if (empty($_POST["sex"])){
                $sex = "nie podano";
            }else{
                $sex = test_input($_POST["sex"]);
            }

            if ($_POST["voivodship"] == -1){
                $voivodship = "nie podano";
            }else{
                $voivodship = test_input($_POST["voivodship"]);
            }
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
         ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            Login: <input type=text name="login" value=<?php echo $login?>>
            <span class="error">* <?php echo $login_error;?></span><br>
            Hasło: <input type=password name="password" value=<?php echo $password?>>
            <span class="error">* <?php echo $password_error;?></span><br>
            Powtórz hasło: <input type=password name="password_2" value=<?php echo $password_2?>>
            <span class="error">* <?php echo $password_2_error;?></span><br>
            Adres email: <input type=email name="email" value=<?php echo $email?>>
            <span class="error">* <?php echo $email_error;?></span><br>
            Imię: <input type=text name="name" value=<?php echo $name?>>
            <span class="error">* <?php echo $name_error;?></span><br>
            Nazwisko: <input type=text name="surname" value=<?php echo $surname?>>
            <span class="error">* <?php echo $surname_error;?></span><br>
            Płeć:<br> 
            <input type=radio name=sex value="man" <?php if (isset($sex) && $sex=="man") echo "checked";?>>mężczyzna
            <input type=radio name=sex value="woman" <?php if (isset($sex) && $sex=="woman") echo "checked";?>>kobieta<br>
            <label for="voivodship">Województwo w którym mieszkasz</label>
                <select id="voivodship" name="voivodship">
                    <option value="-1"><--Wybierz województwo--></option>
                    <option value="mazowieckie">mazowieckie</option>
                    <option value="łódzkie">łódzkie</option>
                    <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                    <option value="podkarpackie">podkarpackie</option>
                    <option value="małopolskie">małopolskie</option>
                    <option value="śląskie">śląskie</option>
                    <option value="pomorskie">pomorskie</option>
                    <option value="zachodnio-pomorskie">zachodnio-pomorskie</option>
                    <option value="lubuskie">lubuskie</option>
                    <option value="dolnośląskie">dolnośląskie</option>
                    <option value="świętokrzyskie">świętokrzyskie</option>
                    <option value="podlaskie">podlaskie</option>
                    <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                    <option value="opolskie">opolskie</option>
                    <option value="wielkopolskie">wielkopolskie</option>
                    <option value="lubelskie">lubelskie</option>
                </select>
            <input type=submit value="Wyślij"><br>
            *pola wymagane
        </form>
        
        <div>
        Login: <?php echo $login?><br>
        Imię: <?php echo $name?><br>
        Nazwisko: <?php echo $surname?><br>
        Adres email: <?php echo $email?><br>

        Płeć: <?php switch($sex){
        case "man":
            echo "mężczyzna";
            break;
        case "woman":
            echo "kobieta";
            break;
        case "nie podano":
            echo "nie podano";
            break;
        }
        ?><br>
        Województwo: <?php echo $voivodship?>
    </div>
    </body>
</html>