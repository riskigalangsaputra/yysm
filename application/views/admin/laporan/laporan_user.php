<?php
// buat dokumen baru
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
// setting informasi dokumen
$pdf->SetCreator('Parete');
$pdf->SetAuthor('Parete');
$pdf->SetTitle('Laporan Data User');

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
$html = '<h3 style="text-align: center;font-size: 14px;font-family: helvetica;color: #1c245d">Laporan Data User</h3>
<h3 style="text-align: left;font-size: 10px;font-family: times;color: #000000">Dicetak : ' . date('d/m/Y') . '</h3>
        <table bgcolor="#ffffff" cellspacing="0" cellpadding="1" border="1">
            <tr bgcolor="#F2F3F4">
                <th width="6%" align="center">No</th>
                <th width="20%" align="center">Username</th>
                <th width="20%" align="center">Nama Lengkap</th>
                <th width="20%" align="center">Email User</th>
                <th width="15%" align="center">Telepon</th>
                <th width="20%" align="center">Alamat lengkap</th>
            </tr>';
foreach ($user as $u) {
    $i++;
    $html .= '<tr bgcolor="#ffffff">
        <td align="center">' . $i . '.</td>
        <td align="center">' .  $u['username'] . '</td>
        <td align="center">' .  $u['nama_lengkap'] . '</td>
        <td align="center">' .  $u['email'] . '</td>
        <td align="center">' .  $u['telepon'] . '</td>
        <td align="center">' . $u['alamat_lengkap'] . '</td>
    </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Data User.pdf', 'I');
