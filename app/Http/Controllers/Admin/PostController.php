<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $posts = Post::all();

        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, Post $post )
    {
        // dd($request->validated());
        try {

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // 'admin_id' => auth()->admin()->id,
            'status' => $request->status,
            'admin_id' => $request->admin_id,
            'photo' => request()->file('photo')->store('test')
        ]);

        // Post::create($request->validated());
        return redirect()->route('dashboard.post')->with(['success' =>  'تمت الاضافة بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.news.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            // dd($request->validated());
            $post->photo = '';
            $post->title = $request->title;
            $post->content = $request->content;
            // $post->date = date('Y-m-d');
            $post->status = $request->status;
            // Post::where($post)->update($request->validated());
            $save = $post->save();
            if ($save) {
                return redirect()->route('dashboard.post')->with(['success' =>  'تمت التعديل بنجاح']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('dashboard.post')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // echo("hiiii");
        // try {


            if(!empty($post->photo) && Storage::exists($post->photo)) {
                Storage::delete($post->photo);
            }

            $post->delete();
            session()->flash('success', 'تم حذف بنجاح');

            return redirect(route('dashboard.post'));
        // } catch (\Exception $ex) {

        //     return redirect()->route('admin.news.index')->with(['error' => 'حدث خطأ ما']);
        // }
    }
}
