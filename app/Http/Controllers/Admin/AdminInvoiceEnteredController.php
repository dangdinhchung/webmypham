<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InvoiceEntered;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminInvoiceEnteredController extends Controller
{
    public function index()
    {
        $invoiceEntered = InvoiceEntered::with('suppliere','product')->orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'invoiceEntered' => $invoiceEntered
        ];

        return view('admin.invoice_entered.index', $viewData);
    }

    public function create()
    {
    	$suppliere = Supplier::all();
    	$products = Product::select('id','pro_name','pro_price','pro_number_import')->orderByDesc('id')->get();

        return view('admin.invoice_entered.create', compact('suppliere','products'));
    }

    public function store(Request $request)
    {
        $data               = $request->except('_token');
        $data['created_at'] =  Carbon::now();
        $productID = $request->ie_product_id;
        $product = Product::find($productID);

        $product->pro_number_import += $request->ie_number;
        $product->pro_number += $request->ie_number;
        $product->save();

        $invoiceEntered = $this->checkExistsInvoice($productID);
        $newMoney = $product->pro_number_import * $request->ie_money;
		$meta = [
			'price' => $request->ie_the_advance,
			'time' => Carbon::now()
		];
		$metaOld = [];
        if ($invoiceEntered) {
			$metaOld = json_decode($invoiceEntered->ie_meta ?? '', true) ?? [];
			$metaOld[] = $meta;
			$invoiceEntered->ie_number += $request->ie_number;
			$invoiceEntered->ie_total_money = $product->pro_number_import * $request->ie_money;
			$invoiceEntered->ie_meta = json_encode($metaOld);
			$invoiceEntered->save();
		}else{
			$metaOld[] = $meta;
			$data['ie_total_money'] = $newMoney;
			$data['ie_meta'] = json_encode($metaOld);
			$idInsert = InvoiceEntered::insertGetId($data);
		}

        return redirect()->back();
    }

    protected function checkExistsInvoice($productID)
	{
		return InvoiceEntered::where('ie_product_id', $productID)->first();
	}

    public function edit($id)
    {
        $invoiceEntered = InvoiceEntered::find($id);
		$suppliere = Supplier::all();
		$products = Product::select('id','pro_name','pro_price','pro_number_import')->orderByDesc('id')->get();
		return view('admin.invoice_entered.update', compact('suppliere','invoiceEntered','products'));
    }

    public function update(Request $request, $id)
    {
		$data               = $request->except('_token');
		$data['created_at'] =  Carbon::now();

		$productID = $request->ie_product_id;
		$product = Product::find($productID);
		$product->pro_number_import = $request->ie_number;
		$product->pro_number += $request->ie_number;
		$product->save();

		$meta = [
			'price' => $request->ie_the_advance,
			'time' => Carbon::now()
		];

		$invoiceEntered = $this->checkExistsInvoice($productID);
		$metaOld = json_decode($invoiceEntered->ie_meta ?? '', true) ?? [];
		$metaOld[] = $meta;
		$invoiceEntered->ie_number = $request->ie_number;
		$invoiceEntered->ie_total_money = $product->pro_number_import * $request->ie_money;
		$invoiceEntered->updated_at = Carbon::now();
		$invoiceEntered->ie_the_advance = $request->ie_the_advance;
		$invoiceEntered->ie_meta = json_encode($metaOld);
		$invoiceEntered->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $invoiceEntered = InvoiceEntered::find($id);
        if ($invoiceEntered) $invoiceEntered->delete();
        return redirect()->back();
    }
}
