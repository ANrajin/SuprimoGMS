<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\User;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::table('roles')->skip(1)->take('5')->get();
        $count = User::count();
        $take = $count - 1;
        $users = DB::table('users')->skip(1)->take($take)->join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.role')->get();
        return view('pages.users.index', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRequest $request)
    {
        //check if directory exist or not
        if (!Storage::exists("public/users")) {
            Storage::makeDirectory("public/users");
        }

        $file = $request->file('image');
        $allowedfileExtension = ['jpeg', 'jpg'];
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);

        if ($check) {
            $image = rand(99, 1000) . '.' . $file->getClientOriginalExtension();
            $data = [
                'role_id' => $request->role,
                'name' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => password_hash($request->password, PASSWORD_DEFAULT),
                'image' => $image,
            ];

            try {
                User::create($data);

                //store image into storage directory
                Storage::putFileAs('public/users', $file, $image);

                $notification = [
                    'message'   =>  'Data successfully inserted',
                    'alert-type'    =>  'success'
                ];
                return redirect()->back()->with($notification);
            } catch (\Throwable $e) {
                $notification = [
                    'message'   =>  $e->getMessage(),
                    'alert-type'    =>  'danger'
                ];
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = [
                'message'   =>  'Supported file types are JPEG or JPG',
                'alert-type'    =>  'warning'
            ];
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = User::find($id);

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json(array("status" => "404", "msg" => $e->getMessage()));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $data = [
                'role_id' => $request->role,
                'name' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
            ];

            DB::table('users')->where('id', $id)->update($data);

            $notification = [
                'message'   =>  'Data successfully updated',
                'alert-type'    =>  'success'
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $e) {
            $notification = [
                'message'   =>  $e->getMessage(),
                'alert-type'    =>  'danger'
            ];
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $arr = $request->id;
        $csv = implode(", ", $arr);

        foreach ($arr as $id) {
            $image = DB::table('users')->select('image')->where('id', $id)->first();
            Storage::delete('public/users/' . $image->image);
        }

        $delete = DB::delete("DELETE FROM users WHERE id IN ($csv)");

        if ($delete) {
            return response()->json(array("status" => "200"));
        }
    }
}
