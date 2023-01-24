<?php
$data = stream_get_contents(STDIN);
// Fixed xml data, because element ss:Table isn't correct
$data = str_replace("ss:Table", "History", $data);
$xml = simplexml_load_string($data) or die("Error: Cannot create XML object");

$fp = STDOUT;
foreach ($xml->Worksheet->History->Row as $row) {
    $line = [
        isset($row->Cell[0]) ? trim($row->Cell[0]->Data) : '',
        isset($row->Cell[1]) ? trim($row->Cell[1]->Data) : '',
        isset($row->Cell[2]) ? trim($row->Cell[2]->Data) : '',
        isset($row->Cell[3]) ? trim($row->Cell[3]->Data) : '',
        isset($row->Cell[4]) ? trim($row->Cell[4]->Data) : '',
    ];

    if(isset($row->Cell[5])) {
        $line[] = trim($row->Cell[5]->Data);
    }

    fputcsv($fp, $line);
}

fclose($fp);
exit(0);