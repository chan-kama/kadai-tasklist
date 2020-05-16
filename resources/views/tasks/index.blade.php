@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)   <!--TasksControllerのindexアクションから渡された$tasks　$tasksにレコードがあれば（0で無ければ）以下の処理を実行 -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)   <!-- foreach文で$tasks内のレコードを1つずつ取り出して$taskに代入 -->
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>   <!-- 第1引数はリンク先　第2引数はリンク表示させる文字列（今回は$taskからidを取得して表示） -->
                                                                                                <!-- 第3引数はリンク先のURL末尾に代入する値（今回は$taskからidを取得） -->
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>   <!-- $task内のcontentカラムを取得 -->
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-primary']) !!}   <!-- 新規タスクの追加ボタンを設置 -->
        <!-- link_to_routeはリンク作成のためのLaravelCollective関数　第1引数はリンク先　第2引数はリンク表示させる文字列 -->
        <!-- 第3引数はリンク先のURL末尾に代入する値（今回は不要なので空欄）　第4引数はHTMLタグの属性を指定（今回はHTMLでclass="btn btn-primary"となる） -->
    
    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
    
@endsection