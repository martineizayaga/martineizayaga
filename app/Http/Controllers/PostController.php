<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Image;
use Storage;
use Purifier;
use HtmlPurifier;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Get the number of average number of minutes to read the blog post.
     */
    private function scopeGetTime($body)
    {
        $numOfWords = str_word_count($body);
        $avgWordsPerMin = 250;
        $timeToRead = round($numOfWords / $avgWordsPerMin);
        return $timeToRead;
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required',
            'featured_image' => 'sometimes|mimes:jpg,jpeg,png,bmp,gif,svg',
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $purifier = new \Kaishiyoku\HtmlPurifier\HtmlPurifier();
        $body = $purifier->purify($request->body);
        $post->body = $body;
        $post->time_to_read = $this->scopeGetTime($body);

        //save image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }

        $post->save();

        // Session::flash('success', 'The blog post has been successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
    }

    /*
     * Returns a list of filepaths of the imgs from the html string.
     */
    private function getImgsFilepathFromBody($body)
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($body);
        libxml_clear_errors();
        //get imgs from html
        $domNodeList = $doc->getElementsByTagName('img');
        //get the src from the imgs
        $imgList = [];
        foreach ($domNodeList as $domNode) {
            $link = $domNode->getAttribute('src');
            if(!empty($link)) {
                array_push($imgList, $link);
            }
        }
        return $imgList;
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
        $post = Post::find($id);
        
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'body' => 'required',
                'featured_image' => 'mimes:jpg,jpeg,png,bmp,gif,svg'
            ));

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $bodyBeforeUpdate = $post->body;
        $purifier = new \Kaishiyoku\HtmlPurifier\HtmlPurifier();
        $body = $purifier->purify($request->body);
        $post->body = $body;
        $post->time_to_read = $this->scopeGetTime($body);

        if ($request->featured_image) {    
            // add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
            // update the database
            $post->image = $filename;
            // delete old photo
            Storage::delete($oldFilename);
        }

        $beforeImgFilepath = $this->getImgsFilepathFromBody($bodyBeforeUpdate);
        $afterImgFilepath = $this->getImgsFilepathFromBody($body);

        $filesToRemove = array_diff($beforeImgFilepath, $afterImgFilepath);

        $deleteFile = function($filepath)
        {
            $formattedFilepath = substr(strstr($filepath, "/img/"), 4);
            Storage::delete($formattedFilepath);
        };

        if (!empty($filesToRemove)) {
            array_map($deleteFile, $filesToRemove);
        }

        $post->save();

        Session::flash('success', 'This blog post has been successfully updated!');

        return redirect()->route('posts.show', $post->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->image);

        $deleteFile = function($filepath)
        {
            $formattedFilepath = substr(strstr($filepath, "/img/"), 4);
            Storage::delete($formattedFilepath);
        };

        $imgFilePaths = $this->getImgsFilepathFromBody($post->body);

        if (!empty($imgFilePaths)){
            array_map($deleteFile, $imgFilePaths);
        }

        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
