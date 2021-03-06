<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        if(\Auth::check()) {
            $user = \Auth::User();
            $tasks = $user->tasks()->orderBy('id')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
                //'count_tasks' => 10 みたいなのが入る
                ];
            $data += $this->counts($user);
            //viewの第２引数はビューファイルに値を渡す
            return view('tasks.index',$data);
        }else{
            return view('welcome');
        }
        
        $all_list = Task::all();
        
        return view('tasks.index',['all_lists' => $all_list,]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create',['task' => $task,]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 投稿ボタンが押されると処理はここへ飛ぶ
        // ここでtaskモデルに中身を詰める
        $this->validate($request, ['content' => 'required|max:191',
                                    'status' => "required",]);
        
        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->user_id = \Auth::id();
        $task->save();
        
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
        $task = Task::find($id);
        
        return view('tasks.show',['task' => $task,]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        return view('tasks.edit',['task'=> $task,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['content' => 'required|max:191','status' => 'required',]);
        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        
        return redirect('/');
        //リダイレクトしているためviewは不要
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/');
    }
}
