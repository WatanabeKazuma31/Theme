<!DOCTYPE html>
<html lang="ja">
<head>

  <meta charset='utf-8"'>

  <link rel='stylesheet' href="{{ asset('/css/app.css') }}">

  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<header>
  <a href="/main"> <img class="logo" src="{{ asset('storage/icon/logo.png') }}" alt="プロフィール画像"></a>
</header>
<body>



  <h1 class="s_results">"{{ $keyword }}"の検索結果</h1>

  <table class='table table-hover tl'>


    @if(!$items->isEmpty())
    @foreach ($items as $item)

    <tr>

      <td><img class="icon" src="{{ asset('storage/icon/'.$item->image) }}" alt="プロフィール画像"></td>

      <td>
        <p><a href="{{ $item->id}}/profile">{{ $item->name }}</a></p>
      </td>


      <td>
        @if(count(array_intersect([$item->id],$id)) > 0)
        <p class="fb followed"><a href="/follow/{{ $item->id }}/delete" onclick="return confirm('[{{ $item->name }}]のフォローを外しますか？')">フォロー中</a></p>
        @else
        <p class="fb follow"><a href="/follow/{{ $item->id }}">フォローする</a></p>
        @endif
      </td>

    </tr>

    @endforeach
    @else
    <p class="s_results">検索結果は０件です</p>
    @endif


  </table>


</body>
</html>
