<?php

namespace App\Http\Controllers;

use App\Models\ListModel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account_id,$name_account)
    {
        $data       = ListModel::where('user_id', '=' , $account_id)
                                    ->where(function ($query) {
                                        $query->where('status_list', '=' , 'list_belum_selesai');
                                    })->get();

        $kategori   = Kategori::where('user_id',$account_id)->get();

        return view('dashboard',['data' => $data ,'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($account_id,$name_account)
    {
        $kategori   = Kategori::where('user_id',$account_id)->get();
        
        return view('dashboard.createList',['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $user_id)
    {
        $this->validate($request,[
            'judul'         => 'required',
            'tanggal'       => 'required',
            'tahun'         => 'required'
        ]);

        try {
            
            $tanggal_list   = $request->tanggal .'-'. $request->bulan .'-'. $request->tahun;

            ListModel::create([
                'user_id'       => $user_id,
                'judul'         => $request->judul,
                'kategori_id'   => $request->kategori_id,
                'waktu'         => $request->waktu,
                'status_list'   => 'list_belum_selesai',
                'tanggal_list'  => $tanggal_list,
                'deskripsi'     => $request->deskripsi
            ]);


        } catch (\Throwable $th) {

            $error  = $th->getMessage();
            return view('errors.error500',['error' => $error]);

        }

        return back()->with('status','Data berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListModel  $listModel
     * @return \Illuminate\Http\Response
     */
    public function show(ListModel $listModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListModel  $listModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ListModel $listModel)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListModel  $listModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListModel $listModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListModel  $listModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListModel $listModel , $judul_list)
    {
        // try {

        //     ListModel::destroy($listModel->id);

        // } catch (\Throwable $th) {
            
        //     $error  = $th->getMessage();
        //     return view('errors.error500',['error' => $error]);

        // }

        // return back()->with('status','List berhasil Selesai');
    }

    public function detail_account($id_account , $name_account)
    {
        try {

            $data       = User::where('id',$id_account)->get();

            $list       = ListModel::where('user_id', '=' , $id_account)
                                        ->where(function ($query) {
                                            $query->where('status_list', '=' , 'list_belum_selesai');
                                        })->get();

            $listDone   = ListModel::where('user_id', '=' , $id_account)
                                        ->where(function ($query) {
                                            $query->where('status_list', '=' , 'list_selesai');
                                        })->get();


            return view('dashboard.profileAccount',['data' => $data , 'list' => $list , 'listDone' => $listDone ]);

        } catch (\Throwable $th) {

            $error  = $th->getMessage();
            return view('errors.error500',['error' => $error]);

        }

    }

        public function list_selesai(ListModel $listModel , $judul_list)
        {
            try {

                ListModel::where('id',$listModel->id)->update([
                    'status_list'       => 'list_selesai'
                ]);
                
            } catch (\Throwable $th) {

                $error  = $th->getMessage();
                return view('errors.error500',['error' => $error]);

            }
        }

    public function cetak_list_activity($id)
    {
        try {
            $data   = ListModel::where('user_id',$id)
                                ->where(function ($query){
                                    $query->where('status_list','list_belum_selesai');
                                })->get();

            return view('export.exportList',['data' => $data]);

        } catch (\Throwable $th) {

            $error  = $th->getMessage();
            return view('errors.error500',['error' => $error]);

        }
    }

    public function cetak_list_done($id)
    {
        try {
            $data   = ListModel::where('user_id',$id)
                                ->where(function ($query){
                                    $query->where('status_list','list_selesai');
                                })->get();

            return view('export.exportList',['data' => $data]);

        } catch (\Throwable $th) {

            $error  = $th->getMessage();
            return view('errors.error500',['error' => $error]);

        }
    }
}
