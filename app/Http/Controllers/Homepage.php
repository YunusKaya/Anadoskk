<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

use App\Models\Article;
use App\Models\Title;
use App\Models\SubText;
use App\Models\activityreport;
use App\Models\category;
use App\Models\contact;
use App\Models\page;
use App\Models\Users;
use App\Models\LikeDislike;
use App\Models\Follow;

class Homepage extends Controller
{
    public  function __construct()
    {
        view()->share('catagories',category::whereIn('id', [1, 2, 3])->get());
    }
    public function index()
    {
        return view('front.index');
    }
    public function dagcilik()
    {
        $data['titles']=Title::with('getSubtext')->get();
        return view('front.dagcilik',$data);
    }
    public function rapor()
    {
        $data['reports']=ActivityReport::paginate(2) ;
        //dd($data['reports']);
        return view('front.raporfaliyet',$data) ;
    }
    public function yazilar()
    {
        $data['pages']=page::where('catagory_id','<',4)->orderBy('created_at','DESC')->paginate(4) ;
        return view('front.yazilar',$data);
    }
    public function category($categorySlug)
    {
        $cata=category::where('slug',$categorySlug)->first() ?? abort(403,'Forbidden category-first') ;
        $data['catagory']=$cata;
        $data['pages']=page::where('catagory_id',$cata->id)->orderBy('created_at','DESC')->paginate(4) ?? abort(403,'Forbidden category-paginate') ;
        return view('front.category',$data);
    }
    public function single($slug,$id)
    {
        $data['pages']=page::where('id',$id)->where('slug',$slug)->get() ?? abort(403,'Forbidden single-get') ;
        return view('front.single',$data);
    }

    public function iletisim()
    {
        return view('front.iletisim');
    }

