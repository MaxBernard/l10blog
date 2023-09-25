<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\Datatables;
use DataTables;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
        if ($request->ajax()) {
            $data = Post::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = 
                    '<a href="javascript:void(0)" class="show btn btn-info btn-sm"><i class="fa fa-eye"></i></a> 
                    <a href="javascript:void(0)" class="edit btn btn-success btn-sm"><i class="fa fa-edit ml-1"></i></a> 
                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash ml-1"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    return view('posts.index');
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $postId = $request->id;
  
      $post   =   Post::updateOrCreate(
        [
          'id' => $postId
        ],
        [
          'name' => $request->name, 
          'email' => $request->email,
          'address' => $request->address
        ]);
                          
      return Response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
      $where = array('id' => $request->id);
      $post  = Post::where($where)->first();
       
      return Response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      $post = Post::where('id',$request->id)->delete();
       
      return Response()->json($post);
    }
}
