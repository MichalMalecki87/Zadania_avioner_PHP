<?php $tab = array(
    array('id' => 1, 'parent' => 0, 'osoba' => 'pierwszy'),
    array('id' => 2, 'parent' => 1, 'osoba' => array('imie'=>'Adam', 'nazwisko'=>'Mickiewicz')),
    array('id' => 3, 'parent' => 1, 'osoba' => 'trzeci'),
    array('id' => 4, 'parent' => 1, 'osoba' => 'czwarty'),
    array('id' => 5, 'parent' => 1, 'osoba' => array('imie'=>'Leon', 'nazwisko'=>'Wichura')),
    array('id' => 6, 'parent' => 1, 'osoba' => 'szósty')
);
$i=0 ?>

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
            <?php foreach($data as $key => $value): ?>               
                <?php if(is_array($value)): ?>
                    <dd><?php echo $key; ?>: </dd>
                    <?php foreach($value as $key_2 => $value_2):?>
                        <dd style="margin-left: 60px"><?php echo $key_2?>: <?php echo $value_2; ?></dd>
                    <?php endforeach ?>
                <?php else:?>
                    <dd><?php echo $key; ?>: <?php echo $value;?></dd>
                <?php endif ?>
            <?php endforeach ?>
    <?php endforeach ?>
</dl>
        
            
    
</body>
</html>
