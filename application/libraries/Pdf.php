<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/TCPDF-6.3.5/tcpdf.php';

class Pdf extends TCPDF
{
    // public function __construct()
    // {
    //     require_once APPPATH . '/third_party/fpdf/fpdf.php';
    // }

    function __construct()
    {
        parent::__construct();
    }
}
