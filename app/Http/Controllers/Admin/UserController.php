<?php


namespace App\Http\Controllers\Admin;


use DB;
use Hash;
use App\Models\User;
use App\Models\University;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }


    public function setting()
    {
        $user = User::find(\Auth::User()->id);


        return view('content.apps.user.setting', compact('user'));
    }

    public function storeSetting(Request $request)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
            ;
        }
        $user = User::find(\Auth::User()->id);
        $user->update($input);
        return redirect('/admindashboard')->with('success', 'Profile Setting updated successfully');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $system_id = \Auth::user()->system_id;

        // Fetch users with roles except for the "scholarship" role
        $data = User::where('system_id', $system_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', '!=', 'scholarship'); // Exclude "scholarship" role
            })
            ->orderBy('id', 'DESC')
            ->get();

        return view('content.apps.user.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }



    // public function index2(Request $request)
    // {
    //     $system_id = \Auth::user()->system_id;

    //     // Users with the "scholarship" role
    //     $scholarshipUsers = User::where('system_id', $system_id)
    //         ->whereHas('roles', function ($query) {
    //             $query->where('name', 'scholarship');
    //         })
    //         ->orderBy('id', 'DESC')
    //         ->select('id', 'name', 'email')
    //         ->get();

    //     // Users without any role
    //     $usersWithoutRole = User::where('system_id', $system_id)
    //         ->whereDoesntHave('roles')
    //         ->orderBy('id', 'DESC')
    //         ->select('id', 'name', 'email')
    //         ->get();

    //     // Merge the two collections
    //     $data = $scholarshipUsers->merge($usersWithoutRole);


    //     return view('content.apps.user.index2', compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }



    public function index2(Request $request)
    {
        $system_id = \Auth::user()->system_id;

        $query = User::where('system_id', $system_id)
            ->where(function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('name', 'scholarship');
                })->orWhereDoesntHave('roles');
            })
            ->select('id', 'name', 'email', 'nic'); // Adjust fields as needed

        if ($request->ajax()) {
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('roles', function ($user) {
                    return $user->getRoleNames()->map(function ($role) {
                        return '<label class="badge btn-primary">' . $role . '</label>';
                    })->implode(' ');
                })
                ->addColumn('action', function ($user) {
                    $viewButton = '<a href="' . route('users.show', $user->id) . '" class="btn btn-warning"><i class="fas fa-eye"></i></a>';
                    $editButton = \Auth::user()->can('user-edit') ? '<a href="' . route('users.edit', $user->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>' : '';
                    $deleteButton = \Auth::user()->can('user-delete') && $user->id != 1 ? '<button class="btn btn-danger delete-btn" data-url="' . route('users.destroy', $user->id) . '"><i class="fas fa-trash-alt"></i></button>' : '';

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">' . $viewButton . ' ' . $editButton . ' ' . $deleteButton . '</div>';
                })
                ->rawColumns(['roles', 'action'])
                ->make(true);
        }

        return view('content.apps.user.index2');
    }

    protected function can($permission)
    {
        return \Auth::user()->can($permission);
    }



    // Account Settings
    public function account_settings()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['name' => "Account Settings"]];
        $user = User::where('id', \Auth::User()->id)->first();
        return view('content.apps.user.page-account-settings', ['breadcrumbs' => $breadcrumbs, 'user' => $user]);
    }

    public function update_setting(Request $request)
    {
        $id = \Auth::User()->id;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::find($id);
        //$user->addAllMediaFromTokens();
        $user->update($input);

        Alert::toast('User updated successfully', 'success');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::get();

        $roles = Role::where('system_id', \Auth::User()->system_id)->pluck('name', 'name')->all();
        return view('content.apps.user.create', compact('roles', 'universities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['type'] = 'admin';
        $input['system_id'] = \Auth::User()->system_id;
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        Alert::toast('User created successfully', 'success');
        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('system_id', \Auth::User()->system_id)->find($id);
        return view('content.apps.user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('system_id', \Auth::User()->system_id)->find($id);
        $roles = Role::where('system_id', \Auth::User()->system_id)->pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();


        return view('content.apps.user.edit', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();


        $user->assignRole($request->input('roles'));

        Alert::toast('User updated successfully', 'success');
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('system_id', \Auth::User()->system_id)->find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
