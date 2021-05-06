<?php defined('BASEPATH') or die('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_excel extends CI_Controller
{

    public function export($id_papa = null, $id_mama = null)
    {
        $kondisi = " id_superhero in (" . $id_papa . ", " . $id_mama . ")";
        $skill = $this->DataHandle->getAllWhere('v_skill_superhero', '*', $kondisi);

        $suami = $this->DataHandle->getAllWhere('ms_superhero', 'nama', ['id' => $id_papa])->row_array();
        $istri = $this->DataHandle->getAllWhere('ms_superhero', 'nama', ['id' => $id_mama])->row_array();
        $spreadsheet = new Spreadsheet;
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->mergeCells('A1:B1');
        $spreadsheet->getActiveSheet()->mergeCells('A2:B2');
        $spreadsheet->getActiveSheet()->mergeCells('A3:B3');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hasil Simulasi Pasangan Mutant');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', 'Suami : ' . $suami['nama'])
            ->setCellValue('A3', 'Istri : ' . $istri['nama']);


        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A4', 'No')
            ->setCellValue('B4', 'Nama Skill');

        $kolom = 5;
        $nomor = 1;
        foreach ($skill->result() as $baris) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $baris->nama_skill);

            $kolom++;
            $nomor++;
        }

        $styleJudul = [
            'font' => [
                'bold' => true,
                'name' => 'Calibri',
                'size' => 12
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $styleJudul2 = [
            'font' => [
                'bold' => true,
                'name' => 'Calibri',
                'size' => 12
            ],
        ];


        $spreadsheet->getActiveSheet()->getStyle('A1:B1')->applyFromArray($styleJudul);
        $spreadsheet->getActiveSheet()->getStyle('A2:B3')->applyFromArray($styleJudul2);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="simulasi-' . date('Y-m-d-h-i-s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
