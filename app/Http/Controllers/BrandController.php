<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function index(){
        return view('admin.brand.index', [
            'brands' => brand::all(),
        ]);
    }
    public function savebrand(Request $request){
        brand::savebrand($request);
        if($request ->brand_id){
            return redirect(route('brand.add'))->with('message', 'brand updated successfully');
        }
        else{
            return redirect(route('brand.add'))->with('message', 'brand saved successfully');
        }
    }
    public function edit($id){
        return view('admin.brand.edit-brand',[
            'brands' => brand::all(),
            'brand' => brand::find($id),
        ]);
    }
    public function status($id){
        brand::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function delete(Request $request){
        brand::brandDelete($request);
        return back()->with('message', 'brand deleted successfully.');
    }
}
