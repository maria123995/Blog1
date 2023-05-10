<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return view('dashboard.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        // dd($request->validated());
        try {
          Comment::create([
                'post_id' => $request->post_id,
                'user_id' => $request->user_id,
                'comment' => $request->comment,
            ]);

            // Comment::create($request->validated());
            return redirect()->route('dashboard.comment')->with(['success' =>  'تمت الاضافة بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.comment.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        // return view('dashboard.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('dashboard.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request,  Comment $comment)
    {
        // try {

            $comment->post_id = $request->post_id;
            $comment->user_id = $request->user_id;
            $comment->comment = $request->comment;
            // Comment::where('id', $comment)->update($request->validated());
            $save = $comment->save();
            if ($save) {
                return redirect()->route('dashboard.comment')->with(['success' =>  'تمت التعديل بنجاح']);
            }
        // } catch (\Exception $ex) {

        //     return redirect()->route('dashboard.comment')->with(['error' => 'حدث خطأ ما']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $supadmin)
    {
        //
    }
}
