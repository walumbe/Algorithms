<?php
  function leastChange($coin_value,$inventory,$price){
    $n = count($inventory);
    $have = 0;
    for ($i=0; $i<$n; $i++){
      $have += $inventory[$i] * $coin_value[$i];
    }

    $stack = [[0,$price,$have,[]]];
    $best = [-max($coin_value),[]];

    while (!empty($stack)){

      // each stack call traverses a different set of parameters
      $parameters = array_pop($stack);
      $i = $parameters[0];
      $owed = $parameters[1];
      $have = $parameters[2];
      $result = $parameters[3];

      // base case
      if ($owed <= 0){
        if ($owed > $best[0]){
          $best = [$owed,$result];
        } else if ($owed == $best[0]){

          // here you can add a test for a smaller number of coins

          $best[] = $result;
        }
        continue;
      }

      // skip if we have none of this coin
      if ($inventory[$i] == 0){
        $result[] = 0;
        $stack[] = [$i + 1,$owed,$have,$result];
        continue;
      }

      // minimum needed of this coin
      $need = $owed - $have + $inventory[$i] * $coin_value[$i];

      if ($need < 0){
        $min = 0;
      } else {
        $min = ceil($need / $coin_value[$i]);
      }

      // add to stack
      for ($j=$min; $j<=$inventory[$i]; $j++){
        $stack[] = [$i + 1,$owed - $j * $coin_value[$i],$have - $inventory[$i] * $coin_value[$i],array_merge($result,[$j])];
        if ($owed - $j * $coin_value[$i] < 0){
          break;
        }
      }
    }

    return $best;
  }
?>