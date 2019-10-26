<!DOCTYPE html>

<html>
    <head>
        <title>formularz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div> 
            <form method="post" action="../formularz.php">
            <table bgcolor="lightblue">
                <th><h2> Przykładowy formularz HTML </h2></th>
            <tr>
                <td>Nazwisko:</td> <td><input type="text" name="lastName"><br></td>
            </tr>
            <tr>
                <td>Wiek:</td> <td><input name="age"><br></td>
            <tr/>
            <tr>
                <td>Państwo:</td><td><select name="country">
                                    <option selected>Polska</option>
                                    <option>Niemcy</option>
                                    <option>Rosja</option>
                                    <option>Hiszpania</option>
                                  </select></td>
            </tr>
            <tr>
                <td>Adres e-mail:</td><td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td><b><br>Zamawiam tutorial z jezyka:<br></b></td>
            </tr>
            <tr>
                <td>
                    
                <?php
                    $tech = ["php","c","cpp","java","c#","css","xml","javascript"];
                    foreach($tech as $value){
                        print(' <input type="checkbox" name="tech[]" value='.$value.'>'.$value);
                    }
                ?>

                    <!-- <input type="checkbox" name="tech[]" value="php">PHP
                    <input type="checkbox" name="tech[]" value="c">C
                    <input type="checkbox" name="tech[]" value="cpp">CPP
                    <input type="checkbox" name="tech[]" value="java">Java
                    <input type="checkbox" name="tech[]" value="c#">C#
                    <input type="checkbox" name="tech[]" value="css">CSS
                    <input type="checkbox" name="tech[]" value="xml">XML
                    <input type="checkbox" name="tech[]" value="javascript">JavaScript -->
                </td>
            </tr>
            <tr>
                <td><b><br>Sposób zapłaty:</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="payment" value="eurocard">eurocard
                    <input type="radio" name="payment" value="visa">visa
                    <input type="radio" name="payment" value="przelew">przelew bankowy 
                </td>
            </tr>
            <tr>
               <td><input type="submit" value="Tworzenie aplikacji internetowych 2 pdf"><td>
                <td><input type="submit" value="Dodaj" name="Dodaj"></td>
                <td><input type="submit" value="Pokaż" name="Pokaz"></td>
                <td><input type="submit" value="Java" name="OnlyJava"></td>
                <td><input type="submit" value="PHP" name="OnlyPHP"></td>
                <td><input type="submit" value="CPP" name="OnlyCPP"></td>
                <td><input type="submit" value="Statystyki" name="Stats"></td>
                    </tr>
            </table>
                
            </form>
        </div>
    </body>
</html>
