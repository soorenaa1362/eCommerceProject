<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    
    
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index' , compact('brands'));
    }

    
    
    public function create()
    {
        return view('admin.brands.create');
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::create([
            'name' => $request->name,
            'is_active' => $request->is_active, 
        ]);

        alert()->success('برند جدید با موفقیت ایجاد شد .', 'انجام شد !');

        return redirect()->route('admin.brands.index');
        
    }

    
    
    public function show(Brand $brand)
    {
        return view('admin.brands.show' , compact('brand'));
    }

    
    
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit' , compact('brand'));
    }

    
    
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand->update([
            'name' => $request->name,
            'is_active' => $request->is_active, 
        ]);

        alert()->success('برند مورد نظر با موفقیت ویرایش شد .', 'انجام شد !');

        return redirect()->route('admin.brands.index');
    }

    
    
}
