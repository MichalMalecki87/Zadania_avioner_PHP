<?php $tab1 = array(
    array('id' => 1, 'parent' => 0, 'osoba' => 'pierwszy'),
    array('id' => 2, 'parent' => 1, 'osoba' => array('imie'=>'Adam', 'nazwisko'=>'Mickiewicz')),
    array('id' => 3, 'parent' => 1, 'osoba' => 'trzeci'),
    array('id' => 4, 'parent' => 1, 'osoba' => 'czwarty'),
    array('id' => 5, 'parent' => 1, 'osoba' => array('imie'=>'Leon', 'nazwisko'=>'Wichura')),
    array('id' => 6, 'parent' => 1, 'osoba' => 'szósty')
);
$i=0; 
$tab = array(
    array('id' => 1, 'parent' => 0, 'osoba' => 'pierwszy'),
    array('id' => 2, 'parent' => 1, 'osoba' => array('imie'=>'Adam', 'nazwisko'=>'Mickiewicz', 'zawód'=>array('wyuczony'=>'nauczyciel', 'wykonywany'=>'poeta'))),
    array('id' => 3, 'parent' => 1, 'osoba' => 'trzeci'),
    array('id' => 4, 'parent' => 1, 'osoba' => 'czwarty'),
    array('id' => 5, 'parent' => 1, 'osoba' => array('imie'=>'Leon', 'nazwisko'=>'Wichura')),
    array('id' => 6, 'parent' => 1, 'osoba' => 'szósty')
);

function draw_array_in_array($table, $n){
    if(is_array($table)){
        $margin = $n*20;
        $n += 1;
        foreach($table as $key => $value){  
            $marginpx = strval($margin)."px";
            echo "<dd style=\"margin-left:$marginpx\">$key: ";
            
            draw_array_in_array($value, $n);
            }
        }else{
            echo "$table</dd>";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanko - listy</title>
</head>
<body>
<dl>
    <?php foreach($tab as $data): ?>
        <dt><?php echo $i; $i++; ?>:</dt>              
                <?php draw_array_in_array($data, 1)?>

    <?php endforeach ?>
</dl>
        
            
    
</body>
</html>
