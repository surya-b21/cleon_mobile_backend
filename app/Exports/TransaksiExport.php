<?php

namespace App\Exports;

use App\Models\Riwayat;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class TransaksiExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize, WithCustomValueBinder
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $transaksi = Riwayat::query()->select(['id_user', 'id_paket', 'created_at'])->orderByDesc('id')->get();

        foreach ($transaksi as $data) {
            $data->id_user =  DB::table('users')->select('name')->where('id', $data->id_user)->first()->name;
            $data->id_paket = DB::table('paket')->select('nama')->where('id', $data->id_paket)->first()->nama;
        }

        return $transaksi;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Paket',
            'Tanggal Pembelian'
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }
}
