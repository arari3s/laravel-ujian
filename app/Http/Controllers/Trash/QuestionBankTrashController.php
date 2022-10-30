<?php

namespace App\Http\Controllers\Trash;

use App\Http\Controllers\Controller;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuestionBankTrashController extends Controller
{
    public function trashquestinbank()
    {
        if (request()->ajax()) {
            $query = QuestionBank::with('user')->onlyTrashed()->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.trash-questionbank.restore', $item->id) . '">
                            Restore
                        </a>
                    ';
                })
                ->rawColumns(['action', 'question'])
                ->make();
        }

        return view('pages.trash.questionbank.index');
    }

    public function trashquestinbankrestore($id)
    {
        $data = QuestionBank::onlyTrashed()->where('id', $id);
        $data->restore();

        // alert
        alert()->success('Successfully Restore', 'Questint bank data has been successfully recovered!');

        return redirect()->route('dashboard.trash-questionbank.index');
    }
}
