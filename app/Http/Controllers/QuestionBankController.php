<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionBankRequest;
use App\Models\Answer;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class QuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = QuestionBank::with('user')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-sky-500 bg-sky-500 text-white rounded-md px-4 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-sky-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.questionbank.edit', $item->id) . '">
                            Edit
                        </a>
                    ';
                })
                ->editColumn('question', function ($item) {
                    return strip_tags($item->question);
                })

                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.questionbank.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.questionbank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionBankRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        // add to questionBank
        $questionbank = QuestionBank::create($data);

        // add to answer
        $status = $questionbank->answer()->createMany($data['answers'])->push();

        return redirect()->route('dashboard.questionbank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionBank $questionBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionBank $questionBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionBank $questionBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionBank $questionBank)
    {
        return abort(404);
    }
}
