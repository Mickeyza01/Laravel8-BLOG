<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    // หน้าแรก
    public function index()
    {
        $blog = Post::first()->paginate();
        return view('posts.index',compact('blog'));
    }

    // หน้าเพิ่มข้อมูล
    public function create()
    {
        return view('posts.create');
    }

    // เพิ่มข้อมูล
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:1|max:255',
            'description' => 'required|min:1|max:4096',
        ]);

        $blog = new Post;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        if($request->hasfile('blog_image'))
        {
            $file = $request->file('blog_image');
            $extention = $file->getClientOriginalExtension();
            $filename = date('YmdHis').'.'.$extention;
            $file->move('uploads/blog/', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect()->back()->with('status','เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    // หน้าแก้ไขข้อมูล
    public function edit($id)
    {
        $blog = Post::find($id);
        return view('posts.edit', compact('blog'));
    }

    // อัพเดทข้อมูล
    public function update(Request $request, $id)
    {
        $blog = Post::find($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if($request->hasfile('blog_image'))
        {
            $destination = 'uploads/blog/'.$blog->blog_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('blog_image');
            $extention = $file->getClientOriginalExtension();
            $filename = date('YmdHis').'.'.$extention;
            $file->move('uploads/blog/', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect()->back()->with('status','อัพเดทข้อมูลเรียบร้อยแล้ว');
    }

    // หน้าแสดงข้อมูล
    public function show($id)
    {
        $blog = Post::find($id);
        return view('posts.show', compact('blog'));
    }

    // ลบข้อมูล
    public function destroy($id)
    {
        $blog = Post::find($id);
        $destination = 'uploads/blog/'.$blog->blog_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $blog->delete();
        return redirect()->back()->with('status','ลบข้อมูลเรียบร้อยแล้ว');
    }

}
