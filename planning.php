<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <table>
<?php
   $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
   $date = new DateTime (date("11-12-2022"));
   $interval = new DateInterval('P1D');

?>
   <?php for($i=7; $i<20; $i++): ?>
    <tr>
        <?php for($j=0; $j<7; $j++): ?>
        <?php $date->add($interval)?>
        <?php  if ($i==7) : ?>
            <td> <?= $days[$j] . ($date->format("d.m.Y") )?> </td>
            <?php else: ?>
            <td><?= $i. ":00"." ".$days[$j] ?></td>
            <?php endif; ?>
            <?php endfor ; ?>
    </tr>
         <?php endfor ; ?>
    </table>
</body>
</html>





