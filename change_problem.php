<?php 

// array (number of different coins) 
function minCoins($coins, $size_of_coins, $change) 
{ 
    // table[i] will be storing the 
    // minimum number of coins 
    // required for i value. So  
    // table[V] will have result 
    $table[$change + 1] = array(); 
  
    // Base case (If given 
    // value V is 0) 
    $table[0] = 0; 
  
    // Initialize all table  
    // values as Infinite 
    for ($i = 1; $i <= $change; $i++) 
        $table[$i] = PHP_INT_MAX; 
  
    // Compute minimum coins  
    // required for all 
    // values from 1 to V 
    for ($i = 1; $i <= $change; $i++) 
    { 
        // Go through all coins 
        // smaller than i 
        for ($j = 0; $j < $size_of_coins; $j++) 
        if ($coins[$j] <= $i) 
        { 
            $sub_res = $table[$i - $coins[$j]]; 
            if ($sub_res != PHP_INT_MAX &&  
                $sub_res + 1 < $table[$i]) 
                $table[$i] = $sub_res + 1; 
        } 
    } 
    return $table[$change]; 
} 
  
// Driver Code 
$coins = array(1,5,10,20,40,50,100,200,500); 
$size_of_coins = sizeof($coins); 
$change = 5; 
echo "Minimum coins required is ", 
    minCoins($coins, $size_of_coins, $change); 
  
?> 
