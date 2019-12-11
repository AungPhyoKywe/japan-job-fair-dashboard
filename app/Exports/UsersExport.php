<?php

namespace App\Exports;

use App\CvReport;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return collect(CvReport::getUsers());
    }

    public function headings(): array
    {


        return [
            'ID',
            'Name',
            'Author',
            'Created At',
            'Updated At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $worksheet,Spreadsheet $spreadsheet) {



                $cellRange = 'A1:W1'; // All headers
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                ];

                $spreadsheet->getActiveSheet()->getStyle('A1:D4')
                    ->getAlignment()->setWrapText(true);
            },
        ];
    }
}
