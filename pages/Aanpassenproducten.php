<?php
/* 
    Document   : Aanpassenproducten.php
    Created on : 11-12-2012
    Author     : Daniel
    Description:
        Aanpassen van producten.
*/


    if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt           = $db->query("SELECT * FROM producten WHERE `id` = '".mysql_real_escape_string($_POST['id'])."'");
            $result         = $stmt->fetchall();




            $img = $db->query("SELECT productencol FROM producten WHERE `id` = '".mysql_real_escape_string($_POST['id'])."'");
            //  Afbeelding uit de database halen
?>
<?php

            if (!isset($_POST['wijzig'])) {
    
?>              <!-- Formulier om productgegevens te wijzigen -->
            <form action="" method ="post">
                <table>
                    <tr>
                        <td colspan="3">Product gegevens</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Afbeelding</td>
                        <td>Productbeschrijving</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo '<img src="'.$img.'">'?></td>
                        <td><input type="text" name="omschrijving" value="<?php echo $result[0]['omschrijving']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
                <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                <input type="submit" name="annuleren" value="Annuleren">
            </form>
<?php
} 
?>

<?php
        if (isset($_POST['wijzig'])) {


            if   ($_POST['omschrijving'] != "");

            else 
                {
                echo 'Vul alstublieft een omschrijving in';
                }
                $img            = $_POST['img'];
                $omschrijving   = $_POST['omschrijving'];
                $sql            = ("
                                UPDATE `klanten` 
                                SET 
                                WHERE `img` = '".mysql_real_escape_string($_POST['img'])."' 
                                WHERE `omschrijving` = '".mysql_real_escape_string($_POST['omschrijving'])."'
                                WHERE WHERE `id` = '".mysql_real_escape_string($_POST['id'])."'");
                $stmt = $db->prepare($sql);
                $stmt->execute();
       
?>
                <form action="" method ="post">
                    <table>
                        <tr>
                            <td colspan="3">Product gegevens</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Afbeelding</td>
                            <td>Productbeschrijving</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo '<img src="'.$img.'">'?></td>
                            <td><input type="text" name="omschrijving" value="<?php echo $result[0]['omschrijvingen']; ?>"></td>
                        </tr>
                    </table>
                    <input type="submit" name="verwijderen" value="Verwijder geselecteerde gegevens">
                    <input type="submit" name="Wijzig" value="Wijzigingen opslaan">
                    <input type="submit" name="annuleren" value="Annuleren">
                </form>

<?php
            echo 'Productgegevens zijn gewijzigd.';
    
?>

<?php
                    }
?>

<?php
        if (isset($_POST['verwijderen'])) 
            {
                $sql = ("DELETE FROM `producten` 
                        WHERE `id` = '".mysql_real_escape_string($_POST['id'])."'
                        ");
                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
            echo 'Productgegevens zijn succesvol verwijderd.';
?>


<?php
            } 
            Else
            {
                Echo 'Geen product ingevoerd.<br><br>';
                Echo "<a href='index.php?page=bekijkenproducten'>";
                Echo 'Klik hier';
                Echo "</a>";
            }
?>