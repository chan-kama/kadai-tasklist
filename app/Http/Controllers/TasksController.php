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
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('tasks.index', $data);
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
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191', 
        ]);
        
        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            return view('tasks.show', [
                'task' => $task,
            ]);
        }
        
        return redirect('/');
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
        
        if (\Auth::id() === $task->user_id) {
            return view('tasks.edit', [   // tasksフォルダのedit.blade.php（editのview）を呼び出し
                'task' => $task,            // taskはviewに渡す変数名（viewに渡す時はtaskから$taskへ）　
            ]);
        }
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
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191', 
        ]);
        
        $task = Task::find($id);   // Task Modelの$idに該当するレコードを取得
        if (\Auth::id() === $task->user_id) {    
            $task->status = $request->status;
            $task->content = $request->content;   // $requestのcontent（editアクションによる修正されたタスク）を$taskインスタンスのcontentに代入
            $task->save();   // content（修正されたタスク）をテーブルに保存
        }
        
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
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
}
