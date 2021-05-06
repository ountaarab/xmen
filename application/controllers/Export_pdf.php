<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Export_pdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf_simulasi');
    }



    public function export($id_papa = null, $id_mama = null)
    {
        global $judul_laporan, $ket_tambahan;

        $fpdf = new Pdf_simulasi('L'); // FILE


        $kondisi = " id_superhero in (" . $id_papa . ", " . $id_mama . ")";
        $skill = $this->DataHandle->getAllWhere('v_skill_superhero', '*', $kondisi);

        $suami = $this->DataHandle->getAllWhere('ms_superhero', 'nama', ['id' => $id_papa])->row_array();
        $istri = $this->DataHandle->getAllWhere('ms_superhero', 'nama', ['id' => $id_mama])->row_array();

        $judul_laporan = 'Simulasi Nikah Mutant - Periode ' . date("d M Y h-i-s A");

        $ket_tambahan = 'Suami = ' . $suami['nama'] . ', Istri = ' . $istri['nama'];


        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->SetTitle($judul_laporan, $ket_tambahan);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(5, 6, 'No', 1, 0, 'C');
        $fpdf->Cell(200, 6, 'Nama Skill', 1, 1, 'C');
        $no = 1;
        foreach ($skill->result() as $baris) {

            $h = 10;
            $x = $fpdf->GetX();
            $fpdf->myCell(5, $h, $x, $no);
            $fpdf->SetFont('Arial', '', 10);
            $x = $fpdf->GetX();
            $fpdf->myCell(200, $h, $x, $baris->nama_skill);
            $fpdf->Ln();
            $no++;
        }

        $fileName = $judul_laporan . '.pdf';
        $fpdf->Output($fileName, 'D');
    }
}
