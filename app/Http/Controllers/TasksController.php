<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();   // Task Modelの全レコードを取得　$taskに代入
        
        return view('tasks.index', [   // tasksフォルダのindex.blade.php（indexのview）を呼び出し
            'tasks' => $tasks,   // tasksはviewに渡す変数名（viewに渡す時はtasksから$tasksへ）　
        ]);                         // tasksに$tasks（Task Modelの全レコード）の内容を代入
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;   // createアクションでは変数に代入するのは1つだけなので$taskと単数形で
                           // Taskモデル（Task.php）からインスタンスを作成　$taskへ代入
    
        return view('tasks.create', [   // tasksフォルダのcreate.blade.php（createのview）を呼び出し
           'task' => $task,   // taskはviewに渡す変数名（viewに渡す時はtaskから$taskへ）　
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   // createアクションのフォームから送信されたデータは$requestに入っている
    {
        $task = new Task;   // Taskモデルからインスタンスを作成し$taskに代入
        $task->content = $request->content;   // $requestのcontent（createアクションのフォームに入力された新しいタスク）を$taskインスタンスのcontentに代入
        $task->save();   // 新しいcontent（新しいタスク）をテーブルに保存
        
        return redirect('/');   // トップページへ遷移
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);   // Task Modelの$idに該当するレコードを取得
        
        return view('tasks.show', [   // tasksフォルダのshow.blade.php（showのview）を呼び出し
            'task' => $task,   // taskはviewに渡す変数名（viewに渡す時はtaskから$taskへ）　
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);   // Task Modelの$idに該当するレコードを取得
        
        return view('tasks.edit', [   // tasksフォルダのedit.blade.php（editのview）を呼び出し
            'task' => $task,            // taskはviewに渡す変数名（viewに渡す時はtaskから$taskへ）　
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   // editアクションのフォームから送信されたデータは$requestに入っている
    {
        $task = Task::find($id);   // Task Modelの$idに該当するレコードを取得
        $task->content = $request->content;   // $requestのcontent（editアクションによる修正されたタスク）を$taskインスタンスのcontentに代入
        $task->save();   // content（修正されたタスク）をテーブルに保存
        
        return redirect('/');   // トップページへ遷移
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);   // Task Modelの$idに該当するレコードを取得
        $task->delete();   // 取得されたレコード（$task)をテーブルから削除
        
        return redirect('/');   // トップページへ遷移
    }
}
