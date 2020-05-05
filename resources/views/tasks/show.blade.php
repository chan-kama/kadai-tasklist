@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>   <!-- showアクションから渡されたレコード$taskのidを表示 -->
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>   <!-- レコード$taskのidを表示 -->
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>   <!-- レコード$taskのcontentの内容を表示 -->
        </tr>
    </table>
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-light']) !!}
        <!-- 第1引数はリンク先　第2引数はリンク表示させる文字列 -->
        <!-- 第3引数はリンク先のURL末尾に代入する値（今回は$taskから取得したid）　第4引数はHTMLタグの属性を指定 -->
        
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            <!-- 第1引数（$task）は対象となるインスタンス（destroyアクションで作成したもの） -->
                    <!-- 第2引数はHTMLタグのaction属性　method属性も指定 -->
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}   <!-- 削除ボタンの生成 -->
    {!! Form::close() !!}   <!-- フォーム終了 -->

@endsection