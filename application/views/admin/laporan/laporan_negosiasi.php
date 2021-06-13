<?php
// buat dokumen baru
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
// setting informasi dokumen
$pdf->SetCreator('Parete');
$pdf->SetAuthor('Parete');
$pdf->SetTitle('Laporan Data Negosiasi');

// remove default header/footer
$pdf->setPrintHeader(false);

$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage('P');

$pdf->SetFont('times', '', 12);
$i = 0;
// set font
$html = '<h3 style="text-align: center;font-size: 14px;font-family: helvetica;color: #1c245d">Laporan Data Negosiasi</h3>
<h3 style="text-align: left;font-size: 10px;font-family: times;color: #000000">Dicetak : ' . date('d/m/Y') . '</h3>
        <table bgcolor="#ffffff" cellspacing="0" cellpadding="1" border="1">
            <tr bgcolor="#F2F3F4">
                <th width="6%" align="center">No</th>
                <th width="20%" align="center">Nama Pembantu</th>
                <th width="20%" align="center">Nama Majikan</th>
                <th width="20%" align="center">Total</th>
                <th width="15%" align="center">Status Negosiasi</th>
                <th width="20%" align="center">Tanggal Negosiasi</th>
            </tr>';
foreach ($negosiasi as $n) {
    $i++;
    $html .= '<tr bgcolor="#ffffff">
        <td align="center">' . $i . '.</td>
        <td align="center">' .  $n['nama_pembantu'] . '</td>
        <td align="center">' .  $n['nama_majikan'] . '</td>
        <td align="center">Rp ' . number_format($n['total'], 0, ".", ".") . '</td>
        <td align="center">' .  $n['status_negosiasi'] . '</td>
        <td align="center">' . $n['tanggal'] . '</td>
    </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Data Negosiasi.pdf', 'I');
