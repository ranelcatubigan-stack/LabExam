<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rice;
class RiceController extends Controller
{
    public function index()
    {
        $rices = Rice::all();
        return view('dashboard', ['rstore' => $rices]);
    }

    public function store(Request $request)
    {
        Rice::create([
            'name' => $request->name123,
            'type' => $request->type123,
            'price' => $request->price123,
            'quantity' => $request->quantity123,
            'description' => $request->description123,
        ]);
        return redirect('/dashboard');
    }

   public function edit($id)
    {
        $rice = Rice::findOrFail($id);
        $rstore = Rice::all();

        return view('dashboard-edit', compact('rice', 'rstore'));
    }
    public function update(Request $request, $id)
    {
        $rices = Rice::findorfail($id);
        $rices->update([
            'name' => $request->name123,
            'type' => $request->type123,
            'price' => $request->price123,
            'quantity' => $request->quantity123,
            'description' => $request->description123
        ]);
        return redirect('/dashboard');
    }
        public function destroy($id)
        {
            $rices = Rice::findorfail($id);
            $rices->delete();
            return redirect('/dashboard');
        }
}
