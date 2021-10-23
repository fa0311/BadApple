<?php
ini_set("memory_limit", "500M");
$data = file_get_contents("data/data.json");
$data = (array) json_decode($data, true);
$textlist = ["ち", "ん", "ぽ"];
$i = 0;
foreach ($data as $frame) {
    $output = "";
    $time_start = microtime(true);
    foreach ($frame as $row) {
        $output .= "\n";
        foreach ($row as $flag) {
            if ($flag == 1) {
                $output .= $textlist[$i % 3];
                $i++;
            } else {
                $output .= "　";
            }
        }
    }
    echo $output . "\033[" . count($data[0]) . "A";
    usleep(50000 - (microtime(true) - $time_start));
}