<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\SubText;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles=Title::orderBy('created_at','ASC')->get();
        return view('back.titles.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Insert view
        return view('back.titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insert Into
        $request->validate([
            'title'=>'min:3|required'
        ]);

        $isSlug = Title::where('slug',Str::slug($request->title))->first();

        if ($isSlug)
        {
            toastr()->error($request->title.' adında bir yazı zaten mevcut.');
            return redirect()->back();
        }

        $title=new Title();
        $title->hood=$request->title;
        $title->title_article=$request->conten;
        $title->slug=Str::slug($request->title);

        $title->save();
        toastr()->success('Başarılı', 'Yazı başırıyla oluşturuldu');
        return redirect()->route('admin.dagcilik.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Update view
        $title = Title::findOrFail($id);
        return view('back.titles.update',compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update İşlemleri.
        $request->validate([
            'title'=>'min:3|required'
        ]);
        $title = Title::findOrFail($id);

        $title->hood=$request->title;
        $title->title_article=$request->conten;
        $title->slug=Str::slug($request->title);

        $title->save();
        toastr()->success('Başarılı', 'Yazı başırıyla güncellendi.');
        return redirect()->route('admin.dagcilik.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        //Delete İşlemleri
        if ($request->id == 1 or $request->id == 2)
        {
            toastr()->error( 'Bu satır varsayılan olduğu için slinemez.','Başarısız');
            return redirect()->back();
        }

        $title = Title::findOrFail($request->id);
        SubText::where('title_id', $request->id)->delete();
        $title->delete();
        toastr()->success('Başarılı', 'Yazı başırıyla Silindi');
        return redirect()->route('admin.dagcilik.index');
    }
}
