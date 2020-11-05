<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\SubText;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SubtextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subtexts=SubText::orderBy('created_at','ASC')->get();
        return view('back.subtext.index',compact('subtexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $titles=Title::get();
        return view('back.subtext.create',compact('titles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'subtext'=>'min:3|required',
            'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'conten'=>'min:10|required'
        ]);

        $isSlug = SubText::where('slug',Str::slug($request->subtext))->first();

        if ($isSlug)
        {
            toastr()->error($request->subtext.' adında bir yazı zaten mevcut.');
            return redirect()->back();
        }

        $subtext=new SubText;
        $subtext->title_id=$request->title;
        $subtext->textsub=$request->subtext;
        $subtext->article=$request->conten;
        $subtext->slug=Str::slug($request->subtext);

        if($request->hasFile('image'))
        {

            $imageName= uniqid().$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/img'),$imageName);
            $subtext->img='uploads/img/'.$imageName;

        }
        else
        {
            $subtext->img="";
        }
        $subtext->save();
        toastr()->success('Başarılı', 'Makale başırıyla oluşturuldu');
        return redirect()->route('admin.altmetin.index');
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
        $subtext=SubText::findOrFail($id);
        if (File::exists($subtext->img))
        {
            File::delete(public_path($subtext->img));
        }
        $subtext->delete();
        toastr()->success('Başarılı', 'Alt Metin başırıyla Silindi');
        return redirect()->route('admin.altmetin.index');
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
        $subtext = SubText::findOrFail($id);
        $titles=Title::all();
        return view('back.subtext.update',compact('subtext','titles'));
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
        //

        $request->validate([
            'subtext'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $subtext=SubText::findOrFail($id);
        $subtext->title_id=$request->title;
        $subtext->textsub=$request->subtext;
        $subtext->article=$request->conten;
        $subtext->slug=Str::slug($request->subtext);

        if (File::exists($subtext->img))
        {
            File::delete(public_path($subtext->img));
        }
        if($request->hasFile('image'))
        {

            $imageName=Str::slug($request->subtext).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $subtext->img='uploads/'.$imageName;
        }
        $subtext->save();
        toastr()->success( 'Alt Metin başırıyla güncellendi','Başarılı');
        return redirect()->route('admin.altmetin.index');
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

}
