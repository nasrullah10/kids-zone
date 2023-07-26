<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articletbl;
use App\Models\cstorytbl;
use DB;
use App\Models\allcategorytbl;
use App\Models\announcementtbl;
use App\Models\learningtiptbl;
use App\Models\cltesttbl;
use App\Models\storyleveltbl;
use App\Models\round1storytbl;
use App\Models\round2storytbl;
use App\Models\round3storytbl;
use App\Models\topictbl;
use App\Models\gradetbl;
use App\Models\categorytbl;
use App\Models\admintesttbl;
use App\Models\questiontbl;
use App\Models\answertbl;

class UserController extends Controller
{
    
    public function userlayout()
    {
        $checksession = session('cname');
        if($checksession)
        {
            return view('user.userlayout');
        }

        else
        {
            return redirect("/login");
        }
    }


    public function clogout()
    {
        session()->forget('cname');
        session()->forget('cid');
        return redirect("login");
    }

            //+++++++++++++++++++++++++++++++++++Article Start
            public function uarticle_get()
            {
               $checksession = session('cname');
               $checkid = session('cid');
               if($checksession)
               {
                   $fetcharticle = allcategorytbl::all();
                   return view('user.article.article',compact('fetcharticle'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
            public function uarticle_post(Request $req)
            {
               $checksession = session('cname');
               $checkid = session('cid');
               if($checksession)
               {
                   $article = new articletbl();
                   $article->type = $req->insertarticletype;
                   $article->headline = $req->insertarticleheadline;
                   $article->art_date = $req->insertarticledate;
                   $article->short_Des = $req->insertarticleshortdes ?? "null";
                   $article->long_des = $req->insertarticlelongdes ?? "null";
                   if($req->file('insertarticleimage'))
                   {
                   $a_image=$req->file('insertarticleimage');
                   $ext = rand().".".$a_image->getClientOriginalName();
                   $a_image->move('articleimages/',$ext);
                   $article->image=$ext;
                   }
                   else
                   {
                   $article->image = "null";
                   }
                   $article->userid = $checkid;
                   $article->video_url = $req->insertarticleurl ?? "null";
                   $article->save();
                   return redirect('ufetcharticle')->with('mesg', "Article Has Been Added...");
               }
               else
               {
                   return redirect("/login");
               }
           }
       
            public function ufetch_article()
            {
               $checksession = session('cname');
               $checkid = session('cid');
               if($checksession)
               {
                   $fetcharticle = articletbl::where('userid',$checkid)->paginate(6);
                   return view('user.article.fetch_article', compact('fetcharticle'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function uedit_article($id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $fetchcat = allcategorytbl::all();
                   $update_article = articletbl::find($id);
                   return view('user.article.edit_article', compact('update_article','fetchcat'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function uupdate_article(Request $req, $id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $article = articletbl::find($id);
                   $article->type = $req->updatearticletype;
                   $article->headline = $req->updatearticleheadline;
                   $article->art_date = $req->updatearticledate;
                   $article->short_Des = $req->updatearticleshortdes?? "null";
                   $article->long_des = $req->updatearticlelongdes ?? "null";
                   if($req->file('updatearticleimage'))
                   {
                   $image=$req->file('updatearticleimage');
                   $ext = rand().".".$image->getClientOriginalName();
                   $image->move('articleimages/',$ext);
                   $article->image=$ext;
                   }
                   else
                   {
                       $article->image = $article->image;
                   }
                   $article->video_url = $req->updatearticleurl ??  "null";
                   $article->update();
                   return redirect('/ufetcharticle')->with('mesg', "Article Has Been Updated...");
                   }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function udelete_article($id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $delete_article = articletbl::find($id);
                   $delete_article->delete();
                   return redirect('ufetcharticle')->with('mesg', "Article Has Been Deleted...");
               }
               else
               {
                   return redirect("/login");
               }
           }
            //Article End
       
       
             //++++++++++++++++++++++++++STORY+++++++++++++++++++++++++++
           public function ustory()
           {
       
               $checksession = session('cname');
               $checkid = session('cid');
               if($checksession)
               {
                   $fetchcat = allcategorytbl::all();
                   $fetchstory = cstorytbl::where('userid',$checkid)->paginate(6);
                   return view('user.story.story', compact('fetchstory','fetchcat'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function ustory_get()
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $fetchcat = allcategorytbl::all();
                   return view('user.story.storycreate',compact('fetchcat'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function ustorycreatepost(Request $req)
           {
               $checksession = session('cname');
               $checkid = session('cid');
               if($checksession)
               {
                   $story = new cstorytbl();
                  
                   //$story->userid =$uname;
                   $story->type = $req->insertstorytype;
                   $story->Title = $req->insertstorytitle;
                   $story->typefic = $req->inserttypef;
                   $story->short_Des = $req->insertstoryshortdes ?? "null";
                   $story->long_des = $req->insertstorylongdes ?? "null";
                   if($req->file('insertstoryimage'))
                   {
                   $image=$req->file('insertstoryimage');
                   $ext = rand().".".$image->getClientOriginalName();
                   $image->move('storyimages/',$ext);
                   $story->image=$ext;
                   }
                   else
                   {
                       $story->image = "null";
                   }
                   $story->userid = $checkid;
                   $story->video_url = $req->insertstoryurl ?? "null";
                   $story->save();
                   return redirect('/ustory')->with('mesgs', "Record Has Been added...");
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function ueditstory($id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $fetchcat = allcategorytbl::all();
                   $update = cstorytbl::find($id);
                   return view('user.story.storyedit', compact('update','fetchcat'));
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function uupdatestory(Request $req, $id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $story = cstorytbl::find($id);
                   $story->type = $req->updatestorytype;
                   $story->Title = $req->updatestorytitle;
                   $story->typefic = $req->updatetypef;
                   $story->short_Des = $req->updatestoryshortdes ?? "null";
                   $story->long_des = $req->updatestorylongdes ?? "null";
                   if($req->file('updatestoryimage'))
                   {
                   $image=$req->file('updatestoryimage');
                   $ext = rand().".".$image->getClientOriginalName();
                   $image->move('storyimages/',$ext);
                   $story->image=$ext;
                   }
                   else
                   {
                       $story->image =  $story->image;
                   }
                   $story->video_url = $req->updatestoryurl ?? "null";
                   $story->update();
                   return redirect('/ustory')->with('mesgs', "Record Has Been Updated...");
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function udeletestory($id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $delete = cstorytbl::find($id);
                   $delete->delete();
                   return redirect()->back()->with('mesg', "Record Has Been Deleted...");
               }
               else
               {
                   return redirect("/login");
               }
           }
       
           public function ustorydetail($id)
           {
               $checksession = session('cname');
               if($checksession)
               {
                   $fetchcat = allcategorytbl::all();
                   $detail = cstorytbl::where('id',$id)->get();
                   return view('user.story.storydetail',compact('detail','fetchcat'));
               }
               else
               {
                   return redirect("/login");
               }
           }

            //Announcements
    public function studan()
    {
        $checksession = session('cname');
        if($checksession)
        {
            $fetchan= announcementtbl::all();
            return view('user.announce.studan', compact('fetchan'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function studandetail($id)
    {
        $checksession = session('cname');
        if($checksession)
        {
            $fetchande = announcementtbl::where('id',$id)->first();
            return view('user.announce.studandetail', compact('fetchande'));
        }
        else
        {
            return redirect("/login");
        }
    }


     //++++++++++++++++++++++++++Learning tips+++++++++++++++++++++++++++
     public function utip()
     {
 
         $checksession = session('cname');
         $checkid = session('cid');
         if($checksession)
         {
             $fetchcat = allcategorytbl::all();
             $fetchtip = learningtiptbl::where('userid',$checkid)->paginate(6);
             return view('user.learningtip.tip', compact('fetchtip','fetchcat'));
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function utip_get()
     {
         $checksession = session('cname');
         if($checksession)
         {
             $fetchcat = allcategorytbl::all();
             return view('user.learningtip.tipcreate',compact('fetchcat'));
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function utipcreatepost(Request $req)
     {
         $checksession = session('cname');
         $checkid = session('cid');
         if($checksession)
         {
             $tip = new learningtiptbl();
            
             //$tip->userid =$uname;
             $tip->type = $req->inserttiptype;
             $tip->Title = $req->inserttiptitle;
             $tip->short_Des = $req->inserttipshortdes ?? "null";
             $tip->long_des = $req->inserttiplongdes ?? "null";
             if($req->file('inserttipimage'))
             {
             $image=$req->file('inserttipimage');
             $ext = rand().".".$image->getClientOriginalName();
             $image->move('tipimages/',$ext);
             $tip->image=$ext;
             }
             else
             {
                 $tip->image = "null";
             }
             $tip->userid = $checkid;
             $tip->video_url = $req->inserttipurl ?? "null";
             $tip->save();
             return redirect('/utip')->with('mesgs', "Record Has Been added...");
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function uedittip($id)
     {
         $checksession = session('cname');
         if($checksession)
         {
             $fetchcat = allcategorytbl::all();
             $update = learningtiptbl::find($id);
             return view('user.learningtip.tipedit', compact('update','fetchcat'));
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function uupdatetip(Request $req, $id)
     {
         $checksession = session('cname');
         if($checksession)
         {
             $tip = learningtiptbl::find($id);
             $tip->type = $req->updatetiptype;
             $tip->Title = $req->updatetiptitle;
             $tip->short_Des = $req->updatetipshortdes ?? "null";
             $tip->long_des = $req->updatetiplongdes ?? "null";
             if($req->file('updatetipimage'))
             {
             $image=$req->file('updatetipimage');
             $ext = rand().".".$image->getClientOriginalName();
             $image->move('tipimages/',$ext);
             $tip->image=$ext;
             }
             else
             {
                 $tip->image =  $tip->image;
             }
             $tip->video_url = $req->updatetipurl ?? "null";
             $tip->update();
             return redirect('/utip')->with('mesgs', "Record Has Been Updated...");
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function udeletetip($id)
     {
         $checksession = session('cname');
         if($checksession)
         {
             $delete = learningtiptbl::find($id);
             $delete->delete();
             return redirect()->back()->with('mesg', "Record Has Been Deleted...");
         }
         else
         {
             return redirect("/login");
         }
     }
 
     public function utipdetail($id)
     {
         $checksession = session('cname');
         if($checksession)
         {
             $fetchcat = allcategorytbl::all();
             $detail = learningtiptbl::where('id',$id)->get();
             return view('user.learningtip.tipdetail',compact('detail','fetchcat'));
         }
         else
         {
             return redirect("/login");
         }
     }

     //++++++++++++++++++++quiz work++++++++++++++++++++++
     public function client_resultget()
     {
         $checksession = session('cname');
 
         if($checksession)
         {
             $result = DB::table('cltesttbls')->orderby('id','desc')->get();
             $resultc = DB::table('cltesttbls')->orderby('id','desc')->count();
             return view('user.resultdetail',compact('result','resultc'));
         }
         else
         {
             return redirect("/login");
         }
     }

     //++++++++++++++++++++quiz work end+++++++++++++++++++++++

     //+++++++++++++++++++++Story competition start+++++++++++++++

        //++++++++++++++++++++++++++STORY+++++++++++++++++++++++++++
   public function compdetail()
   {
    
       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $f = DB::table("storyleveltbls")->where('round',"First Round")->first();
           return view('user.competitiondetail',compact('f'));
       }
       else
       {
           return redirect("/login");
       }
   }


   public function round1story()
   {

       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $firstround = DB::table('storyleveltbls')->where('round',"First Round")->first();
           $secondround = DB::table("storyleveltbls")->where('round',"Second Round")->first();
           $fs = round1storytbl::where('userid',$checkid)->first();
           return view('user.round1story.round1story', compact('secondround','firstround','fs','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round1story_get()
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $firstround = DB::table('storyleveltbls')->where('round',"First Round")->first();
           return view('user.round1story.round1storycreate',compact('fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round1storycreatepost(Request $req)
   {
       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $story = new round1storytbl();
          
           //$story->userid =$uname;
           $story->round1 = $req->round1;
           $story->type = $req->insertstorytype;
           $story->Title = $req->insertstorytitle;
           $story->typefic = $req->inserttypef;
           $story->short_Des = $req->insertstoryshortdes ?? "null";
           $story->long_des = $req->insertstorylongdes ?? "null";
           if($req->file('insertstoryimage'))
           {
           $image=$req->file('insertstoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image = "null";
           }
           $story->userid = $checkid;
           $story->video_url = $req->insertstoryurl ?? "null";
           $story->save();
           return redirect('/round1story')->with('mesgs', "Record Has Been added...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function editround1story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
        $firstround = DB::table('storyleveltbls')->where('round',"First Round")->first();
           $fetchcat = allcategorytbl::all();
           $update = round1storytbl::find($id);
           return view('user.round1story.round1storyedit', compact('update','fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function updateround1story(Request $req, $id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $story = round1storytbl::find($id);
           $story->round1 = $req->round1;
           $story->type = $req->updatestorytype;
           $story->Title = $req->updatestorytitle;
           $story->typefic = $req->updatetypef;
           $story->short_Des = $req->updatestoryshortdes ?? "null";
           $story->long_des = $req->updatestorylongdes ?? "null";
           if($req->file('updatestoryimage'))
           {
           $image=$req->file('updatestoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image =  $story->image;
           }
           $story->video_url = $req->updatestoryurl ?? "null";
           $story->update();
           return redirect('/round1story')->with('mesgs', "Record Has Been Updated...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function deleteround1story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $delete = round1storytbl::find($id);
           $delete->delete();
           return redirect()->back()->with('mesg', "Record Has Been Deleted...");
       }
       else
       {
           return redirect("/login");
       }
   }


   

   public function round1storydetail($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $detail = round1storytbl::where('id',$id)->get();
           return view('user.round1story.round1storydetail',compact('detail','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }


   //++++round2
   public function round2story()
   {

       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $thirdround = DB::table('storyleveltbls')->where('round',"Third Round")->first();
           $firstround = DB::table('storyleveltbls')->where('round',"Second Round")->first();
           $fs = round2storytbl::where('userid',$checkid)->first();
           return view('user.round2story.round2story', compact('thirdround','firstround','fs','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round2story_get()
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $firstround = DB::table('storyleveltbls')->where('round',"Second Round")->first();
           return view('user.round2story.round2storycreate',compact('fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round2storycreatepost(Request $req)
   {
       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $story = new round2storytbl();
          
           //$story->userid =$uname;
           $story->round2 = $req->round2;
           $story->type = $req->insertstorytype;
           $story->Title = $req->insertstorytitle;
           $story->typefic = $req->inserttypef;
           $story->short_Des = $req->insertstoryshortdes ?? "null";
           $story->long_des = $req->insertstorylongdes ?? "null";
           if($req->file('insertstoryimage'))
           {
           $image=$req->file('insertstoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image = "null";
           }
           $story->userid = $checkid;
           $story->video_url = $req->insertstoryurl ?? "null";
           $story->save();
           return redirect('/round2story')->with('mesgs', "Record Has Been added...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function editround2story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
        $firstround = DB::table('storyleveltbls')->where('round',"Second Round")->first();
           $fetchcat = allcategorytbl::all();
           $update = round2storytbl::find($id);
           return view('user.round2story.round2storyedit', compact('update','fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function updateround2story(Request $req, $id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $story = round2storytbl::find($id);
           $story->round2 = $req->round2;
           $story->type = $req->updatestorytype;
           $story->Title = $req->updatestorytitle;
           $story->typefic = $req->updatetypef;
           $story->short_Des = $req->updatestoryshortdes ?? "null";
           $story->long_des = $req->updatestorylongdes ?? "null";
           if($req->file('updatestoryimage'))
           {
           $image=$req->file('updatestoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image =  $story->image;
           }
           $story->video_url = $req->updatestoryurl ?? "null";
           $story->update();
           return redirect('/round2story')->with('mesgs', "Record Has Been Updated...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function deleteround2story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $delete = round2storytbl::find($id);
           $delete->delete();
           return redirect()->back()->with('mesg', "Record Has Been Deleted...");
       }
       else
       {
           return redirect("/login");
       }
   }


   

   public function round2storydetail($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $detail = round2storytbl::where('id',$id)->get();
           return view('user.round2story.round2storydetail',compact('detail','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }

   //+++round3
   
   public function round3story()
   {

       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $firstround = DB::table('storyleveltbls')->where('round',"Third Round")->first();
           $fs = round3storytbl::where('userid',$checkid)->first();
           return view('user.round3story.round3story', compact('firstround','fs','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round3story_get()
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $firstround = DB::table('storyleveltbls')->where('round',"Third Round")->first();
           return view('user.round3story.round3storycreate',compact('fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function round3storycreatepost(Request $req)
   {
       $checksession = session('cname');
       $checkid = session('cid');
       if($checksession)
       {
           $story = new round3storytbl();
          
           //$story->userid =$uname;
           $story->round3 = $req->round3;
           $story->type = $req->insertstorytype;
           $story->Title = $req->insertstorytitle;
           $story->typefic = $req->inserttypef;
           $story->short_Des = $req->insertstoryshortdes ?? "null";
           $story->long_des = $req->insertstorylongdes ?? "null";
           if($req->file('insertstoryimage'))
           {
           $image=$req->file('insertstoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image = "null";
           }
           $story->userid = $checkid;
           $story->video_url = $req->insertstoryurl ?? "null";
           $story->save();
           return redirect('/round3story')->with('mesgs', "Record Has Been added...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function editround3story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
        $firstround = DB::table('storyleveltbls')->where('round',"Third Round")->first();
           $fetchcat = allcategorytbl::all();
           $update = round3storytbl::find($id);
           return view('user.round3story.round3storyedit', compact('update','fetchcat','firstround'));
       }
       else
       {
           return redirect("/login");
       }
   }

   public function updateround3story(Request $req, $id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $story = round3storytbl::find($id);
           $story->round3 = $req->round3;
           $story->type = $req->updatestorytype;
           $story->Title = $req->updatestorytitle;
           $story->typefic = $req->updatetypef;
           $story->short_Des = $req->updatestoryshortdes ?? "null";
           $story->long_des = $req->updatestorylongdes ?? "null";
           if($req->file('updatestoryimage'))
           {
           $image=$req->file('updatestoryimage');
           $ext = rand().".".$image->getClientOriginalName();
           $image->move('storyimages/',$ext);
           $story->image=$ext;
           }
           else
           {
               $story->image =  $story->image;
           }
           $story->video_url = $req->updatestoryurl ?? "null";
           $story->update();
           return redirect('/round3story')->with('mesgs', "Record Has Been Updated...");
       }
       else
       {
           return redirect("/login");
       }
   }

   public function deleteround3story($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $delete = round3storytbl::find($id);
           $delete->delete();
           return redirect()->back()->with('mesg', "Record Has Been Deleted...");
       }
       else
       {
           return redirect("/login");
       }
   }


   

   public function round3storydetail($id)
   {
       $checksession = session('cname');
       if($checksession)
       {
           $fetchcat = allcategorytbl::all();
           $detail = round3storytbl::where('id',$id)->get();
           return view('user.round3story.round3storydetail',compact('detail','fetchcat'));
       }
       else
       {
           return redirect("/login");
       }
   }

     //+++++++++++++++Story competition end+++++++++++++++++++++++

       //++++++++++++++++++++Quiz work+++++++++++++++++++++++++++

      
   
       public function ucategory_fetch()
       {
           $checksession = session('cname');
           if($checksession)
           {
               $cat_fetch = categorytbl::paginate(6);
               return view('user.category.category_fetch', compact('cat_fetch'));
           }
           else
           {
               return redirect("/login");
           }
       }
   
      
       public function ugrade_fetch()
       {
           $checksession = session('cname');
           if($checksession)
           {
               $cat_fetch = gradetbl::paginate(6);
               return view('user.grade.grade_fetch', compact('cat_fetch'));
           }
           else
           {
               return redirect("/login");
           }
       }
   
       

//++++++++++++++++++++Test +++++++++++++++++++++++++++
public function ufetchtest()
{
$checksession = session('cname');
if($checksession)
{
$fetchtest = admintesttbl::where('userid',session('cid'))->paginate(6);
return view('user.test.fetch_test', compact('fetchtest'));
}
else
{
return redirect("/login");
}
}

public function utestget()
{
$checksession = session('cname');
if($checksession)
{
$skills = DB::table('categorytbls')->get();
$grade = DB::table('gradetbls')->get();
return view('user.test.create_test',compact('grade','skills'));
}
else
{
return redirect("/login");
}
}

public function utestpost(Request $req)
{
$checksession = session('cname');
if($checksession)
{
$test = new admintesttbl();
$test->userid = session('cid');
$test->skillid = $req->insertskill;
$test->grade = $req->insertgrade;
$test->topicid = $req->inserttopic;
$test->time_dur = $req->insertdur;
$test->total_mcq = $req->insertmcq;
$test->total_marks = $req->insertmarks;
$test->pass_marks = $req->insertpmarks;
$test->save();
return redirect('/ufetchtest')->with("createc","Test Created!!");
}
else
{
return redirect("/login");
}
}

public function utesteditget($id)
{
$checksession = session('cname');
if($checksession)
{
$updatetest = admintesttbl::find($id);
$skills = DB::table('categorytbls')->get();
$grade = DB::table('gradetbls')->get();
return view('user.test.edit_test', compact('updatetest','skills','grade'));
}
else
{
return redirect("/login");
}
}

public function utesteditpost(Request $req, $id)
{
$checksession = session('cname');
if($checksession)
{
$test = admintesttbl::find($id);
$test->skillid = $req->updateskill;
$test->grade = $req->insertgrade;
$test->topicid = $req->updatetopic;
$test->time_dur = $req->updatedur;
$test->total_mcq = $req->updatemcq;
$test->total_marks = $req->updatemarks;
$test->pass_marks = $req->updatepmarks;
$test->update();
return redirect('/ufetchtest')->with("editc","Test Updated!!");
}
else
{
return redirect("/login");
}
}

public function utestdelete($id)
{
$checksession = session('cname');
if($checksession)
{
$delete = admintesttbl::find($id);
$delete->delete();
return redirect()->back()->with('mesg', "Test Record Has Been Deleted...");
}
else
{
return redirect("/login");
}

}

//++++++++++++++++++++topic +++++++++++++++++++++++++++
public function ufetchtopic()
{
$checksession = session('cname');
if($checksession)
{
  $fetchtest = topictbl::paginate(6);
  return view('user.topic.fetch_topic', compact('fetchtest'));
}
else
{
  return redirect("/login");
}
}

public function utopicget()
{
$checksession = session('cname');
if($checksession)
{
  $skills = DB::table('categorytbls')->get();
 return view('user.topic.create_topic',compact('skills'));
}
else
{
  return redirect("/login");
}
}

public function utopicpost(Request $req)
{
$checksession = session('cname');
if($checksession)
{
  $topic = new topictbl();
  $topic->skillid = $req->insertskill;
  $topic->name = $req->insertname;
  $topic->save();
  return redirect('/ufetchtopic')->with("createc","topic Created!!");
}
else
{
  return redirect("/login");
}
}

public function utopiceditget($id)
{
$checksession = session('cname');
if($checksession)
{
  $updatetest = topictbl::find($id);
  $skills = DB::table('categorytbls')->get();
  return view('user.topic.edit_topic', compact('updatetest','skills'));
}
else
{
  return redirect("/login");
}
}

public function utopiceditpost(Request $req, $id)
{
$checksession = session('cname');
if($checksession)
{
  $topic = topictbl::find($id);
  $topic->skillid = $req->updateskill;
  $topic->name = $req->updatename;
  $topic->update();
  return redirect('/ufetchtopic')->with("editc","topic Updated!!");
}
else
{
  return redirect("/login");
}
}

public function utopicdelete($id)
{
$checksession = session('cname');
if($checksession)
{
  $delete = topictbl::find($id);
  $delete->delete();
  return redirect()->back()->with('mesg', "topic Record Has Been Deleted...");
}
else
{
  return redirect("/login");
}

}
//++++++++++++++++++++Question +++++++++++++++++++++++++++
public function ufetchques()
{
$checksession = session('cname');
if($checksession)
{
$fetchques = questiontbl::where('userid',session('cid'))->paginate(6);
return view('user.question.fetch_ques', compact('fetchques'));
}
else
{
return redirect("/login");
}
}

public function uquesget()
{
$checksession = session('cname');
if($checksession)
{
$test = DB::table('admintesttbls')->where('userid',session('cid'))->get();
return view('user.question.create_ques',compact('test'));
}
else
{
return redirect("/login");
}
}

public function uquespost(Request $req)
{
$checksession = session('cname');
if($checksession)
{
$ques = new questiontbl();
$ques->userid = session('cid');
$ques->testid = $req->inserttest;
$ques->question = $req->insertques;
$ques->marks = $req->insertmarks;
$ques->save();

$ans = new answertbl();
$ans->quesid = $ques->id;
$ans->optionA = $req->insertopta;
$ans->optionB = $req->insertoptb;
$ans->optionC = $req->insertoptc;
$ans->optionD = $req->insertoptd;
$ans->correct_opt = $req->insertcorrect;
$ans->save();
return redirect('/ufetchques')->with("createc","Question Created!!");
}
else
{
return redirect("/login");
}

}

public function uqueseditget($id)
{
$checksession = session('cname');
if($checksession)
{
$updateques = questiontbl::find($id);
$test = DB::table('admintesttbls')->where('userid',session('cid'))->get();
return view('user.question.edit_ques', compact('updateques','test'));
}
else
{
return redirect("/login");
}
}

public function uqueseditpost(Request $req, $id)
{
$checksession = session('cname');
if($checksession)
{
$ques = questiontbl::find($id);
$ques->testid = $req->updatetest;
$ques->question = $req->updateques;
$ques->marks = $req->updatemarks;
$ques->update();

$ans = answertbl::where('quesid',$id)->first();
$ans->quesid = $ques->id;
$ans->optionA = $req->updateopta;
$ans->optionB = $req->updateoptb;
$ans->optionC = $req->updateoptc;
$ans->optionD = $req->updateoptd;
$ans->correct_opt = $req->updatecorrect;
$ans->update();
return redirect('/ufetchques')->with("editc","Question Updated!!");
}
else
{
return redirect("/login");
}

}

public function uquesdelete($id)
{
$checksession = session('cname');
if($checksession)
{
$delete = questiontbl::find($id);
$delete->delete();
$delete1 = answertbl::where('quesid',$id)->first();
$delete1->delete();
return redirect()->back()->with('mesg', "Question Has Been Deleted...");
}
else
{
return redirect("/login");
}
}


//++++++++++++++++++++Answer +++++++++++++++++++++++++++
public function usubjecttest(Request $req)
{


$subject = $req->post("subject");
$subjecta = DB::table('topictbls')->where('skillid',$subject)->get();
$subjectc = DB::table('topictbls')->where('skillid',$subject)->count();

if($subjectc>0)
{
$html = "<option value=''>Select Please</option>";
echo $html;

foreach($subjecta as $r)
  {
    // $gradename = DB::table('topictbls')->where('id',$r->topicid)->first();
    $html = "<option value='$r->id'>".$r->id. " " .$r->name."</option>";
    echo $html;
  }
}
else
{
$html = "<option>Not Found</option>";
    echo $html;
}
}
}

