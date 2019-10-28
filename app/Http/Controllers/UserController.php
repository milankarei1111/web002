<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查詢頁面+分頁
        $users = User::paginate(3);
        // dd($users);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 新增頁面
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 新增
       User::create($request->all());
       return redirect()->route('home.users.index')->with('message', '新增資料成功!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 顯示單筆
        $find = new User();
        $user = $find->find($id)->toArray();
        // $users = $find->find($id);
        // dd($users);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 編輯頁面並顯示舊資料
        $find = new User();
        $user = $find->find($id)->toArray();
        return view('user.edit', compact('user'));
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
        // 更新
        $find = User::find($id);
        $find->name = $request['name'];
        $find->email = $request['email'];
        $find->save();
        return redirect()->route('home.users.index')->with('message', '更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 刪除
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home.users.index')->with('message', '刪除成功');
    }
}
