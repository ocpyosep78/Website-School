<?
/**
 * document by Thomas Vermeulen.
 * Created on 13-11-2012.
 * Version 1.0
 */
?>
<?php
if(isset($_COOKIE['klanten_id']) && $_COOKIE['klanten_id'] != '' && is_numeric($_COOKIE['klanten_id'])){
    $_SESSION['klanten_id'] = $_COOKIE['klanten_id'];
    header('location: index.php?page=agenda');
}elseif(isset($_SESSION['klanten_id'])){
    //controleer of sessie bestaat.
    
}
//is het formulier verstuurd?
if(isset($_POST['submit'])){
    if($_POST['emailadres'] != '' && $_POST['password'] != ''){
        //beide velden zijn ingevuld.
        $email = mysql_real_escape_string($_POST['emailadres']);
        $password = mysql_real_escape_string($_POST['password']);
        $stmt = $db->query("SELECT * FROM klanten WHERE `emailadres` = '".$email."' AND `wachtwoord` = '".$password."'");
        $result = $stmt->fetchObject();
        if(!empty($result)){
            //gebruiker id in sessie.
           if($_POST['stayloggedin'] == true){
            }
            $_SESSION['klanten_id'] = $result->klanten_id;
            $_SESSION['achternaam'] = $result->achternaam;
            header('location: index.php?page=agenda');
        
            //gebruiker doorsturen naar agenda.php
          }
        else{
            print('');
 ?>  
<div id="inloggenagenda">
        <form action="index.php?page=inloggen_bij_agenda" method="POST">
            <table>
                <tr>
                    <td>E-mailadres</td>
                    <td><input type="text" name="emailadres" value="<?php echo $_POST['emailadres']; ?>"/></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td> 
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Inloggen" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a Href="index.php?page=wachtwoord_vergeten"> Wachtwoord opvragen</a>
                    </td>
                </tr>
            </table>
        </form>
        <div class="error">
            Onjuiste inlog gegevens.
        </div>
</div>
<?php
        }
    }else{
        //niet alles is correct ingevuld.
?>
<div id="inloggenagenda">
            <form action="index.php?page=inloggen_bij_agenda" method="POST">
            <table>
                <tr>
                    <td>E-mailadres</td>
                    <td><input type="text" name="emailadres" value="<?php echo $_POST['emailadres']; ?>"/></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td> 
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Inloggen" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a Href="index.php?page=wachtwoord_vergeten"> Wachtwoord opvragen</a>
                    </td>
                </tr>
            </table>
        </form>
        <div class="error">
            U heeft niet alle velden ingevuld.
        </div>
</div>
<?php
    }
}else{
    //toon leeg formulier
?>
<div id="inloggenagenda">
            <form action="index.php?page=inloggen_bij_agenda" method="POST">
            <table>
                <tr>
                    <td>E-mailadres</td>
                    <td><input type="text" name="emailadres" /></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td> 
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Inloggen" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a Href="index.php?page=wachtwoord_vergeten"> Wachtwoord opvragen</a>
                    </td>
                </tr>
            </table>
        </form>
</div>
    <?php
}