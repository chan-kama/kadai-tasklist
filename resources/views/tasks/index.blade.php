@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <h1>「{{ Auth::user()->name }}」のタスク一覧</h1>
    
        @if (count($tasks) > 0)   <!--TasksControllerのindexアクションから渡された$tasks　$tasksにレコードがあれば（0で無ければ）以下の処理を実行 -->
            @include('tasks.tasks', ['tasks' => $tasks])
        @endif
    
        {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-primary']) !!}   <!-- 新規タスクの追加ボタンを設置 -->
            <!-- link_to_routeはリンク作成のためのLaravelCollective関数　第1引数はリンク先　第2引数はリンク表示させる文字列 -->
            <!-- 第3引数はリンク先のURL末尾に代入する値（今回は不要なので空欄）　第4引数はHTMLタグの属性を指定（今回はHTMLでclass="btn btn-primary"となる） -->
    @else
        <h1>Try! TaskList</h1>
        {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
        
    @endif
@endsection