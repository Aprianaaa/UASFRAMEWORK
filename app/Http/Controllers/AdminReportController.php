<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminReportController extends Controller
{
    // ================= PDF =================
    public function pdf()
    {
        $orders = Order::with('user')
            ->where('status', 'Done')
            ->orderBy('created_at', 'desc')
            ->get();
$pdf = Pdf::loadView('admin.rekap_pdf', compact('orders'));
return $pdf->download('rekap-transaksi.pdf');

    }

public function excel()
{
    return Excel::download(new OrderExport, 'rekap-transaksi.xlsx');
}

}
