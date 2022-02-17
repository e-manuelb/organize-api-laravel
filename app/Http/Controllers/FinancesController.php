<?php

namespace App\Http\Controllers;

use App\Http\Resources\FinancesResource;
use App\Models\Finances;
use Illuminate\Http\Request;

class FinancesController extends Controller
{
    public function index()
    {
        $finances = Finances::paginate(15);
        return FinancesResource::collection($finances);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (Finances::create($data)) {
            return new FinancesResource($data);
        }
    }

    public function show($id)
    {
        $finance = Finances::findOrFail($id);
        return new FinancesResource($finance);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $finance = Finances::findOrFail($id);

        if ($finance->update($data)) {
            return new FinancesResource($data);
        }
    }

    public function destroy($id)
    {
        $finance = Finances::findOrFail($id);
        if ($finance->delete()) {
            return new FinancesResource($finance);
        }
    }
}
