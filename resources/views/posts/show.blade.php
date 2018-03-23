@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-default btn-primary">Go Back</a>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-primary">编辑文章</a>
{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
    {{Form::hidden('_method','delete')}}
    {{Form::submit('删除文章',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
<hr>
<h1>{{$post->title}}</h1>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
<br>
<br>
<div>
    {!!$post->body!!}
</div>
<hr>
<div class="d-flex p-2 flex-row-reverse text-right">written on {{$post->created_at}} by {{$post->user->name}}</div>
<hr>
<div class="card">
        <div class="card-header">
            评论
        </div>
        <div class="card-body">
            <div class="form-group">
                {!!Form::open(['action'=>['CommentsController@store',$post->id],'method'=>'POST'])!!}
                {{ Form::textarea('comment-body', null, ['id'=>'article-ckeditor','class' => 'form-control','placeholder' => '评论内容'])}}
                    <p class="text-right">{{Form::submit('发送',['class'=>'btn btn-warning'])}}</p>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    @if(count($comments)>0)
    <hr>
    <div class="card">
            <div class="card-header">
                <h5 class="text-info">之前的评论</h5>
            </div>
            <div class="card-body">
                <section class="comments">
                    @foreach($comments as $comment)
                    <article class="comment">
                      <a class="comment-img" href="#non">
                        <img src="https://pbs.twimg.com/profile_images/444197466133385216/UA08zh-B.jpeg" alt="" width="50" height="50">
                      </a>
                      <div class="comment-body">
                        <div class="text">
                          <p>{!!$comment->content!!}</p>
                        </div>
                    <p class="attribution">by {{$comment->ownerUser->name}} at {{$comment->updated_at}}</p>
                      </div>
                    </article>
                    @endforeach
                  </section>
            </div>
          </div>
    @endif
@endsection