    public function contactpost(Request $request)
    {
        $rules=[
            'firstname'=>'required|min:3',
            'lastname'=>'required|min:3',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required|min:10'
        ];
        $validate=Validator::make($request->post(),$rules);
        if ($validate->fails())
        {
            return redirect()->route('iletisim')->withErrors($validate)->withInput();
        }

        $contact = new contact;
        $contact->firstName=$request->firstname;
        $contact->lastName=$request->lastname;
        $contact->Subject=$request->subject;
        $contact->email=$request->email;
        $contact->Message=$request->message;
        $contact->save();

        Mail::send
        ([],[],
            function ($message) use ($request)
            {
                $name = $request->firstname.' '.$request->lastname;
                $message->from('iletisim@blogsitesi.com','Anadosk');
                $message->to('iletisim@blogsitesi.com');
                $message->setBody(' Mesajı göndere: '.$name.'<br/>
                                Mesajı Gönderen Mail: '.$request->email.'<br/>
                                Mesaj Konusu: '.$request->subject.'<br/>
                                Mesaj: '.$request->message.'<br/> <br/>
                                Tarih:'.date('d.m.Y H:i:s'),'text/html');
                $message->subject($name.' iletişimden mesaj gönderdi');

            }
        );


        return redirect()->route('iletisim')->with('success','Mesajınız başarı bir şekilde iletildi');
        //return print_r($request->post());
    }

    public function article()
    {
        $articles=Article::where('flag',1)->paginate(10);
        return view('front.article',compact('articles'));
    }

    public function articledetail($slug)
    {
        $article = Article::where('slug',$slug)->where('flag',1)->first() ?? abort(403,'Forbidden article detail') ;
        if (Auth::check())
        {
            $islike = LikeDislike::where('user_id',Auth::user()->id)->where('articles_id',$article->id)->first();
            if ($islike)
            {
                if ($islike->statu == 1)
                {
                    $islike = 'like';
                }
                else
                {
                    $islike = 'dislike';
                }
            }
            return view('front.articledetails',compact('article','islike'));
        }

        return view('front.articledetails',compact('article'));
        //return "slug: ".$slug."<br> writer id: ".$writer."<br> category: ".$category;
    }

    public function likedislike($slug,$status)
    {
        if (Auth::check())
        {
            $article = Article::where('slug',$slug)->first() ?? abort(403,'Forbidden like-dislike') ;
            $likedislike = LikeDislike::where('articles_id',$article->id)->where('user_id',Auth::user()->id)->first();
            if ($likedislike)
            {
                if ($likedislike->statu == 1 && $status == 'like') // like = 1
                {
                    $likedislike->delete();
                }
                elseif ($likedislike->statu == 1 && $status == 'dislike')
                {
                    $likedislike->statu = 0;
                    $likedislike->save();
                }
                elseif ($likedislike->statu == 0 && $status == 'like')
                {
                    $likedislike->statu=1;
                    $likedislike->save();
                }
                elseif ($likedislike->statu == 0 && $status == 'dislike')
                {
                    $likedislike->delete();
                }
                else
                {
                    return redirect()->route('article.detail',$slug)->with('message','Beklenmedik Hata...');
                }
            }
            else
            {
                $newlike = new LikeDislike();
                $newlike->user_id = Auth::user()->id;
                $newlike->articles_id = $article->id;
                if ($status == 'dislike')
                {
                    $newlike->statu = 0;
                }
                else
                {
                    $newlike->statu = 1;

                }
                $newlike->save();
            }
            return redirect()->route('article.detail',$slug);
        }
        else
        {
            return redirect()->route('article.detail',$slug)->with('message','Lütfen kullanıcı girişi yapınız...');
        }
    }

    public  function myinfo()
    {
        return view('front.myinfo');
    }

    public function ImagePost(Request $request)
    {
        if ($request->ajax())
        {
            $image_data = $request->image;
            $image_array_1 = explode(";",$image_data);
            $image_array_2 = explode(",",$image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = uniqid().time().'.jpg';
            $upload_path = public_path('uploads/crop/'.$image_name);
            file_put_contents($upload_path,$data);

            if (File::exists(Auth::user()->img))
            {
                File::delete(public_path(Auth::user()->img));
            }

            Auth::user()->img ='uploads/crop/'.$image_name;
            Auth::user()->save();

            return $upload_path;
        }
    }

    public function myInfoPost(Request $request)
    {
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|email',
        ];
        $validate=Validator::make($request->post(),$rules);
        if ($validate->fails())
        {
            return redirect()->route('my.info')->withErrors($validate)->withInput();
        }

        $user = Users::where('id','<>',Auth::user()->id)->where('email',$request->email)->first();
        if (!$user)
        {
            Auth::user()->name = $request->name;
            Auth::user()->email = $request->email;
            Auth::user()->biography = $request->biografi;
            Auth::user()->save();
            return redirect()->route('my.info')->with('success','Bilgileriniz başarıyla güncellendi...');
        }
        else
        {
            return redirect()->route('my.info')->with('danger',($request->email.' bu email adresi kullanılmaktadır. Lütfen başka bir email adresi giriniz.'));
        }
    }
    public function getpassword()
    {
        return view('front.mypassword');
    }

    public function getpasswordpost(Request $request)
    {
        //dd($request->post());
        $rules=[
            'newpassword'=>'required|min:6',
            'repeatpassword'=>'required|min:6',

        ];

        $validate=Validator::make($request->post(),$rules);
        if ($validate->fails())
        {
            return redirect()->route('my.get.password')->withErrors($validate)->withInput();
        }

        if ($request->newpassword == $request->repeatpassword)
        {
            Auth::user()->password = bcrypt($request->newpassword);
            Auth::user()->save();
            return redirect()->route('my.get.password')->with('success','Şifreniz başarıyla güncellendi.');
        }
        else
        {
            return redirect()->route('my.get.password')->with('danger','Şifre kombinasyonu birbiri ile eşleştirilemedi.');
        }
    }
    public function getlike()
    {
        $likes = LikeDislike::where('user_id',Auth::user()->id)->where('statu',1)->get();
        return view('front.getLike',compact('likes'));
    }

    public function follow()
    {
        $follows = Follow::where('user_id',Auth::user()->id)->get();
        return view('front.follow',compact('follows'));
    }

    public function unfollow($slug)
    {
        return "unfollow: ".$slug;
    }


    public function writer()
    {
        $writers = null;
        $follows = null;
        $unfollows =null;
        if (!Auth::check()) {
            $writers = Users::where('role', 'writer')->get();
        }
        else{
            $follows = Follow::where('user_id',Auth::user()->id)->get();
            $array = $follows->pluck('writer_id');
            $unfollows = Users::where('role','writer')->whereNotIn('id',$array)->get();
        }
        return view('front.writers',compact('writers','follows','unfollows'));
    }

    public function writer_profiles($slug)
    {
        $writer = Users::where('slug',$slug)->first() ?? abort(403,'Forbidden writer_profiles');
        $article = Article::where('writer_id',$writer->id)->get();
        $array = $article->pluck('id');
        $likedislikes = LikeDislike::select('statu',DB::raw('count(*) as total'))->whereIn('articles_id',$array)->groupBy('statu')->orderby('statu','desc')->get() ?? abort(403,'Sayfa Bulunamadı');
        return view('front.writerprofiles',compact('writer','likedislikes'));
    }
}
