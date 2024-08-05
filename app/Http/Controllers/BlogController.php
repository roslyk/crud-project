<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    public  function list(){

        $blogs = Blog::all()->sortByDesc('created_at');

        return view('blog.list', ['blogs' => $blogs]);

    }

    public  function store(Request $request){
            //Get the form request as $request

            // Validate request
        $data = $request->validate(
            [ 'title' => 'string',
                'excerpt' => 'string',
                'body' =>'string'
            ]
        );
        // If request is not validated we get errors
        // on top of the page resources\views\blog\create.blade.php

        // Put data into the database.
        // Note that this mass-assignment is allowed:
        // See app\Models\Blog.php
        $newBlog = Blog::create( $data );

        // Go back to the list of blogs.
        // The newly addded blog can be seen here.
        return redirect(route('blog.list'))->with('success', 'Blog Added Succesfully!');

    }
    public function edit(Blog $blog){


        return view('blog.edit',['blog' => $blog]);

    }
    public  function update(Blog $blog, Request $request){
        // We take the $blog variable from blog\edit.blade.php
        // and the form request $request.

        // We validate the request
        $data = $request->validate(
            [ 'title' => 'string',
                'excerpt' => 'string',
                'body' =>'string'
            ]
        );
        // If request is not validated we get errors
        // on top of the page resources\views\blog\edit.blade.php

        // The Blog is updated
        $blog->update($data);

        // We are redirected to the route 'blog.list' where
        // one can see a list of posts
        return redirect(route('blog.list'))->with('success', 'Blog Updated Succesfully!');

    }

    public function delete(Request $request, Blog $blog){

        $blog->delete();

        return redirect(route('blog.list'))->with('success', 'Blog Deleted Succesfully!');

    }
}
