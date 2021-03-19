<?php

namespace App\Http\Controllers\Api;

use App\Models\Groups;
use\App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups= Groups::orderBy('id', 'desc')->paginate(3);
        return response()->json([
            'success' => true,
            'message' => 'Daftar data grup teman',
            'data'    => $friends
        ], 200);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:225',
            'description' =>'required',
            
        ]);
        $groups = Groups::create([
            'name' => $request->name,
            'description' => $request ->description
        ]);
      
    if($groups)
    {
        return response()->json([
            'success' => true,
            'message' => 'Teman berhasil ditambahkan',
            'data'    => $groups
        ], 200);
    }else{
        return response()->json([
            'success' => true,
            'message' => 'Teman gagal di tambahkan',
            'data'    => $groupss
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
        $group = Groups::where('id', $id) ->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail data teman',
            'data'    => $groups
        ], 200);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Groups::where('id', $id) ->first();
        return view('groups.edit', ['group' => $group]);
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
       
      $group = Groups::find($id)->update([
          'name' => 'required|unique:friends|max:225',
          'description' => 'required'
      ]);
      return response()->json([
        'success' => true,
        'message' => 'Data berhasil di rubah',
        'data'    => $groups
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
        $group = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'data berhasil di hapus',
            'data'    => $group
        ], 200);
    }
    }
   