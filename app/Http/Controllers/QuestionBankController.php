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
                        <a class="inline-block border border-amber-500 bg-amber-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-amber-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.questionbank.show', $item->id) . '">
                            Show
                        </a>

                        <form class="inline-block" action="' . route('dashboard.questionbank.destroy', $item->id) . '" method="POST">
                            <button class="border border-rose-500 bg-rose-500 text-white rounded-md px-2 py-1 font-semibold transition duration-500 ease select-none hover:bg-rose-800 focus:outline-none focus:shadow-outline" >
                                Hapus
                            </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                    ';
                })

                ->rawColumns(['action', 'question'])
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

        // dd($data);

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
    public function show(QuestionBank $questionbank)
    {
        return view('pages.questionbank.show', compact('questionbank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionBank $questionbank)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionBankRequest $request, QuestionBank $questionbank)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionBank $questionbank)
    {
        $questionbank->delete();

        // alert
        alert()->success('Successfully Delete', 'Question bank data deleted successfully!');

        return redirect()->route('dashboard.questionbank.index');
    }

    public function questionUploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $originName = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileName = $fileName . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->move(public_path('storage/images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
