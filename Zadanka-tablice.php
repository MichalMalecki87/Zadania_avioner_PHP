<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
 //generowanie tablicy - sposób pierwszy z możliwością ustawienia parametrów
    function table_gen_1($row_num=20, $col_num=20, $down_range=1, $up_range=1000){
        $table_1 = array();
        for ($x = 1; $x <= $row_num; $x++){
            $list_1 = array();
            for($y = 1; $y <= $col_num; $y++){
                array_push($list_1, rand($down_range , $up_range));
                }
            array_push($table_1, $list_1);
        }
        return $table_1;
    }

 //generowanie tablicy - sposób drugi z możliwością ustawienia parametrów
    function table_gen_2($row_num=20, $col_num=20, $down_range=1, $up_range=1000){
        if ($row_num * $col_num > ($up_range - $down_range + 1)){
            $table_2 = "<p>Różnica pomiędzy granicami losowania musi być większa lub równa od ilorazu liczb kolumn i rzędów</p>";
        }elseif($up_range <= $down_range){
            $table_2 = "<p>Górna granica losowania musi być wyższa niż dolna</p><";
        }else{
            $table_2 = array();
            $all_list = array(); //tablica pomocnicza, gdyż funkcja in_array działa tylko w tablicach jednowymiarowych
            for ($x = 1; $x <=$row_num; $x++){
                $list_2 = array();
                for($y = 1; $y <=$col_num; $y++){
                    $random_number = rand($down_range, $up_range);
                        while (in_array($random_number, $all_list, true)){
                            $random_number = rand($down_range, $up_range);
                        }
                    array_push($all_list, $random_number);
                    array_push($list_2, $random_number);
                    }
                array_push($table_2, $list_2);
            }
        }
        return $table_2;
    }

//wyświetlanie tablicy jako tabela - FUNKCJA
    function display_array($table){
        if(is_array($table)){
            $html = "<p>Tablica</p> <table>";
            for ($row = 1; $row <=count($table); $row++){
                $html .= "<tr>";
                for ($col = 1; $col <=count($table[0]); $col++){
                    $html .= "<td>".$table[$row-1][$col-1]."</td>";
                }
                $html .= "</tr>";
            }
            $html .= "</table>";
            return $html;
        }else{
            return $table;
        }
    }

//funkcja błędu tablicy
    function array_error(){
        echo "Błąd - niewłaściwy format danych";
    }

//sumowanie wartości tablicy - FUNKCJA
    function sum_of_array($table){
        if(is_array($table)){
            $sum = 0;
            foreach ($table as $list){
                $sum += array_sum($list);
            }
            return "<p>Suma składników to: $sum</p>";
        }else{
            array_error();
        }
    }

//wyświetlenie tablic i sum
    $table_1 = table_gen_1();
    echo display_array($table_1);
    echo sum_of_array($table_1);
    $table_2 = table_gen_2(20,20,1,100);
    echo display_array($table_2);
    echo sum_of_array($table_2);

//znajdowanie największych i najmniejszych wartości tablicy
    function min_max_array($table){
        if(is_array($table)){
            $max_list = array();
            foreach($table as $row){
                array_push($max_list, max($row));
            }
            $max_array = max($max_list);
            $min_list = array();
            foreach($table as $row){
                array_push($min_list, min($row));
            }
            $min_array = min($min_list);
            return [$max_array, $min_array];
        }else{
            array_error();
        }
    }

//zmienianie wartości w tablicy na minimalne i maksymalne
    function min_max_alt($table){
        if(is_array($table)){
            $max_array = min_max_array($table)[0];
            $min_array = min_max_array($table)[1];
            $array_lenght = count($table[0]);
            for($i=0; $i<$array_lenght; $i++){
                $table[$i][$i] = $max_array;
            }
            for($k=0; $k<$array_lenght; $k++){
                $table[($k)][($array_lenght-$k-1)] = $min_array;
            }
            return $table;
        }else{
            array_error();
        }
    }
    $alt_table_1 = min_max_alt($table_1);
    echo display_array($alt_table_1);
    $alt_table_2 = min_max_alt($table_2);
    echo display_array($alt_table_2);

//zamienianie losowej wartości na wybranej tablicy na tekst (domyślnie "jaskółka afrykańska")
    function word_alt($table, $word='jaskółka afrykańska'){
        if(is_array($table) & is_string($word)){
            $table[rand(0,(count($table)-1))][rand(0,(count($table[0])-1))] = $word;
            return $table;
        }else{
            array_error();
        }
    }
//wyszukanie napisu i wyznaczenie jego długości
    function word_search($table){
        if(is_array($table)){
            foreach($table as $row){
                foreach($row as $col){
                    if(is_string($col)){
                        $string_len = strlen($col);
                        return "Ilość znaków w znalezionym stringu: $string_len";
                    }
                }
            }
        }else{
            array_error();
        }
    }
// wywowłanie obu funkci powyżej
    echo display_array(word_alt($alt_table_1));
    echo word_search(word_alt($alt_table_1,))
    
 ?> 
 </body>
</html>