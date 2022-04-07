<?php
include("checks.php");
require('tfpdf/tfpdf.php');
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'ОС', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Название", "Тип оборудования", "Разрядность", "Разработчик", "Цифровой ключ", "Дата приобретения", "Дата окончания", "URL магазина");
$w = array(6, 20, 25, 20, 30, 30, 20, 20, 25);
$h = 20;
for ($c = 0; $c < 9; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        os.name_os as name_os,
        os.type_os as type_os,
        os.x_os as x_os,
        os.dev_os as dev_os,
        dk.key_os,
        dk.date_buy,
        dk.date_ex,
        ds.url as url
        FROM dk
        LEFT JOIN os ON dk.id_os=os.id_os
        LEFT JOIN ds ON dk.id_ds=ds.id_ds"
);

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 9; $c++) {
            if ($c == 6 || $c == 7) {
                $row[$c - 1] = date('d-m-Y', strtotime($row[$c - 1]));
            }
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'OS.pdf', true);
?>