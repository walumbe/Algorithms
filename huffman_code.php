<!DOCTYPE html>
<html>
    <body>
        <?php
            $extract = 'Moi Univesity';
            $characters = count_chars($extract, 1);            
            asort($characters);
            foreach($characters as $character => $occurrence)
            {
               echo 'There';
               if($occurrence > 1)
               {
                   echo ' were ' . $occurrence . ' occurrences of ';
               }
               else
               {
                   echo ' was '. $occurrence . ' occurrence of ';
               }
               echo '"<strong>' . chr($character) . '</strong>" in the extract.<br />';
               $characterFreq[chr($character)] = $occurrence;              
            }
            print_r($characterFreq);
        ?>
    </body>
</html>