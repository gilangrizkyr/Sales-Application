<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index-19231234-budi', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $saleDetails = collect(); 
        return view('sales.form-19231234-budi', compact('products', 'saleDetails'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        $saleDetails = SaleDetail::where('sale_id', $sale->id)->get();
        $total = $saleDetails->sum('total');

        return view('sales.form-19231234-budi', compact('sale', 'products', 'saleDetails', 'total'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $sale = Sale::create([
            'date' => $validatedData['date'],
            'total' => 0,
        ]);

        $product = Product::find($validatedData['product_id']);
        $total = $validatedData['quantity'] * $product->price;

        if ($product->stock < $validatedData['quantity']) {
            return redirect()->back()->withErrors(['quantity' => 'Stok tidak cukup']);
        }

        SaleDetail::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'quantity' => $validatedData['quantity'],
            'total' => $total,
        ]);

        $product = Product::find($validatedData['product_id']);
        if ($validatedData['quantity'] > $product->stock) {
            return redirect()->back()->withErrors(['quantity' => 'Jumlah melebihi stok yang tersedia.']);
        }


        $sale->total += $total;
        $sale->save();

        $product->stock -= $validatedData['quantity'];
        $product->save();

        return redirect()->route('sales.index');
    }


    public function destroyDetail($id)
    {
        $detail = SaleDetail::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail penjualan berhasil dihapus.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
