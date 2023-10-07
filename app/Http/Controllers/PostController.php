<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $posts=[];

    if ($request->ajax()) {
      // return DataTables::of(Post::query())->toJson();
      // $posts = Post::select(['id','title','category','tag','created_at']);
      $posts = Post::query();
        return DataTables::of( $posts )
          ->addIndexColumn()
          ->editColumn('created_at', function( Post $post ) { 
            $formatedDate = Carbon::parse( $post->created_at)->format('D Y-M-d');
            return $formatedDate; 
          })
          ->addColumn('action', function( $row ) {
            $actionBtn = 
            '<a href="javascript:void(0)" class="show btn btn-info btn-sm py-0"><i class="fa fa-eye"></i></a> 
            <a href="javascript:void(0)" class="edit btn btn-warning btn-sm py-0"><i class="fa fa-edit ml-1"></i></a> 
            <a href="javascript:void(0)" class="delete btn btn-danger btn-sm py-0"><i class="fa fa-trash ml-1"></i></a>
            ';
             return $actionBtn;
        })
          ->rawColumns( array('action') )
          ->make(true);
      }

    return view('posts.index', ['posts' => $posts]);
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
