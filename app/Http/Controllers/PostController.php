<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Category;
use Cloudinary;

/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    //getPaginateByLimit()はPost.phpで定義したメソッドです。
    }
    
    /**
    * 特定IDのpostを表示する  
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request, Category $category) // 引数をRequestからPostRequestにする
    {
        $input_post = $request['post']; //$input_postに$requestの'post'を代入
        $input_post += ['user_id' => $request->user()->id]; //$input_postにuser_idとして、request中のuserのidを代入
        $input_categories = $request->categories_array; //input_categoriesに$request中のcategories_arrayを追加
        
        if($image = $request->file('image')) {
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); //image_uralにCloudinaryのuploadを実行($requestのfile('image')の絶対パスを確保→)安全なパスに変更したものを格納
            $input_post += ["image_path" => $image_url];
            //dd($image_url);  //画像のURLを画面に表示
        };
        
        $post->fill($input_post)->save();

        $post->categories()->attach($input_categories); 
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    //public function createcomment(Post $post)
    //{
    //   return view('posts/createcomment');
    //}
    
}
?>