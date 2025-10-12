<?php

namespace App\Exports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BalitaExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Balita::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Tanggal Lahir',
            'Lingkar Kepala (cm)',
            'Berat Badan (kg)',
            'Tinggi Badan (cm)',
            'Imunisasi',
            'Nama Orang Tua',
            'Kontak Orang Tua',
            'Tanggal Input'
        ];
    }

    public function map($balita): array
    {
        return [
            $balita->id,
            $balita->nama_lengkap,
            $balita->tanggal_lahir->format('d/m/Y'),
            $balita->lingkar_kepala ?? '-',
            $balita->berat_badan ?? '-',
            $balita->tinggi_badan ?? '-',
            $balita->imunisasi ? implode(', ', $balita->imunisasi) : '-',
            $balita->nama_orang_tua ?? '-',
            $balita->kontak_orang_tua ?? '-',
            $balita->created_at->format('d/m/Y H:i')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
