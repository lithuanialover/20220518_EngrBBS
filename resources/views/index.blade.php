<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>EngrBBS</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <p>新規投稿</p>
  {{-- <p>{{$txt}}</p> --}}
  <form action="/post" method="post">
    <table>
      @csrf
      @error('name')
      <tr>
        <th>Error</th>
        <td>{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>投稿者</th>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      @error('content')
      <tr>
        <th>Error</th>
        <td>{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>投稿内容</th>
        <td>
          <input type="textarea" name="content">
        </td>
      </tr>
    </table>
    <input type="submit" value="送信する">
  </form>
  <div class="post-lists">
    <table>
        <tr class="lists-title">
          <th>名前</th>
          <th>投稿日</th>
          <th>投稿内容</th>
        </tr>
      @foreach ($posts as $post)
        <tr class="lists_content">
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
                <span class="btn-icon"><ion-icon name="create"></ion-icon></span>
              </button>
            </td>
          </form>

          <td>
            <form action="{{ route('bbs.delete', ['id' => $post->id]) }}" method="post">
            @csrf
              <button type="button" class="btn">
                <span class="btn-text">Delete</span>
                <span class="btn-icon"><ion-icon name="trash"></ion-icon></span>
              </button>
             </form>
          </td>
        </tr>
      @endforeach
      </table>
      {{ $posts->links() }}
    </div>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>

{{--
  ⓪FormRequestの設定⇒完了
  ①Seeder作成（1つずつ導入する：合計10個）
  ②表示：勤怠管理の一覧を参考にする
  ③paginationも作る
  --}}