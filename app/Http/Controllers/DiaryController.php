<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiaryResource;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $diaries = Diary::where('user_id', $id)->get();
        return new DiaryResource($diaries);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (Diary::create($data)) {
            return new DiaryResource($data);
        }
    }

    public function show($id)
    {
        $diary = Diary::findOrFail($id);
        return new DiaryResource($diary);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $diary = Diary::findOrFail($id);

        if ($diary->update($data)) {
            return new DiaryResource($data);
        }
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        if ($diary->delete()) {
            return new DiaryResource($diary);
        }
    }
}
