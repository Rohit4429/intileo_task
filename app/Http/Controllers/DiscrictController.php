<?php

namespace App\Http\Controllers;

use App\Models\Discrict;
use App\Models\Satate;
use Illuminate\Http\Request;
use DataTables;
use PDF;
class DiscrictController extends Controller
{
    public function index(){
        $state = Satate::get();
        return view('welcome',compact('state'));
    }

    public function store(Request $request){
        $request->validate([
            'state' =>'required',
            'district' => 'required'
        ]);

        $obj = new Discrict();
        $obj->state_id = $request->state;
        $obj->name = $request->district;
        $obj->save();
        return back();
    }
    public function update(Request $request){
        $request->validate([
            'state' =>'required',
            'district' => 'required'
        ]);

        $update = Discrict::find($request->id);
        $update->state_id = $request->state;
        $update->name = $request->district;
        $update->update();
        return redirect()->route('list');
    }

    public function list(Request $request){

        $state = Satate::get();
        if ($request->ajax()) {
            $data = Discrict::when($request->id != 'All',function($q)use($request){
                $q->where('state_id',$request->id);
            })->get();
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $edit=route('edit',$data->id);
                    $delete=route('delete',$data->id);

                    return "<div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='$edit' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Edit'>Edit</a>
                    <a href='$delete' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Delete'>Delete</a></div>";
                })

                ->rawColumns(['action'])
                ->make(true);
            }
            return view('list',compact('state'));
    }

    public function delete($id){
        $find = Discrict::find($id);

        if(!is_null($find)){
            $find->delete();
            return back();
        }
        return redirect()->route('list');
    }

    public function edit($id){
        $data = Discrict::find($id);
        if(!is_null($data)){
            $state = Satate::get();
            return view('update',compact(['data','state']));
        }
        return redirect()->route('list');
    }

    public function download(){
        $data = Discrict::with('state')->get();
        // dd($data);
        $pdf = PDF::loadView('pdf.report', ['data'=>$data]);

        return $pdf->download('report.pdf');

    }
}
