<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index() {
        $user_id = Auth::user()->id;
        $app = BlogPost::where("id", "=", $user_id)->latest()->get();
        $category = Category::all();

        return view('dashboard.post.index', [
            'contents' => $app,
            'count' => count($app),
            'category' => $category
        ]);
    }

    private function print(string $val) {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln($val);
    }

    public function main(Request $req) {
        $posts = BlogPost::latest()->filter(request(["search"]))->paginate(10)->withquerystring();
        $category = Category::all();

        if($req->has('category')) {
            $posts = BlogPost::where("category_id", $req->category)->paginate(10)->withquerystring();
            $category = $category->sortBy("id")->sortBy(fn($item) => intval($req->category) !== $item->id);
        }

        return view('blog', [
            "active" => 'blog',
            "route_name" => "/blog",
            "posts" => $posts,
            'category' => $category,
            "count" => count($posts)
        ]);
    }

    public function blog_post(Request $req, string $id) {
        $post = BlogPost::find($id);
        $another = BlogPost::where("id", "!=", $id)->take(4)->get();
        if($post) {
            return view('blog-item', [
                "route_name" => "/blog/p/" . $post->id,
                "post" => $post,
                "another" => $another
            ]);
        }
    }

    public function create() {
        $categories = Category::all();
        return view('dashboard.post.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $req) {

        $validatedData = $req->validate([
            'judul' => 'required|max:255|min:3',
            'slug' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
            'content' => 'required|min:5',
        ]);

        if($req->file('image')) {
            $validatedData['image'] = $req->file('image')->store('post-image', 'public');
        }

        $validatedData['user_id'] = Auth::user()->id;
        $this->print(Auth::user()->id);

        $store = BlogPost::create($validatedData);

        if($store){
            return redirect('/post')->with('success', 'Post Anda berhasil dibuat!');
        }else{
            return redirect('/post')->with('error', 'Post Anda gagal dibuat!');
        }
    }

    public function edit(BlogPost $post) {
        return view('dashboard.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, BlogPost $post) {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|min:3',
            'content' => 'required|min:5',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image', 'public');
        }

        // BlogPost::where('id', $post->id)->update($validatedData);
        $post->update($validatedData);

        // return redirect('/post')->with('success', 'Post Anda berhasil diubah!');
        if($post){
            return redirect('/post')->with('success', 'Post Anda berhasil diubah!');
        }else{
            return redirect('/post')->with('error', 'Post Anda gagal diubah!');
        }
    }

    public function destroy(BlogPost $post){
        BlogPost::destroy($post->id);
        return redirect('/post')->with('success', 'Post Anda berhasil dihapus!');
    }

    public function show(BlogPost $post) {
        return view('post', [
            'post' => $post,
            'active' => 'blog',
        ]);
    }

}
