
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Fpdf\Fpdf;

class Pdf_simulasi extends FPDF
{

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
    }

    function Header()
    {
        global $judul_laporan, $ket_tambahan;
        $lebar = $this->w;
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(270, 5, '', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(270, 5, $judul_laporan, 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(270, 5, '', 0, 1, 'C');
        $this->SetLineWidth(0.9);
        $this->Line(10, 25, 280, 25);
        $this->SetLineWidth(0.2);
        $this->Line(10, 26, 280, 26);
        $this->SetFont('Arial', '', 10);
        $this->Cell(250, 9, $ket_tambahan, 0, 1, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Cell(10, 4, '', 0, 1);
    }


    function Footer()
    {
        $this->SetY(-15);
        $lebar = $this->w;
        $this->SetFont('Arial', 'I', 8);
        $this->line($this->GetX(), $this->GetY(), $this->GetX() + $lebar - 20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);
        $this->Ln(1);
        $hal = 'hal : ' . $this->PageNo() . '/{nb}';
        $this->Cell($this->GetStringWidth($hal), 10, $hal);
        $sekarang = substr(date('Y-m-d'), 0, 10);

        $tanggal  = 'Export :' . $sekarang . ' ' . date('H:i:s A');
        $this->Cell($lebar - $this->GetStringWidth($hal) - $this->GetStringWidth($tanggal) - 20);
        $this->Cell($this->GetStringWidth($tanggal), 10, $tanggal);
    }

    function myCell($w, $h, $x, $t, $ket = null)
    {
        $height = $h / 3;
        $first = $height + 2;
        $second = $height + $height + $height + 3;
        $len = strlen($t);

        if ($ket == null) :
            $limit = 200;
        else :
            $limit = 200;
        endif;
        if ($len > $limit) {
            $txt = str_split($t, $limit);
            $this->SetX($x);
            $this->Cell($w, $first, $txt[0], '', '', '');
            $this->SetX($x);
            $this->Cell($w, $second, $txt[1], '', '', '');
            $this->SetX($x);
            $this->Cell($w, $h, '', 'LTRB', 0, 'L', 0);
        } else {
            $this->SetX($x);
            $this->Cell($w, $h, $t, 'LTRB', 0, 'L', 0);
        }
    }
}
?>