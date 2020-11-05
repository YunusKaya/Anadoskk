<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;
use App\Models\category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages=page::whereIn('catagory_id', [1, 2, 3])->get();
        return view('back.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = category::whereIn('id', [1, 2, 3])->get();
        return view('back.pages.create',compact('categories'));
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
            'title'=>'min:3|required',
            'category'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'conten'=>'min:10|required'
        ]);

        $isCategory = category::where('id',$request->category)->first();

        if (!$isCategory)
        {
            toastr()->error('Seçilen kategori veri tabanında bulunamadı.','Hata');
            return redirect()->back();
        }

        $page=new page();
        $page->catagory_id=$request->category;
        $page->hood=$request->title;
        $page->article=$request->conten;
        $page->slug=Str::slug($request->title);

        if($request->hasFile('image'))
        {
            $imageName = uniqid() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/img'), $imageName);
            $page->img = 'uploads/img/' . $imageName;
        }
        $page->save();
        toastr()->success( 'Yazı başırıyla oluşturuldu','Başarılı');
        return redirect()->route('admin.yazilar.index');
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
        //
        $categories = category::whereIn('id', [1, 2, 3])->get();
        $page = page::findOrFail($id);
        return view('back.pages.update',compact('page','categories'));
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
            'title'=>'min:3|required',
            'category'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'conten'=>'min:10|required'
        ]);

        $isSlug=page::where('slug',Str::slug($request->title))->whereNotIn('id',[$id])->first();

        if ($isSlug)
        {
            toastr()->error($request->title.' adında bir yazı zaten mevcut.');
            return redirect()->back();
        }

        $page=page::findOrFail($id);
        $page->catagory_id=$request->category;
        $page->hood=$request->title;
        $page->article=$request->conten;
        $page->slug=Str::slug($request->title);



        if($request->hasFile('image'))
        {
            if (File::exists($page->img))
            {
                File::delete(public_path($page->img));
            }
            $imageName = uniqid() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/img'), $imageName);
            $page->img = 'uploads/img/' . $imageName;
        }

        $page->save();
        toastr()->success( 'Yazı başırıyla güncellendi','Başarılı');
        return redirect()->route('admin.yazilar.index');
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
        $page=page::findOrFail($request->id);
        if (File::exists($page->img))
        {
            File::delete(public_path($page->img));
        }
        $page->delete();
        toastr()->success('Başarılı', 'Yazı başırıyla Silindi');
        return redirect()->route('admin.yazilar.index');
    }
}
