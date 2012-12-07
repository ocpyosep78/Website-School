<?php
if(isset($_POST['registreren']))
{ ?> 
<!--Controleert of er op registreer is geklikt-->
<form action="index.php?page=aanmeldenklant" method="POST">
    <div id="aanmeldenklant"><table id="aanmeldenklant">
            <tr>
                    <td>Email-adres:</td>
                    <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td>
                </tr> <!-- Invulveld voor email -->
                <tr>
                    <td>Voornaam:</td>
                    <td><input type="text" name="voornaam" value="<?php echo $_POST['voornaam']; ?>" /></td>
                </tr> <!-- Invulveld voor voornaam -->
                <tr>
                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="<?php echo $_POST['achternaam']; ?>" /></td>
                </tr> <!-- Invulveld voor achternaam -->
                <tr>
                    <td>Woonplaats:</td>
                    <td><input type="text" name="woonplaats" value="<?php echo $_POST['woonplaats']; ?>" /></td>
                </tr> <!-- Invulveld voor woonplaats -->
                <tr>
                    <td>Adres:</td>
                    <td><input type="text" name="adres" value="<?php echo $_POST['adres']; ?>" /></td>
                </tr> <!-- Invulveld voor adres -->
                <tr>
                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" value="<?php echo $_POST['postcode']; ?>" /></td>
                </tr> <!-- Invulveld voor postcode -->
                <tr>
                    <td>Telefoonnummer:</td>
                    <td><input type="text" name="telefoonnr" value="<?php echo $_POST['telefoonnr']; ?>" /></td>
                </tr> <!-- Invulveld voor telefoonnummer -->
                <tr>
                    <td>Wachtwoord:</td>
                    <td><input type="password" name="wachtwoord" value="" /></td>
                </tr> <!-- Invulveld voor wachtwoord -->
                <tr>
                    <td>Herhaal wachtwoord:</td>
                    <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                </tr> <!-- Invulveld voor herhaling wachtwoord -->
                <tr>
                    <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                </tr> <!-- Submitknop voor het versturen van de formulier -->
        </table></div> 
    <!-- Formulier waar de velden ingevuld blijven als er iets fout gaat
        tijdens het invullen zoals leeg veld of niet overeenkomend wachtwoord -->
</form>
<!--Het aanmeld formulier waarbij ingevulde waarden blijven staan-->
<?php
    if ($_POST['wachtwoord'] == $_POST['herhaalwachtwoord'])
    //Controleert of de wachtwoorden overeen komen
        {
		if ($_POST['email']!='' || $_POST['voornaam']!='' || $_POST['achternaam']!=''
                    || $_POST['woonplaats']!='' || $_POST['adres']!=''
                    || $_POST['postcode']!='' || $_POST['telefoonnr']!=''
                    || $_POST['wachtwoord']!=''|| $_POST['herhaalwachtwoord']!='')
                //Controleert of er velden leeg zijn
                    {
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $woonplaats = $_POST['woonplaats'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $telefoonnr = $_POST['telefoonnr'];
        $sql="INSERT INTO klanten (email, wachtwoord, voornaam, achternaam, adres, woonplaats, postcode, telefoonnr) 
                VALUES ('.$email.', '.$wachtwoord.', '.$voornaam.', '.$achternaam.', '.$adres.', '.$woonplaats.', '.$postcode.', '.$telefoonnr.')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
 
                    }
		else{
			print 'Een veld is nog niet ingevuld.';
                    }
    }
    else{
            print 'Wachtwoorden komen niet overeen.';
        }
}
else{
?>
<form action="index.php?page=aanmeldenklant" method="POST">
    <div id="aanmeldenklant"><table id="aanmeldenklant">
            <tr>
                    <td>Email-adres:</td>
                    <td><input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Voornaam:</td>
                    <td><input type="text" name="voornaam" value="" /></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><input type="text" name="achternaam" value="" /></td>
                </tr>
                <tr>
                    <td>Woonplaats:</td>
                    <td><input type="text" name="woonplaats" value="" /></td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td><input type="text" name="adres" value="" /></td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" value="" /></td>
                </tr>
                <tr>
                    <td>Telefoonnummer:</td>
                    <td><input type="text" name="telefoonnr" value="" /></td>
                </tr>
                <tr>
                    <td>Wachtwoord:</td>
                    <td><input type="password" name="wachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td>Herhaal wachtwoord:</td>
                    <td><input type="password" name="herhaalwachtwoord" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Registreer" name="registreren" /></td>
                </tr>
        </table></div>
</form>
<!--Het lege aanmeld formulier-->
<?php } ?>