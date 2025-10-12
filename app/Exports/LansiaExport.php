<?php

namespace App\Exports;

use App\Models\Lansia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LansiaExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Lansia::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Tekanan Darah',
            'Tinggi Badan (cm)',
            'Berat Badan (kg)',
            'Alamat',
            'Nomor WA',
            'Tanggal Input'
        ];
    }

    public function map($lansia): array
    {
        return [
            $lansia->id,
            $lansia->nama_lengkap,
            $lansia->tekanan_darah ?? '-',
            $lansia->tinggi_badan ?? '-',
            $lansia->berat_badan ?? '-',
            $lansia->alamat ?? '-',
            $lansia->nomor_wa ?? '-',
            $lansia->created_at->format('d/m/Y H:i')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
