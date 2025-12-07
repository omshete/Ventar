<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::orderByDesc('published_at')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/blogs'), $filename);
            $data['image'] = $filename;
        }

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        BlogPost::create($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created.');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/blogs'), $filename);
            $data['image'] = $filename;
        }

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        if ($data['is_published'] && ! $blog->published_at) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted.');
    }
}
