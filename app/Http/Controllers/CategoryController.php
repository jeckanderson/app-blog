<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'name' => 'required'
        ]);

        Category::create($validateDate);
        return redirect('/category')->with('success', 'Data Category di Tambahkan');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('category')->with('success', 'Data Category di Hapus');
    }

    public function edit($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('data'));
    }
}
