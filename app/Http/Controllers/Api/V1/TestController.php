<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Name;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $names = Name::all();
        return $names;
    }

    public function store(Request $request)
    {
        $name = Name::query()->create($request->all());
        return $name;
    }

    public function show($id)
    {
        $name = Name::query()->findOrFail($id);
        return $name;
    }


    public function update(Request $request, $id)
    {
        $name = Name::query()->findOrFail($id);
        $name->update($request->all());
        return $name;
    }

    public function destroy($id)
    {
        $name = Name::query()->findOrFail($id);
        $name->delete();
        return '';
    }
}
