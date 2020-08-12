<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceEntered;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
	/**
	 * Nhập kho
	 */
    public function getWarehousing(Request $request)
	{
		$invoiceEntered = InvoiceEntered::with('suppliere','category');
        if ($request->time) {
            $time = $this->getStartEndTime($request->time,[]);
            $invoiceEntered->whereBetween('created_at', $time);
        }


        $invoiceEntered = $invoiceEntered->orderByDesc('id')
			->paginate(20);

		$viewData = [
			'invoiceEntered' => $invoiceEntered,
            'query' => $request->query()
		];

		return view('admin.inventory.import', $viewData);
	}

	/**
	 * Xuất kho
	 */
	public function getOutOfStock(Request $request)
	{
		$inventoryExport = Order::with('product');

        if ($request->time) {
            $time = $this->getStartEndTime($request->time,[]);
            $inventoryExport->whereBetween('created_at', $time);
        }

        $inventoryExport = $inventoryExport->orderByDesc('id')
			->paginate(20);

		$viewData = [
			'inventoryExport' => $inventoryExport,
            'query' => $request->query()
		];

		return view('admin.inventory.export', $viewData);
	}

    public function getStartEndTime($date_range, $config=[])
    {
        $dates = explode(' - ', $date_range);

        $start_date = date('Y-m-d 00:00:00', strtotime($dates[0]));
        $end_date = date('Y-m-d 23:59:59', strtotime($dates[1]));

        return [
            'start' => $start_date,
            'end' => $end_date
        ];
    }
}
