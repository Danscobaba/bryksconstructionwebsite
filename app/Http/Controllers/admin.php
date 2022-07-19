<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class admin extends Controller
{

    function login(Request $req){
            $user = DB::table('users')->where('email', $req->email)->first();
            if($user){
                if(Hash::check($req->password,$user->password)){
                    if($user->status == 0){
                        return response()->json([
                            'status'=>401,
                            'error'=>"Sorry you can't login"
                        ]);
                    }else{
                        $req->session()->put('uid', $user->id);
                        return response()->json([
                            'status'=>201,
                            'success'=>"You have successfully logged in"
                        ]);
                        //return redirect('admin/dashboard')->with('success',"You have successfully logged in");
                    }
                } else{
                    return response()->json([
                        'status'=>401,
                        'error'=>"Incorrect password"
                    ]);
                    //return back()->with('error',"Incorrect Password");
                }

            }else{
                return response()->json([
                    'status'=>401,
                    'error'=>"Account not found"
                ]);
                //return back()->with('error',"Account not found");
            }

    }

    function logout(){
        if(session()->has('uid')){
            session()->pull('uid');
            return redirect('/admin-login');
        }
    }

    function test(){
        if(session()->has('uid')){
            $data = DB::table('testimony')->get();
            return view('admin.testimonial',compact('data'));
        }else{
            return redirect('/admin-login');
        }
    }

    function admini(){
        if(session()->has('uid')){
            $data = DB::table('users')->get();
            return view('admin.administrator',compact('data'));
        }else{
            return redirect('/admin-login');
        }
    }
    function project(){
        if(session()->has('uid')){
            $data = DB::table('projects')->orderBy('date_time','desc')->get();
            return view('admin.project',compact('data'));
        }else{
            return redirect('/admin-login');
        }
    }
    function site_setting(){
        if(session()->has('uid')){
            $data = DB::table('site_settings')->where('id', 1)->first();
            return view('admin.site-setting',get_defined_vars());
        }else{
            return redirect('/admin-login');
        }
    }

    function about(){
        if(session()->has('uid')){
            $data = DB::table('about')->where('id', 1)->first();
            return view('admin.about',get_defined_vars());
        }
    }

    function project_type(){
        if(session()->has('uid')){
            $data = DB::table('type')->get();
            return view('admin.dashboard',compact('data'));
        }else{
            return redirect('/admin-login');
        }
    }


    function save_project_type(Request $req){
        if(session()->has('uid')){
            $data = DB::table('type')->insert([
                'name' => $req->name,
                'status' => 1
            ]);
            if($data){
                 return response()->json(['status' => 200, 'message' => 'Project type successfully created']);
            }

        }else{
            return redirect('/admin-login');
        }
    }
    function update_project_type(Request $req){
        if(session()->has('uid')){
            if($req->name != ""){
                $data = DB::table('type')->where('id', $req->id)->update([
                    'name' => $req->name
                ]);
            }else{
                $data = DB::table('type')->where('id', $req->id)->update([

                    'status' => $req->status
                ]);
            }

            if($data){
                 return response()->json(['status' => 200, 'message' => 'Successfully updated']);
            }

        }
    }

    function update_project(Request $req){
        if(session()->has('uid')){
            if($req->title == ""){
                $data = DB::table('projects')->where('id', $req->id)->update([
                    'status' => $req->status
                ]);
                if($data){
                    return response()->json(['status' => 200, 'message' => 'Successfully updated']);
               }

            }else{

                if($req->image == ""){
                    $data = DB::table('projects')->where('id', $req->id)->update([
                        'project_title' => $req->title,
                        'project_description' => $req->description,
                        // 'project_type' => $req->project_type,
                    ]);
                    if($data){
                        return response()->json(['status' => 200, 'message' => 'Successfully updated']);
                   }
                }else{
                    $us = DB::table('projects')->where('id', $req->id)->first();
                    $file = $req->file('image');
                    $filename = trim($req->title).time().$file->getClientOriginalName();
                    $destinationPath = public_path('projects/'.$us->project_image);
                    if(File::exists( $destinationPath)){
                        File::delete($destinationPath);
                    }

                    $data = DB::table('projects')->where('id', $req->id)->update([
                        'project_title' => $req->title,
                        'project_description' => $req->description,
                        // 'project_type' => $req->project_type,
                        'project_image' => $filename,
                    ]);
                    $file->move(public_path('projects/'),$filename);
                    if($data){
                        return response()->json(['status' => 200, 'message' => 'Successfully updated']);
                   }
                }




            }


        }
    }

    function delete_project($id){
        $us = DB::table('projects')->where('id', $id)->first();
        $destinationPath = public_path('projects/'.$us->project_image);
        if(File::exists( $destinationPath)){
            File::delete($destinationPath);
            $data = DB::table('projects')->where('id',$id)->delete();
            if($data){
                return  redirect('admin/project')->with('success' , "deleted successfully");
            }
        }

    }
    function delete_project_type($id){
        $us = DB::table('projects')->where('project_type', $id)->first();
        if($us){
            $destinationPath = public_path('projects/'.$us->project_image);
            if(File::exists( $destinationPath)){
                File::delete($destinationPath);
                $data = DB::table('projects')->where('project_type',$id)->delete();
                if($data){


                }
            }
        }

        DB::table('type')->where('id', $id)->delete();
        return  redirect('admin/dashboard')->with('success' , "deleted successfully");
    }
    function save_project(Request $req){
        if(session()->has('uid')){
            $validator = Validator::make($req->all(), [
                'image' => 'max:4000',
            ]);
                if($validator->fails()){
                    return back()->with('error' , $validator->getMessageBag());
                } else{

                    $file = $req->file('image');
                    $filename = trim($req->title).time().$file->getClientOriginalName();

                    $data = DB::table('projects')->insert([
                        'project_title' => $req->title,
                        'project_description' => $req->description,
                        'project_type' => $req->project_type,
                        'project_image' => $filename,
                        'status' => 1
                    ]);
                    if($data){
                        $file->move(public_path('projects/'),$filename);
                        return  redirect()->back()->with('success' , "successfully uploaded");
                    }else{
                        return redirect()->back()->with('error' , "Something went wrong! Please try again");
                    }
                }


        }
    }

    function save_site_settings(Request $req){
        if(session()->has('uid')){
            $data = DB::table('site_settings')->update([
                'address' => $req->address,
                'email' => $req->email,
                'phone_no' => $req->phone_no,
                'fb_link' => $req->fb_link,
                'instagram_link' => $req->instagram_link,
                'twitter_link' => $req->twitter_link,
                'youtube' => $req->youtube,
                'linkedin' => $req->linkedin,
                'testimony_status' => $req->testimony_status
            ]);
            if($data){
                 return response()->json(['status' => 200, 'message' => 'successfully updated']);
            }

        }
    }

    function save_about(Request $req){
        if(session()->has('uid')){
            $data = DB::table('about')->update([
                'description' => $req->description,
                'id' => 1
            ]);
            if($data){
                 return redirect('admin/dashboard');;
            }

        }
    }
    function save_test(Request $req){
        if(session()->has('uid')){
            $data = DB::table('testimony')->insert([
                'name' => $req->name,
                'testimony' => $req->testimony,
                'status' => 1
            ]);
            if($data){
                 return response()->json(['status' => 200, 'message' => 'successfully created']);
            }

        }
    }
    function update_test_stat(Request $req){
        $data = DB::table('testimony')->where('id', $req->id)->update([
            'status' => $req->status
        ]);
        if($data){
            return response()->json(['status' => 200, 'message' => 'Successfully updated']);
       }

    }
    function delete_test($id){
        $data = DB::table('testimony')->where('id', $id)->delete();

        if($data){
            return redirect('admin/testimony')->with('message','Successfully updated');
       }

    }
    function save_admin(Request $req){
        if(session()->has('uid')){
            $user = DB::table('users')->where('email', $req->email)->first();
            if($user){
                return redirect()->back()->with('message','Email already exist');
            } else{
                $data = DB::table('users')->insert([
                    'username' => $req->name,
                    'email' => $req->email,
                    'phone_no' => $req->phone_no,
                    'password' => Hash::make($req->password),
                    'status' => 1
                ]);
                if($data){
                     return redirect('admin/administrator')->with('message', 'successfully created');
                }
            }


        }
    }

    function submitContactForm(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phone_no' => $req->phone_no,
            'message' => $req->message,
        ];

        Mail::to('danakin45@gmail.com')->send(new contactMail($data));
        DB::table('contact')->insert($data);
        session()->flash('message', 'Thank you for contacting us.');
        return redirect('contact-us');
    }

    function update_admin_status(Request $req){
        $data = DB::table('users')->where('id', $req->id)->update([

            'status' => $req->status
        ]);
        if($data){
            return response()->json(['status' => 200, 'message' => 'Successfully updated']);
       }

    }
    function delete_users($id){
        $data = DB::table('users')->where('id', $id)->delete();

        if($data){
            return redirect('admin/administrator')->with('message','Successfully deleted');
       }

    }
}
