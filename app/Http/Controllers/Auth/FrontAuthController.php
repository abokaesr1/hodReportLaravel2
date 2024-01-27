<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Group;
use App\Helper\Tables;
use App\Models\Trackersheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontAuthController extends Controller
{

    // DashBoard

    public function dashboard(){

        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ){
            $users = User::with('Group')->with('Role')->where('status',1)->get();

        }else{
            $users = User::with('Group')->with('Role')->where('status',1)->where('role_id',4)->where('group_id',auth()->user()->group_id)->get();
        }
        // data table of closed won by Product & Date
        $closed_won_by_product_date = Tables::tableData('closedwon','company_name');
        // data table of closed won by Customer Type
        $closed_won_by_customer_type = Tables::tableData('closedwon','customer_type');
        // data table of closed won by ONWER
        $closed_won_by_account_owner = Tables::tableData('closedwon','account_owner');
// data table of piplineStage
        $piplinestage = Trackersheet::select(
           'stage',
           'company_name',
           'account_owner',
           'expected_revenue',
           'revenue'
        )
        ->where('stage', '!=', 'closedlost')
        ->where('stage', '!=', 'closedwon')
        ->groupBy('stage','company_name','account_owner','expected_revenue','revenue')
        ->get();
        $closed_won_table = Trackersheet::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('YEAR(created_at) as year'),
        'company_name',
        'customer_type',
        'account_owner',
        'last_contact_date',
        'expected_close_date',
        'product_name'
        )
        ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('YEAR(created_at)'),
        'company_name',
        'customer_type',
        'account_owner',
        'last_contact_date',
        'expected_close_date',
        'product_name'
        )
        ->get();
        dd($closed_won_table);
        $trackerData = Trackersheet::get();
        $parentAccounts = Trackersheet::where('parent_account' , 1)->get();
        $childAccounts = Trackersheet::where('chil_account' , 1)->get();
        $totalUsers = User::where('status',1)->geT();
        $trackerColumn = Trackersheet::where('user_id',auth()->user()->id)->count();
        return view('Front_End.pages.dashboard',compact(
            'users',
            'trackerData',
            'totalUsers',
            'trackerColumn',
            'parentAccounts',
            'childAccounts',
            'piplinestage',
            'closed_won_by_product_date',
            'closed_won_by_customer_type',
            'closed_won_by_account_owner'
        ));

    }

    public function databyday(Request $request)
    {
        $selectedOption = $request->input('selectedOption');
        $columnName = $request->input('columnName');

        // Logic to fetch updated total revenue based on $selectedOption
        $totalRevenue = $this->calculateTotalRevenue($selectedOption,$columnName);

        return response()->json(
            ['totalRevenue' => number_format($totalRevenue, 2, '.', ',')
        ]);
    }

    private function calculateTotalRevenue($selectedOption,$columnName)
    {
        $now = Carbon::now();
        switch ($selectedOption) {
            case 'today':
                return Trackersheet::whereDate('created_at', $now->toDateString())->sum($columnName);
            case 'sevendays':
                return Trackersheet::where('created_at', '>=', $now->subDays(7))->sum($columnName);
            case 'onemonth':
                return Trackersheet::where('created_at', '>=', $now->subMonth())->sum($columnName);
            case 'sixmonth':
                return Trackersheet::where('created_at', '>=', $now->subMonths(6))->sum($columnName);
            case 'oneyear':
                return Trackersheet::where('created_at', '>=', $now->subYear())->sum($columnName);
            default:
                return Trackersheet::sum($columnName);
        }
    }
    // login FUCNTIONS.
    public function user_auth_login(){
        return view('Front_End.auth.login');
    }

    public function post_user_auth_login(Request $request){
        $data = $request->all();

        if(empty($data['email']) ||$data['email'] == null ){
            session()->flash('error','the email is missing. Please Try again');
            return back();
        }

        if(empty($data['password']) ||$data['password'] == null ){
            session()->flash('error','the password is missing. Please Try again');
            return back();
        }

        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            if(auth()->user()->status == 1){
                session()->flash('success','Welcome '. auth()->user()->name);
                return redirect()->route('dashboard');
            }else{
                session()->flash('error','the user can not open this page, please contact the admin');
                return back();
            }
    }else{
            session()->flash('error','the credentials are worge. Please Try again');
            return back();
        }
    }

    public function post_user_auth_logout(){
        Auth::logout();
        session()->flash('success','You have logout Successfully !!!!');
            return redirect()->route('login');
    }
    //USERS FUNCTIONS
    public function view_new_user(){
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ){
            $users = User::with('Group')->with('Role')->where('status',1)->get();

        }else{
            $users = User::with('Group')->with('Role')->where('status',1)->where('role_id',4)->where('group_id',auth()->user()->group_id)->get();
        }
        return view('Front_End.auth.index_new_user',compact('users'));
    }
    public function add_new_user(){
        $groups = Group::where('status',1)->get();
        $roles = Role::where('status',1)->get();

        return view('Front_End.auth.add_new_user',compact('roles','groups'));
    }
    public function add_role_user(){
        return view('Front_End.auth.add_user_role');
    }
    public function add_group_user(){
        return view('Front_End.auth.add_user_group');
    }

    public function post_add_new_user(Request $request){
        $data = $request->all();
        if(empty($data['name']) ||$data['name'] == null ){
            session()->flash('error','the name is missing. Please Try again');
        return back();
        }
        if(empty($data['email']) ||$data['email'] == null ){
            session()->flash('error','the email is missing. Please Try again');
        return back();
        }
        #check email exists
        $checkEmail = User::where('email',$data['email'])->count();

        if($checkEmail > 0 ){
            session()->flash('error','the Email is Aleady There. Please change it');
            return back();
        }
        if(empty($data['password']) ||$data['password'] == null ){
            session()->flash('error','the password is missing. Please Try again');
        return back();
        }
        if(empty($data['status']) ||$data['status'] == null ){
            session()->flash('error','the status is missing. Please Try again');
        return back();
        }
        $addNewData = new User();
        $addNewData->form_id = 0;
        $addNewData->group_id = $data['group_leader'];
        $addNewData->role_id = $data['role'];
        $addNewData->name = $data['name'];
        $addNewData->email = $data['email'];
        $addNewData->password = Hash::make($data['password']);
        $addNewData->status = $data['status'];
        $addNewData->save();
        session()->flash('success','the Role has been added');
        return back();

    }
    public function post_add_role_user(Request $request){
        $data = $request->all();
        if(empty($data['name']) ||$data['name'] == null ){
            session()->flash('error','the name is missing. Please Try again');
        return back();
        }
        if(empty($data['position']) ||$data['position'] == null ){
            session()->flash('error','the position is missing. Please Try again');
        return back();
        }
        if(empty($data['status']) ||$data['status'] == null ){
            session()->flash('error','the status is missing. Please Try again');
        return back();
        }
        $addNewData = new Role();
        $addNewData->name = $data['name'];
        $addNewData->position = $data['position'];
        $addNewData->status = $data['status'];
        $addNewData->save();
        session()->flash('success','the Role has been added');
        return back();
    }
    public function post_add_group_user(Request $request){
        $data = $request->all();
        if(empty($data['name']) ||$data['name'] == null ){
            session()->flash('error','the name is missing. Please Try again');
        return back();
        }
        if(empty($data['position']) ||$data['position'] == null ){
            session()->flash('error','the position is missing. Please Try again');
        return back();
        }
        if(empty($data['status']) ||$data['status'] == null ){
            session()->flash('error','the status is missing. Please Try again');
        return back();
        }
        $addNewData = new Group();
        $addNewData->name = $data['name'];
        $addNewData->position = $data['position'];
        $addNewData->status = $data['status'];

        $addNewData->save();
        session()->flash('success','the Group has been added');
        return back();
    }

    // edit

    public function post_edit_new_user($id){
        $user = User::find($id);
        $roles = Role::where('status' , 1 )->get();
        $groups = Group::where('status' , 1 )->get();
        if($user){
            return view('Front_End.auth.edit.edit_new_user',
            compact('user','roles','groups'));
        }else{
            session()->flash('error','the user is not found');
            return back();
        }
    }
    public function post_update_new_user(Request $request,$id){
        $user = User::find($id);
        if($user){
            $data = $request->all();
            if(empty($data['name']) ||$data['name'] == null ){
                session()->flash('error','the name is missing. Please Try again');
            return back();
            }
            if(empty($data['status']) ||$data['status'] == null ){
                session()->flash('error','the status is missing. Please Try again');
            return back();
            }
            User::where('id',$id)->update([
                'form_id'=>0,
                'group_id'=>$data['group_leader'],
                'role_id'=>$data['role'],
                'name'=>$data['name'],
                'status'=>$data['status'],

            ]);
                session()->flash('success','the user has been updated');
                return back();
        }else{
            session()->flash('error','the user is not found');
            return back();
        }
    }
    public function post_edit_role_user($id){
        $role = Role::find($id);
        if($role){
            return view('Front_End.auth.edit.edit_user_role',compact('role'));
        }else{
            session()->flash('error','the role is not found');
            return back();
        }
    }
    public function post_edit_group_user($id){
        $group = Group::find($id);
        if($group){
            return view('Front_End.auth.edit.edit_user_group',compact('group'));
        }else{
            session()->flash('error','the group is not found');
            return back();
        }
    }
    // delete
    public function post_delet_new_user($id){
        $user = User::find($id);
        if($user){
            User::where('id',$id)->delete();
            session()->flash('success','the User has been updated');
            return back();
        }else{
            session()->flash('error','the User is not found');
            return back();

        }
    }
}
