<?php

namespace App\Http\Controllers\Api;

use App\Models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends= Friends::orderBy('id', 'desc')->paginate(3);
        return response()->json([
            'success' => true,
            'message' => 'Daftar data teman',
            'data'    => $friends
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:225',
            'no_tlp' =>'required|numeric',
            'alamat' =>'required',
            'groups_id' => 'required'
           
        ]);

        $f = Friends::create([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'groups_id' => $request->groups_id
            
        ]);

        if ($friends) {
            return response()->json([
            'success' => true,
            'message' => 'Teman berhasil ditambahkan',
            'data'    => $friends
        ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Teman gagal ditambahkan',
                'data'    => $friends
            ], 409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = Friends::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail data teman',
            'data'    => $friend
        ], 200);
    
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $friends = Friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'groups_id' => $request->groups_id
            
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'  => $f
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friends::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data teman berhasil di hapus',
            'data' => $cek
        ], 200);
    }
}


