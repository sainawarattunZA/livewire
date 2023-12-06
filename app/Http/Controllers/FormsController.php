<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function create(Request $request)
    {
        $request->request->remove('_token');
        $item = new Form();
        $item->form_id = $request->form_id;
        $request->request->remove('form_id');
        $item->form = @json_encode($request->all());

        $item->save();
        return redirect()->route('filament.admin.pages.show-form');
    }
}
