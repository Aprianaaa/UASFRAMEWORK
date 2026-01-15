<?php


namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::where('status', 'done')
            ->get()
            ->map(function ($o) {
                return [
                    'ID'        => $o->id,
                    'Pelanggan' => $o->name ?? '-',
                    'Total'     => $o->total,
                    'Metode'    => strtoupper($o->payment_method ?? '-'),
                    'Status'    => $o->status,
                    'Tanggal'   => $o->created_at->format('d-m-Y'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pelanggan',
            'Total',
            'Metode',
            'Status',
            'Tanggal',
        ];
    }
}

