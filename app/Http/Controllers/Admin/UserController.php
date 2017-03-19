<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;

class UserController extends Controller
{
    protected $fields = [
        'name' => '',
        'email' => '',
        'roles' => [],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $users = Admin::paginate(10);
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['roles'] = Role::all()->toArray();
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirmPassword',
            'roles' => 'required'
        ]);

        $user = new Admin();
        foreach (array_keys($this->fields) as $field) {
            $user->$field = $request->get($field);
        }
        if ($request->get('password') != '' && $request->get('repassword') != '' && $request->get('password') == $request->get('repassword')) {
            $user->password = bcrypt($request->get('password'));
        } else {
            return redirect()->back()->withErrors('密码或确认密码不能为空！');
        }
        unset($user->roles);
        $user->save();
        if (is_array($request->get('roles'))) {
            $user->giveRoleTo($request->get('roles'));
        }
        return redirect('/admin/user')->withSuccess('添加成功！');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirmPassword',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')->with('success','User created successfully');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $admin = Admin::find((int)$id);
        if (!$admin) return redirect('/admin/user')->withErrors("找不到该用户!");
        //dd(9);
        $roles = [];
        /*if ($admin->roles) {
            foreach ($admin->roles as $v) {
                $roles[] = $v->id;
            }
        }*/
        $admin->roles = $roles;
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $admin->$field);
        }
        $data['rolesAll'] = Role::all()->toArray();
        $data['id'] = (int)$id;
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $admin = Admin::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $admin->$field = $request->get($field);
        }
        if ($request->get('password') != '' || $request->get('repassword') != '') {
            if ($request->get('password') != '' && $request->get('repassword') != '' && $request->get('password') == $request->get('repassword')) {
                $admin->password = bcrypt($request->get('password'));
            } else {
                return redirect()->back()->withErrors('修改密码时,密码或确认密码不能为空！');
            }
        }

        unset($admin->roles);
        
        $admin->giveRoleTo($request->get('roles',[]));

        return redirect('/admin/user')->withSuccess('添加成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Admin::find((int)$id);
        if ($tag && $tag->id != 1) {
            $tag->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }
}
