<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Comment;
use App\Video;
use App\Tag;

class TestController extends Controller
{
    public function morphOne()
    {   //retrieve data
         //  $post = Post::first();
         //  return $post->image;
        //inverse
         //$img = Image::first();
         //return $img->imageable;

        //create
         //$post = Post::first();
         //$post->image()->create(["url"=>"test/test.jpg"]);
    }

    public function morphMany(){
         // $post = Post::with("comments")->get();
          //return PostResource::collection($post);
        //inverse
         //$comments = Comment::with("commentable")->get();
         //return CommentResource::collection($comments);

        //create
        //Video::create(["title"=>"test video", "url"=>"test/test.mp3"]);
        //$video = Video::first();
        //$video->comments()->create(["content"=>"Video yorumu"]);

        //video
        //return Video::first()->comments;
    }

    public function morphManyToMany(){

      //  $post = Post::with("tags")->get();
       // return PostResource::collection($post);

       // $tag = Tag::with(["posts", "videos"])->get();
       // return TagResource::collection($tag);
        //create
     //   $post = Post::find(1);
      //  $tag = new Tag;
     //   $tag->name = "mobile";
      //  return $post->tags()->save($tag);

      //  $video = Video::first();
      //  $tag = new Tag;
      //  $tag->name = "videotag";
      //  return $video->tags()->save($tag);

     //   $post = Post::find(1);
     //   $tag1 = new Tag;
     //   $tag1->name = "post tag1";
     //   $tag2 = new Tag;
     //   $tag2->name = "post tag2";
     //   return $post->tags()->saveMany([$tag1, $tag2]);

     //   $video = Video::find(1);
     //   $tag1 = Tag::find(1);
     //   $tag2 = Tag::find(2);
     //   $video->tags()->attach([$tag1->id, $tag2->id]);


     //   $post = Post::find(1);
     //   $tag1 = Tag::find(3);
     //   $tag2 = Tag::find(4);
     //   return $post->tags()->sync([$tag1->id, $tag2->id]);

        $video = Video::find(1);

        $tag1 = Tag::find(3);
        $tag2 = Tag::find(4);

        return $video->tags()->sync([$tag1->id, $tag2->id]);

    }
}
