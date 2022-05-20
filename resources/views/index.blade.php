@extends('layouts.app')

@section('main')
<div class="body-box">
  <div class="post">
    <h2 class="post-ttl">新規投稿</h2>
    {{-- <p>{{$txt}}</p> --}}
    <form action="/post" method="post">
      <table class="post-table">
        @csrf
        @error('name')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr class="post-tr">
          <th>投稿者</th>
          <td>
            <input type="text" name="name">
          </td>
        </tr>
        @csrf
        @error('date')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr class="post-tr">
          <th>投稿日</th>
          <td>
            <input type="date" name="date">
          </td>
        </tr>
        @error('content')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr class="post-tr">
          <th>投稿内容</th>
          <td>
            <input type="textarea" name="content">
          </td>
        </tr>
      </table>
      <button type="submit" class="btn">
        <span class="btn-text">Submit</span>
      </button>
      {{-- <input type="submit" value="送信する"> --}}
    </form>
  </div>
  <div class="post-lists">
    <h2 class="post-ttl">投稿一覧</h2>
    <table class="post-table">
        <tr class="lists-tr">
          <th>投稿者</th>
          <th>投稿日</th>
          <th>投稿内容</th>
        </tr>
      @foreach ($posts as $post)
        <tr class="lists-content">
          <td>{{$post->name}}</td>
          <td>{{$post->date}}</td>
          <form action="{{ route('bbs.update', ['id' => $post->id]) }}" method="post">
            @csrf
            <td>
              <input type="text" value="{{$post->content}}" name="content">
            </td>
            <td>
              <button type="button" class="btn">
                <span class="btn-text">Edit</span>
              </button>
            </td>
          </form>
          <td>
            <form action="{{ route('bbs.delete', ['id' => $post->id]) }}" method="post">
            @csrf
              <button type="button" class="btn">
                <span class="btn-text">Delete</span>
              </button>
             </form>
          </td>
        </tr>
      @endforeach
      </table>
    </div>
    <div>
    {{ $posts->links() }}
    </div>
</div>
@endsection