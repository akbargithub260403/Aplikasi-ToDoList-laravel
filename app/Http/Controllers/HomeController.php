<?php

namespace App\Http\Controllers;

use File;

use App\Models\ListModel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('redirectPages');

    }

    public function update_avatar(Request $request , $name)
    {
            $this->validate($request, [
                'avatar'        => "required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048"
            ]);

            $gambar     = User::where('name',$name)->first();

            File::delete('images/'.$gambar->avatar);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('avatar');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images';

            $file->move($tujuan_upload,$nama_file);

            User::where('name',$name)->update([
                'avatar'    => $nama_file
            ]);

            return back()->with('status','avatar berhasil diganti');
    }

    
}
