<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // Debugging untuk cek request
        // dd($request->all());

        $request->validate([
            'name'  => 'required|string|max:255|unique:products,name',
            'price' => 'required|integer|min:0', // Pastikan integer agar tidak desimal
            'stock' => 'required|integer|min:0',
        ]);

        try {
            Product::create([
                'name'  => $request->name,
                'price' => (int) $request->price, // Pastikan harga disimpan sebagai integer
                'stock' => $request->stock,
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan produk: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255|unique:products,name,' . $id,
            'price' => 'required|integer|min:0', // Pastikan integer
            'stock' => 'required|integer|min:0',
        ]);

        try {
            $product->update([
                'name'  => $request->name,
                'price' => (int) $request->price, // Pastikan harga disimpan sebagai integer
                'stock' => $request->stock,
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();
            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage());
        }
    }
}
