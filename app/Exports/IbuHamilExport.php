<?php

namespace App\Exports;

use App\Models\IbuHamil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IbuHamilExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return IbuHamil::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Usia Kehamilan (minggu)',
            'Berat Badan (kg)',
            'Tinggi Badan (cm)',
            'Lingkar Perut (cm)',
            'Lingkar Lengan (cm)',
            'Tekanan Darah',
            'Nomor WA',
            'Alamat',
            'Tanggal Input'
        ];
    }

    public function map($ibuHamil): array
    {
        return [
            $ibuHamil->id,
            $ibuHamil->nama_lengkap,
            $ibuHamil->usia_kehamilan,
            $ibuHamil->berat_badan ?? '-',
            $ibuHamil->tinggi_badan ?? '-',
            $ibuHamil->lingkar_perut ?? '-',
            $ibuHamil->lingkar_lengan ?? '-',
            $ibuHamil->tekanan_darah ?? '-',
            $ibuHamil->nomor_wa ?? '-',
            $ibuHamil->alamat ?? '-',
            $ibuHamil->created_at->format('d/m/Y H:i')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
