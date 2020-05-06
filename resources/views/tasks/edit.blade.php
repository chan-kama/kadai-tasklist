@extends('layouts.app')

@section('content')

    <h1>id： {{ $task->id }} のタスク編集ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}   <!-- Form::modelでフォーム作成 -->
                    <!-- 第1引数の$taskはeditアクションで作成したもの　第2引数はaction属性（URLの末尾にidがつくようにidも渡す）　第4引数でmethodの種類を渡す -->
            
                <div class="form-group">
                    {!! Form::label('status', 'ステータス：') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク：') !!}   <!-- 第1引数で$taskのcontentカラムを与える　第2引数はラベル名 -->
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}   <!-- 第1引数は$taskのcontentカラムを与える　第2引数は入力欄の固定の初期値　第3引数は属性情報 -->
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}   <!-- 第1引数は表示名　第2引数は属性情報（class="btn btn-primary"にあたる -->
                
            {!! Form::close() !!}   <!-- フォーム終了　HTMLタグの</form>にあたる -->
        </div>
    </div>

@endsection