<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(2);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // 驗證
        $validateData = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ]);
            $result = false;
            $result = User::create([
                'name' =>  $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            $str = '';
            if($result == true) {
                $str = $request['name'].': 新增成功!';
            } else {
                $str = $request['name'].': 新增失敗!!';
            }
            return redirect()->route('home.users.index')->with('message', $str);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find = new User();
        $user = $find->find($id)->toArray();
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
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $result = $user->save();

        $str = '';
        if($result == true) {
            $str = $request['name'].': 更新成功!';
        } else {
            $str = $request['name'].': 更新失敗!!';
        }
        return redirect()->route('home.users.index')->with('message', $str);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = false;
        $result = $user->delete();
        $str = '';
        if($result == true) {
            $str = $user->name.': 刪除成功!';
        } else {
            $str = $user->name.': 刪除失敗!!';
        }
        return redirect()->route('home.users.index')->with('message', $str);
    }
}
