<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondation;
use Illuminate\Http\Request;

class TremsAndCondationController extends Controller
{
    public function trems_condation()
    {

        return view('Super.trems_condation.index', ['terms_condation' => TermsCondation::first()]);
    }

    public function trems_condation_update(Request $request)
    {
        $terms_condation  = TermsCondation::first();
        if ($terms_condation) {
            $terms_condation->update($request->all());
        } else {
            $terms_condation = TermsCondation::Create($request->all());
        }
        return redirect()->route('super.terms.condation')->with('success', 'Update Successfull!');
    }
}
