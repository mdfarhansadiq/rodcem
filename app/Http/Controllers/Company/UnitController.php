<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $data = Unit::where('company_id', auth('company')->id())->latest()->get();
        return view('Company.unit.index', compact('data'));
    }

    public function create()
    {
        return view('Company.unit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|max:50',
        ]);
        Unit::create([
            'name'         => $request->name,
            'company_id'   => auth('company')->id(),
            'symbol'       => $request->symbol,
        ]);
        return redirect(route('company.unit.index'))->with('success', 'Unit created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Unit::find($id);
        return view('Company.unit.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Unit::find($id)->update(
            $request->validate([
                'name'   => 'required|max:50',
            ])
        );
        return redirect(route('company.unit.index'))->with('success', 'Unit updated successfully.');
    }

    public function destroy($id)
    {
        Unit::destroy($id);
        session()->flash('success', 'Unit deleted successfully.');
        return true;
    }
}
