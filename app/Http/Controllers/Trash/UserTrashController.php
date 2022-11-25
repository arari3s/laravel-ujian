<?php

namespace App\Http\Controllers\Trash;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserTrashController extends Controller
{
    public function trashuser()
    {
        if (request()->ajax()) {
            $query = User::onlyTrashed();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.trash-user.restore', $item->id) . '">
                            Restore
                        </a>
                    ';
                })
                ->editColumn('deleted_at', function ($item) {
                    return date_format($item->deleted_at, 'Y/m/d H:i');
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.trash.user.index');
    }

    public function trashuserrestore($id)
    {
        $data = User::onlyTrashed()->where('id', $id);
        $data->restore();

        // alert
        alert()->success('Successfully Restore', 'User data has been successfully recovered!');

        return redirect()->route('dashboard.trash-user.index');
    }
}
