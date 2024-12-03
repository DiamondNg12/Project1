<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\KhoaDaoTao;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Models\KhoaHoc;
use App\Models\LopHocCoSo;
use App\Models\LopHocPhan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        // $pageTitle = trans('global-message.list_form_title',['form' => trans('users.title')] );
        // $auth_user = AuthHelper::authSession();
        // $assets = ['data-table'];
        // $headerAction = '<a href="'.route('users.create').'" class="btn btn-sm btn-primary" role="button">Add User</a>';
        // return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
        $users= User::where('user_type', '<>', 'admin')->get();
        return view('users.list-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::where('status',1)->get()->pluck('title', 'id');

        // return view('users.form', compact('roles'));
        $users= User::all();
        $khoa_dao_taos = KhoaDaoTao::all();
        $khoa_hocs = KhoaHoc ::all();
        $lop_hoc_co_sos= LopHocCoSo::all();
        return view('users.new-user', compact('users','khoa_dao_taos','khoa_hocs','lop_hoc_co_sos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //dd($request->all());
            $gioiTinh = ($request->gioi_tinh == 'Nam') ? 1 : 2;  // Nam => 1, Nữ => 2
            //dd($gioiTinh);
            $tinh_trang = ($request->tinh_trang == 'Hoạt động') ? 1 : 2;
            $check = User::where('code', $request->code)->first();
            if ($check) {
                session()->flash('error', 'Mã người dùng đã tồn tại');
                return redirect()->route('users.create');
            }
            $user_moi = [
                'ho_ten' => $request->ho_ten,
                // 'avatar' => $request->avatar,
                'code' => $request->code,
                'ngay_sinh' => $request->ngay_sinh,
                'khoa_dao_tao_id' => $request->khoa_dao_tao_id,
                'khoa_hoc_id' => $request->khoa_hoc_id,
                'lop_hoc_co_so_id' => $request->lop_hoc_co_so_id,
                'gioi_tinh' => $gioiTinh,
                'email' => $request->email,
                'user_type' => $request->user_type,
               'password' => $request->password,
                'tinh_trang' =>$tinh_trang
            ];
            $user = User::create($user_moi);
            // $userData = $request->only([
            //     'ho_ten', 'code', 'ngay_sinh', 'khoa_dao_tao_id',
            //     'khoa_hoc_id', 'lop_hoc_co_so_id', 'gioi_tinh',
            //     'email', 'user_type','password', 'tinh_trang'
            // ]);
            // $user = User::create($userData);
            $role = $request->user_type;
            if (!in_array($role, ['admin', 'user', 'otherRole'])) {
                throw new \Exception('Vai trò không hợp lệ');
            }

            if ($user) {
                $user->assignRole($request->user_type);
                session()->flash('success', 'Thêm mới người dùng thành công!');
            } else {
                session()->flash('error', 'Thêm mới người dùng thất bại!');
            }

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            // session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            session()->flash('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            return redirect()->route('users.index');
        }


            $user_moi = [
                'ho_ten' => $request->ho_ten,
                // 'avatar' => $request->avatar,
                'code' => $request->code,
                'ngay_sinh' => $request->ngay_sinh,
                'khoa_dao_tao_id' => $request->khoa_dao_tao_id,
                'khoa_hoc_id' => $request->khoa_hoc_id,
                'lop_hoc_co_so_id' => $request->lop_hoc_co_so_id,
                'gioi_tinh' => $request->gioi_tinh,
                'email' => $request->email,
                'user_type' => $request->user_type,
               'password' => $request->password,
                'tinh_trang' => $request->tinh_trang,
            ];
            $user = User::create($user_moi);



        // $request['password'] = bcrypt($request->password);

        // $request['username'] = $request->username ?? stristr($request->email, "@", true) . rand(100,1000);

        // $user = User::create($request->all());

        // storeMediaFile($user,$request->profile_image, 'profile_image');

        // $user->assignRole('user');

        // // Save user Profile data...
        // $user->userProfile()->create($request->userProfile);

        // return redirect()->route('users.index')->withSuccess(__('message.msg_added',['name' => __('users.store')]));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::with('roles')->findOrFail($id);

        $profileImage = getSingleMedia($data, 'profile_image');
        $auth = auth()->user();

        return view('users.profile', compact('data', 'profileImage', 'auth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::with('userProfile','roles')->findOrFail($id);

        $data['user_type'] = $data->roles->pluck('id')[0] ?? null;

        $roles = Role::where('status',1)->get()->pluck('title', 'id');

        $profileImage = getSingleMedia($data, 'profile_image');

        return view('users.form', compact('data','id', 'roles', 'profileImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // dd($request->all());
        $user = User::with('userProfile')->findOrFail($id);

        $role = Role::find($request->user_role);
        if(env('IS_DEMO')) {
            if($role->name === 'admin'&& $user->user_type === 'admin') {
                return redirect()->back()->with('error', 'Permission denied');
            }
        }
        $user->assignRole($role->name);

        $request['password'] = $request->password != '' ? bcrypt($request->password) : $user->password;

        // User user data...
        $user->fill($request->all())->update();

        // Save user image...
        if (isset($request->profile_image) && $request->profile_image != null) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        // user profile data....
        $user->userProfile->fill($request->userProfile)->update();

        if(auth()->check()){
            return redirect()->route('users.index')->withSuccess(__('message.msg_updated',['name' => __('message.user')]));
        }
        return redirect()->back()->withSuccess(__('message.msg_updated',['name' => 'My Profile']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('users.title')]);

        if($user!='') {
            $user->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('users.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }

    public function redirectIndex(){
        if(Auth::check()){
            $auth_user = auth()->user();
            if($auth_user->user_type == 'user'){
                return redirect()->route('thong-tin-sinh-vien.index');
            } else {
                return redirect()->route('users.index');
            }
        } else {
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
