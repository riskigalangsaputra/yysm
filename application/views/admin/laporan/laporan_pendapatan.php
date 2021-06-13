<?php
// buat dokumen baru
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
// setting informasi dokumen
$pdf->SetCreator('Parete');
$pdf->SetAuthor('Parete');
$pdf->SetTitle('Laporan Data Pendapatan');

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
$html = '<h3 style="text-align: center;font-size: 14px;font-family: helvetica;color: #1c245d">Laporan Data Pendapatan</h3>
<h3 style="text-align: left;font-size: 10px;font-family: times;color: #000000">Dicetak : ' . date('d/m/Y') . '</h3>
        <table bgcolor="#ffffff" cellspacing="0" cellpadding="1" border="1">
            <tr bgcolor="#F2F3F4">
                <th width="6%" align="center">No</th>
                <th width="20%" align="center">Kode Kontrak</th>
                <th width="20%" align="center">Tanggal Pembayaran</th>
                <th width="20%" align="center">No Rekening</th>
                <th width="15%" align="center">Nama Majikan</th>
                <th width="20%" align="center">Jumlah Pembayaran</th>
            </tr>';
foreach ($pendapatan as $p) {
    $i++;
    $html .= '<tr bgcolor="#ffffff">
        <td align="center">' . $i . '.</td>
        <td align="center">' .  $p['kd_kontrak'] . '</td>
        <td align="center">' .  $p['tanggal'] . '</td>
        <td align="center">' .  $p['no_rekening'] . '</td>
        <td align="center">' . $p['nama_majikan'] . '</td>
        <td align="center">Rp ' . number_format($p['biaya_admin'], 0, ".", ".") . '</td>
    </tr>';
}

foreach ($total_biaya_admin as $ba) {
$html .= '<tr bgcolor="#ffffff">
        <th colspan="5" align="center"><b>Total</b></th>
        <th colspan="1" align="center"><b>Rp ' . number_format($ba['total_biaya_admin'], 0, ".", ".") . '</b></th>
 </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Data Pendapatan.pdf', 'I');
