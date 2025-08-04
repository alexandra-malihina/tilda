<?php
// Задание №1
$i = 1;
$level = 1;
$counter = 1;

for ($i = 1; $i <= 100; $i++) {
    echo $i;
    if ($counter == $level) {
        echo PHP_EOL;
        $counter = 0;
        $level++;
    } else {
        echo str_repeat(' ', $i < 10 ? 3 : 2);
    }
    $counter++;
}

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

// Задание №2
$str = str_repeat('1', 1000);

$data = [
    'data' => [],
    'sum_i' => array_fill(0, 5, 0),
    'sum_j' => array_fill(0, 7, 0)
];
$i = 0;
$j = 0;

while ($i < 5 && $j < 7) {
    $rand_val = rand(0, 1000);

    if ($str[$rand_val] == '1') {
        $val = $rand_val + 1;
        $data['data'][$i][$j] = $val;
        $data['sum_i'][$i] += $val;
        $data['sum_j'][$j] += $val;
        $j++;

        if ($j == 7) {
            $j = 0;
            $i++;
            echo PHP_EOL;
        }
        $str[$rand_val] = '0';
    }
}


echo PHP_EOL;
echo PHP_EOL;
echo 'j\i   ' . str_repeat(' ', 5 * 7);
echo 'sum_i';
echo PHP_EOL;
echo '      ';
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 7; $j++) {
        echo $data['data'][$i][$j];
        echo str_repeat(' ', (5 - strlen($data['data'][$i][$j])));
        if ($j == 6) {
            echo $data['sum_i'][$i];
            echo PHP_EOL;
            echo '      ';
        }
    }
}
echo PHP_EOL;
echo 'sum_j ';
for ($j = 0; $j < 7; $j++) {
    echo $data['sum_j'][$j];
    echo str_repeat(' ', (5 - strlen($data['sum_j'][$j])));
}
