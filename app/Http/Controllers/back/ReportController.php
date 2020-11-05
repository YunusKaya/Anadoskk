<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activityreport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index()
    {
        $reports=activityreport::all();
        return view('back.rapor.index',compact('reports'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'date'=>'min:3|required',
            'ack'=>'required',
            'upload_file'=>'required|mimes:pdf'
        ]);

        $isSlug = activityreport::where('slug',Str::slug($request->ack))->first();

        if ($isSlug)
        {
            toastr()->error($request->ack.' adında bir rapor zaten mevcut.','Hata');
            return redirect()->back();
        }

        $report=new activityreport;
        $report->explanation=$request->ack;
        $report->explanationDate=$request->date;
        $report->slug=Str::slug($request->ack);


        $FileName = uniqid() . $request->upload_file->getClientOriginalName();
        $request->upload_file->move(public_path('uploads/report') , $FileName);
        $report->URL='uploads/report/'.$FileName;

        $report->save();
        toastr()->success('Başarılı', 'Rapor başırıyla oluşturuldu');
        return redirect()->route('admin.report.index');
    }

    public function getData(Request $request)
    {
        $report=activityreport::findOrFail($request->id);
        return response()->json($report);
    }

    public function update (Request $request)
    {

        $isSlug=activityreport::where('slug',Str::slug($request->ack2))->whereNotIn('id',[$request->id])->first();
        if ($isSlug)
        {
            toastr()->error($request->ack2.' adında bir rapor zaten mevcut.');
            return redirect()->back();
        }

        $report=activityreport::findOrFail($request->id);
        $report->explanation=$request->ack2;
        $report->explanationDate=$request->date2;
        $report->slug=Str::slug($request->ack2);

        if($request->hasFile('upload_file'))
        {

            $FileName = uniqid() . $request->upload_file->getClientOriginalName();
            $request->upload_file->move(public_path('uploads/report') , $FileName);
            $report->URL='uploads/report/'.$FileName;
        }

        $report->save();

        toastr()->success('Rapor başarıyla güncellendi');
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $report = activityreport::findOrFail($request->id);
        if (File::exists($report->URL))
        {
            File::delete(public_path($report->URL));
        }
        $report->delete();
        toastr()->success('Rapor başarıyla silindi','Başarılı');
        return redirect()->back();
    }

    public function deneme()
    {
        return "doğru";
    }
}
