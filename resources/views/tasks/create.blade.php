@extends('layouts.app')

@section('content')

    <h1>新規タスク作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}   <!-- Form::modelはフォーム作成のためのLaravelCollective関数　HTMLタグの<form>にあたる -->
                    <!-- 第1引数（$task）は対象となるインスタンス（createアクションで作成したもの） -->
                    <!-- 第2引数（連想配列部）はHTMLタグのaction属性にあたる　method="POST"にあたる部分はデフォルトなので省略） -->
            
                <div class="form-group">
                    {!! Form::label('status', 'ステータス：') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク：') !!}   <!-- Form::labelはフォームのラベル作成のためのLaravelCollective関数　<form>にあたる -->
                        <!-- 第1引数はインスタンス（$task）のcontentカラムを与える　第2引数はラベル名 -->
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}   <!-- Form::textはフォームのテキスト入力欄作成のためのLaravelCollective関数　<input type="text">にあたる -->
                        <!-- 第1引数は$taskのcontentカラムを与える　第2引数は入力欄の固定の初期値　第3引数は属性情報（class="form-control"にあたる -->
                </div>
                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}   <!-- 送信ボタン生成の関数 -->
                    <!-- 第1引数はボタンの表示名　第2引数は属性情報（class="btn btn-primary"にあたる -->
                
            {!! Form::close() !!}   <!-- フォーム終了　HTMLタグの</form>にあたる -->
        </div>
    </div>
@endsection