<?php

$supportedOperators = ['+', '-', '*'];
$callHistory = [];
function calculateOperation(&$history, int $a, int $b, string $operation = '+') : int
{
    $history[] = $a . ' ' . $operation . ' ' . $b;
    if ($operation == '+') {
        return $a + $b;
    } elseif ($operation == '-') {
        return $a - $b;
    } elseif ($operation == '*') {
        return $a * $b;
    }
}

function parseOperator($userInput, $operator): bool|array
{
    $parseResult = explode($operator, $userInput);
    if($parseResult && count($parseResult) == 2){
        return ['operators' => $parseResult, 'operator' => $operator];
    }
    return false;
}

do{
    $userInput = readline('Введите выражение: ');
  if ($userInput == 'exit'){
      print_r($callHistory);
  }
  foreach ($supportedOperators as $operator) {
      $parseResult = parseOperator($userInput, $operator);
      if ($parseResult) {
         echo 'Результат = ' . calculateOperation( $callHistory, intval($parseResult['operators'][0]), intval($parseResult['operators'][1]), $parseResult['operator']) . PHP_EOL;
      }

  }
}while(true);


