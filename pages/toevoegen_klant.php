<?php
/**
 * @author Jelle Smeets
 * @version 1.0
 * @date 9-12-2012
 */
?>
<div id="toevoegen_klant">
<?php
//is het formulier verstuurd ?
if(isset($_POST['submit'])){
    //zijn de verplichte velden ingevuld?
    if($_POST['achternaam'] != '' && $_POST['voorletters'] != ''){
        //succes
        //als geboortedatum niet leeg is, controleer dan op de datum.
        if($_POST['geboortedatum'] != ''){
            list($d, $m, $y) = explode('-', $_POST['geboortedatum']);
           if(checkdate($m, $d, $y)){
               //amerikaanse notatie
              $_POST['geboortedatum'] = $y.'-'.$m.'-'.$d;
            }
        }
        //ugly fix for checkboxes
        if(!isset($_POST['orthopedische_afwijking'])){
            $_POST['orthopedische_afwijking'] = false;
        }else{
            $_POST['orthopedische_afwijking'] = true;
        }
        if(!isset($_POST['diabetus_melinus'])){
            $_POST['diabetus_melinus'] = false;
        }else{
          $_POST['diabetus_melinus'] = true;  
        }
        if(!isset($_POST['hart_vaat'])){
            $_POST['hart_vaat'] = false;
        }else{
           $_POST['hart_vaat'] = true;
        }
        if(!isset($_POST['anti_stol'])){
            $_POST['anti_stol'] = false;
        }else{
            $_POST['anti_stol'] = true;
        }
        if(!isset($_POST['phema'])){
            $_POST['phema'] = false;
        }else{
            $_POST['phema'] = true;
        }
        if(!isset($_POST['allergie'])){
            $_POST['allergie'] = false;
        }else{
             $_POST['allergie'] = true;
        }
        if(!isset($_POST['hiv'])){
            $_POST['hiv'] = false;
        }else{
              $_POST['hiv'] = true;
        }
        if(!isset($_POST['hepatitis'])){
            $_POST['hepatitis'] = false;
        }else{
            $_POST['hepatitis'] = true;
        }
        if(!isset($_POST['hemofilie'])){
            $_POST['hemofilie'] = false;
        }else{
             $_POST['hemofilie'] = true;
        }
        if(!isset($_POST['steunkousen'])){
            $_POST['steunkousen'] = false;
        }else{
            $_POST['steunkousen'] = true;
        }
        if(!isset($_POST['steunzolen'])){
            $_POST['steunzolen'] = false;
        }else{
             $_POST['steunzolen'] = true;
        }
        //end of ugly fix.
            $stmt = $db->prepare('INSERT INTO `klanten` (`klant_nummer`, `achternaam`, `tussenvoegsel`, `voorletters`, `adres`, `woonplaats`, `postcode`, `telefoonnr`, `beroep`, `geboortedatum`, `gewicht`, `orthopedische_afwijking`, `voettype`, `huidconditie`, `huidaandoening`, `nagelconditie`, `nagelaandoening`, `plantaire_rechts`, `plantaire_links`, `dorsale_rechts`, `dorsale_links`, `diabetis_melitus`, `hart_vaat`, `anti_stol`, `phema`, `allergie`, `hiv`, `hepatitis`, `hemofilie`, `steunkousen`, `steunzolen`)
                                  VALUES(:klantid, 
                                         :achternaam, 
                                         :tussenvoegsel, 
                                         :voorletters,  
                                         :adres, 
                                         :woonplaats, 
                                         :postcode, 
                                         :telefoonnr, 
                                         :beroep, 
                                         :geboortedatum, 
                                         :gewicht, 
                                         :orthopedische_afwijking, 
                                         :voettype, 
                                         :huidconditie, 
                                         :huidaandoening, 
                                         :nagelconditie, 
                                         :nagelaandoening, 
                                         :plantaire_rechts, 
                                         :plantaire_links, 
                                         :dorsale_rechts, 
                                         :dorsale_links, 
                                         :diabetis_melitus, 
                                         :hart_vaat, 
                                         :anti_stol, 
                                         :phema, 
                                         :allergie, 
                                         :hiv, 
                                         :hepatitis, 
                                         :hemofilie, 
                                         :steunkousen, 
                                         :steunzolen)');
            
            $stmt->bindParam(':klantid', $_POST['klant_id']);
            $stmt->bindParam(':achternaam', $_POST['achternaam']);
            $stmt->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
            $stmt->bindParam(':voorletters', $_POST['voorletters']);
            $stmt->bindParam(':adres', $_POST['adres']);
            $stmt->bindParam(':woonplaats', $_POST['woonplaats']);
            $stmt->bindParam(':postcode', $_POST['postcode']);
            $stmt->bindParam(':telefoonnr', $_POST['telefoonnr']);
            $stmt->bindParam(':beroep', $_POST['beroep']);
            $stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
            $stmt->bindParam(':gewicht', $_POST['gewicht']);
            $stmt->bindParam(':orthopedische_afwijking', $_POST['orthopedische_afwijking']);
            $stmt->bindParam(':voettype', $_POST['voettype']);
            $stmt->bindParam(':huidconditie', $_POST['huidconditie']);
            $stmt->bindParam(':huidaandoening', $_POST['huidaandoening']);
            $stmt->bindParam(':nagelconditie', $_POST['nagelconditie']);
            $stmt->bindParam(':nagelaandoening', $_POST['nagelaandoening']);
            $stmt->bindParam(':plantaire_rechts', $_POST['plantaire_rechts']);
            $stmt->bindParam(':plantaire_links', $_POST['plantaire_links']);
            $stmt->bindParam(':dorsale_rechts', $_POST['dorsale_rechts']);
            $stmt->bindParam(':dorsale_links', $_POST['dorsale_links']);
            $stmt->bindParam(':diabetis_melitus', $_POST['diabetus_melitus']);
            $stmt->bindParam(':hart_vaat', $_POST['hart_vaat']);
            $stmt->bindParam(':anti_stol', $_POST['anti_stol']);
            $stmt->bindParam(':phema', $_POST['phema']);
            $stmt->bindParam(':allergie', $_POST['allergie']);
            $stmt->bindParam(':hiv', $_POST['hiv']);
            $stmt->bindParam(':hepatitis', $_POST['hepatitis']);
            $stmt->bindParam(':hemofilie', $_POST['steunkousen']);
            $stmt->bindParam(':steunkousen', $_POST['steunkousen']);
            $stmt->bindParam(':steunzolen', $_POST['steunzolen']);  

            $stmt->execute();
            //als resultaat niet false is foutmelding tonen.
            if($stmt != false){
                echo 'Het toevoegen van de klant is gelukt.<br />';
                echo '<a href="index.php?page=toevoegen_klant">Voeg nog een klant toe.</a>';
            }else{
                echo 'Er is helaas iets mis gegaan met het toevoegen van de klant';
            }
    }else{
        //alternatief scenario
        ?>
    <div class="error">Vult u alstublieft alle velden in.</div>
        <form id="form_klant_toevoeg" action="" method="POST">
        <table id="table_klant_toevoeg">
            <tr>
                <td>
                    Klantnummer :
                </td>
                <td>
                    <input type="text" name="klant_id" value="<?php echo $_POST['klant_id']; ?>"/>
                </td>
                <td>
                     Diabetus Melitus:
                </td>
                <td>
                    <input type="checkbox" name="diabetus_melitus" value="1" <?php echo (isset($_POST['diabetus_melitus']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam *:
                </td>
                <td>
                    <input type="text" name="achternaam" value="<?php echo $_POST['achternaam']; ?>"/>
                </td>
                <td>
                    Hart en vaat:
                </td>
                <td>
                    <input type="checkbox" name="hart_vaat" value="1" <?php echo (isset($_POST['hart_vaat']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Tussenvoegsel:
                </td>
                <td>
                    <input type="text" name="tussenvoegsel" value="<?php echo $_POST['tussenvoegsel']; ?>"/>
                </td>
                <td>
                    Anti stol:
                </td>
                <td>
                    <input type="checkbox" name="anti_stol" value="1" <?php echo (isset($_POST['anti_stol']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Voorletters *:
                </td>
                <td>
                    <input type="text" name="voorletters" value="<?php echo $_POST['voorletters']; ?>"/>
                </td>
                <td>
                    Phema:
                </td>
                <td>
                    <input type="checkbox" name="phema" value="1" <?php echo (isset($_POST['phema']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Adres:
                </td>
                <td>
                    <input type="text" name="adres" value="<?php echo $_POST['adres']; ?>"/>
                </td>
                <td>
                    Allergie:
                </td>
                <td>
                    <input type="checkbox" name="allergie" value="1" <?php echo (isset($_POST['allergie']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Woonplaats:
                </td>
                <td>
                    <input type="text" name="woonplaats" value="<?php echo $_POST['woonplaats']; ?>"/>
                </td>
                <td>
                    Hiv:
                </td>
                <td>
                    <input type="checkbox" name="hiv" value="1" <?php echo (isset($_POST['hiv']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Postcode:
                </td>
                <td>
                    <input type="text" name="postcode" value="<?php echo $_POST['postcode']; ?>"/>
                </td>
                <td>
                    Hepatitis:
                </td>
                <td>
                    <input type="checkbox" name="hepatitis" value="1" <?php echo (isset($_POST['hepatitis']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Telefoonnr:
                </td>
                <td>
                    <input type="text" name="telefoonnr" value="<?php echo $_POST['telefoonnr']; ?>"/>
                </td>
                <td>
                    Hemofilie:
                </td>
                <td>
                    <input type="checkbox" name="hemofilie" value="1" <?php echo (isset($_POST['hemofilie']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Beroep:
                </td>
                <td>
                    <input type="text" name="beroep" value="<?php echo $_POST['beroep']; ?>"/>
                </td>
                <td>
                    Steunkousen:
                </td>
                <td>
                    <input type="checkbox" name="steunkousen" value="1" <?php echo (isset($_POST['steunkousen']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Geboortedatum:
                </td>
                <td>
                    <input type="text" name="geboortedatum" value="<?php echo $_POST['geboortedatum']; ?>"/>
                </td>
                <td>
                    Steunzolen:
                </td>
                <td>
                    <input type="checkbox" name="steunzolen" value="1" <?php echo (isset($_POST['steunzolen']) ? 'checked="TRUE"' : ''); ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Gewicht:
                </td>
                <td>
                    <input type="text" name="gewicht" value="<?php echo $_POST['gewicht']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Orthopedische afwijking:
                </td>
                <td>
                    <input type="text" name="orthopedisch" value="<?php echo $_POST['orthopedisch']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Voettype:
                </td>
                <td>
                    <input type="text" name="voettype" value="<?php echo $_POST['voettype']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Huidconditie:
                </td>
                <td>
                    <input type="text" name="huidconditie" value="<?php echo $_POST['huidconditie']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Huidaandoening:
                </td>
                <td>
                    <input type="text" name="huidaandoening" value="<?php echo $_POST['huidaandoening']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nagelconditie:
                </td>
                <td>
                    <input type="text" name="nagelconditie" value="<?php echo $_POST['nagelconditie']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nagelaandoening:
                </td>
                <td>
                    <input type="text" name="nagelaandoening" value="<?php echo $_POST['nagelaandoening']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Plantaire rechts:
                </td>
                <td>
                    <input type="text" name="plantaire_rechts" value="<?php echo $_POST['plantaire_rechts']; ?>"/>
                </td>
                <td>
                    Plantaire links:
                </td>
                <td>
                    <input type="text" name="plantaire_links" value="<?php echo $_POST['plantaire_links']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Dorsale rechts:
                </td>
                <td>
                    <input type="text" name="dorsale_rechts" value="<?php echo $_POST['dorsale_rechts']; ?>"/>
                </td>
                <td>
                    Dorsale links:
                </td>
                <td>
                    <input type="text" name="dorsale_links" value="<?php echo $_POST['dorsale_links']; ?>"/>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Klant toevoegen" />
    </form>
    <div class="hint"> Alle velden met een * zijn verplicht</div>
        <?php
    }
}else{
?>

    <form id="form_klant_toevoeg" action="" method="POST">
        <table id="table_klant_toevoeg">
            <tr>
                <td>
                    Klantnummer :
                </td>
                <td>
                    <input type="text" name="klant_id"/>
                </td>
                <td>
                     Diabetus Melitus:
                </td>
                <td>
                    <input type="checkbox" name="diabetus_melitus" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam *:
                </td>
                <td>
                    <input type="text" name="achternaam"/>
                </td>
                <td>
                    Hart en vaat:
                </td>
                <td>
                    <input type="checkbox" name="hart_vaat" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tussenvoegsel:
                </td>
                <td>
                    <input type="text" name="tussenvoegsel"/>
                </td>
                <td>
                    Anti stol:
                </td>
                <td>
                    <input type="checkbox" name="anti_stol" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Voorletters *:
                </td>
                <td>
                    <input type="text" name="voorletters"/>
                </td>
                <td>
                    Phema:
                </td>
                <td>
                    <input type="checkbox" name="phema" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Adres:
                </td>
                <td>
                    <input type="text" name="adres"/>
                </td>
                <td>
                    Allergie:
                </td>
                <td>
                    <input type="checkbox" name="allergie" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Woonplaats:
                </td>
                <td>
                    <input type="text" name="woonplaats"/>
                </td>
                <td>
                    Hiv:
                </td>
                <td>
                    <input type="checkbox" name="hiv" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Postcode:
                </td>
                <td>
                    <input type="text" name="postcode"/>
                </td>
                <td>
                    Hepatitis:
                </td>
                <td>
                    <input type="checkbox" name="hepatitis" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Telefoonnr:
                </td>
                <td>
                    <input type="text" name="telefoonnr"/>
                </td>
                <td>
                    Hemofilie:
                </td>
                <td>
                    <input type="checkbox" name="hemofilie" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Beroep:
                </td>
                <td>
                    <input type="text" name="beroep"/>
                </td>
                <td>
                    Steunkousen:
                </td>
                <td>
                    <input type="checkbox" name="steunkousen" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Geboortedatum:
                </td>
                <td>
                    <input type="text" name="geboortedatum"/>
                </td>
                <td>
                    Steunzolen:
                </td>
                <td>
                    <input type="checkbox" name="steunzolen" value="1"/>
                </td>
            </tr>
            <tr>
                <td>
                    Gewicht:
                </td>
                <td>
                    <input type="text" name="gewicht"/>
                </td>
            </tr>
            <tr>
                <td>
                    Orthopedische afwijking:
                </td>
                <td>
                    <input type="text" name="orthopedisch"/>
                </td>
            </tr>
            <tr>
                <td>
                    Voettype:
                </td>
                <td>
                    <input type="text" name="voettype"/>
                </td>
            </tr>
            <tr>
                <td>
                    Huidconditie:
                </td>
                <td>
                    <input type="text" name="huidconditie"/>
                </td>
            </tr>
            <tr>
                <td>
                    Huidaandoening:
                </td>
                <td>
                    <input type="text" name="huidaandoening"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nagelconditie:
                </td>
                <td>
                    <input type="text" name="nagelconditie"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nagelaandoening:
                </td>
                <td>
                    <input type="text" name="nagelaandoening"/>
                </td>
            </tr>
            <tr>
                <td>
                    Plantaire rechts:
                </td>
                <td>
                    <input type="text" name="plantaire_rechts"/>
                </td>
                <td>
                    Plantaire links:
                </td>
                <td>
                    <input type="text" name="plantaire_links"/>
                </td>
            </tr>
            <tr>
                <td>
                    Dorsale rechts:
                </td>
                <td>
                    <input type="text" name="dorsale_rechts"/>
                </td>
                <td>
                    Dorsale links:
                </td>
                <td>
                    <input type="text" name="dorsale_links"/>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Klant toevoegen" />
    </form>
    <div class="hint"> Alle velden met een * zijn verplicht</div>
    <?php
}
?>
    
</div>