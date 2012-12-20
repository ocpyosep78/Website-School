<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
          
        <?php
        if (isset($_SESSION['klanten_id'])){
                $klant_id = $_SESSION['klanten_id'];
       if(isset($_GET['id']) && $_GET['aantal']){
           $id = $_GET['id'];
           
           
           
            $joins=$db->prepare("SELECT * FROM bestelling AS b JOIN bestelling_producten AS bp ON b.id = bp.bestelling_id JOIN producten as p ON bp.product_id = p.id"); 
            $joins->execute();
            
           
           $insert=$db->prepare("INSERT INTO bestelling (klant_id, datum) VALUES (:klant_id, :date ");
           $insert->bindParam(':klant_id', $klant_id);
           $insert->bindParam(':date', date('Y-m-d'));
           $insert->execute();
           
           
           // controleert of  'id' en 'aantal' een waarde is meegegeven, zo ja, query om de bestelling in de database te zetten
           $product1 = $db->prepare("SELECT naam FROM producten WHERE id = :id");
           $product1->bindParam(':id', $id);
             $product1->execute();
           $naamproduct = $product1->fetchall();
  
           foreach ($naamproduct as $productnaam){
           
           
           
           $aantal = $_GET['aantal'];
           print ("Uw bestelling van $aantal keer het product : {$productnaam['naam']} is verwerkt! ");
                                                }
       }
       
        else {
            print ("U heeft geen geldig product gekozen of geen geldig aantal! <br> Selecteert u eerst een product of aantal ");
            echo 'Om terug te gaan klik op de volgende link <a href="index.php?page=bestellenproduct">Klik hier</a>';
            
             }
        }
        else{
            print ("Log eerst in a.u.b.");
        }
        ?>
    </body>
</html>
