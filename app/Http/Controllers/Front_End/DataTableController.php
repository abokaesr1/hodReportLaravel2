<?php

namespace App\Http\Controllers\Front_End;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Role;
use App\Models\Trackersheet;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function traker_view_table(){
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
            $trakerdata = Trackersheet::orderBy('id','DESC')->get();
        }elseif(auth()->user()->role_id == 3){
            $trakerdata = Trackersheet::orderBy('id','DESC')->where('group_id',auth()->user()->group_id)->get();
        }elseif(auth()->user()->role_id == 4){
            $trakerdata = Trackersheet::orderBy('id','DESC')->where('user_id',auth()->user()->id)->get();
        }
        $group_id = Group::where('id',auth()->user()->group_id)->value('name');
        $role_id = Role::where('id',auth()->user()->group_id)->value('name');
        return view('Front_End.pages.tables.view_data_table',compact('trakerdata'));
    }
    public function traker_add_table(){
        $groups = Group::where('status',1)
        ->where('id','!=', 5)
        ->where('id','!=', 6)->get();
        $roles = Role::where('status',1)->get();
        return view('Front_End.pages.tables.add_new_traker',compact('groups','roles'));
    }

    public function traker_post_table(Request $request)
    {
        $data = $request->all();

        if($data['child_account'] == 'parent'){
            $parent_account = 1;
            $child_account = 0;
        }else{
            $parent_account = 0;
            $child_account = 1;
        }
        if(empty($data['parent_company'])){
            $parent_company = 'null';
        }else{
            $parent_company =$data['parent_company'];
        }

        if($data['stage'] == 'assessment'){
            $probability ='30%';
        }else if($data['stage'] == 'contacted'){
            $probability ='50%';
        }
        else if($data['stage'] == 'proposal'){
            $probability ='70%';
        }
        else if($data['stage'] == 'closedwon'){
            $probability ='100%';
        }
        else if($data['stage'] == 'closedlost'){
            $probability ='0%';
        }
        $traker_data = new Trackersheet();
        $traker_data->user_id = auth()->user()->id;
        $traker_data->group_id = auth()->user()->group_id;
        $traker_data->company_name = $data['company_name'];
        $traker_data->account_owner = $data['account_owner'];
        $traker_data->parent_account = $parent_account;
        $traker_data->chil_account = $child_account;
        $traker_data->parent_company = $parent_company;
        $traker_data->line_manage = $data['line_manage'];
        $traker_data->contact_name = $data['contact_name'];
        $traker_data->position = $data['position'];
        $traker_data->website = $data['website'];
        $traker_data->stage = $data['stage'];
        $traker_data->probability = $probability;
        $traker_data->revenue = $data['revenue'];
        $traker_data->expected_revenue = $data['expected_revenue'];
        $traker_data->type   = $data['type'];
        $traker_data->quote_created = $data['quote_created'];
        $traker_data->customer_type = $data['customer_type'];
        $traker_data->product_name = $data['product_name'];
        $traker_data->comments = $data['comments'];
        $traker_data->action_to_take = $data['action_to_take'];
        $traker_data->last_contact_date = $data['last_contact_date'];
        $traker_data->next_contact_date = $data['next_contact_date'];
        $traker_data->expected_close_date = $data['expected_contact_date'];
        $traker_data->email = $data['email'];
        $traker_data->phone = $data['phone'];
        $traker_data->address = $data['address'];
        $traker_data->country = $data['country'];
        $traker_data->city = $data['city'];
        $traker_data->zip = $data['zip'];
        $traker_data->save();

        session()->flash('success','your data has been added successfully !!!!');
        return back();
    }

    public function tracker_edit($id){
        $tracker = Trackersheet::find($id);
        if($tracker){
            $tracker = Trackersheet::where('id',$id)->first();
            $groups = Group::where('status',1)
            ->where('id','!=', 5)
            ->where('id','!=', 6)->get();
            $roles = Role::where('status',1)->get();
            return view('Front_End.pages.tables.edit_tracker',compact('tracker','groups','roles'));
        }else{
            session()->flash('error','the Data is not found');
            return back();
        }
    }


    public function tracker_edit_post(Request $request, $id)
    {
        $data = $request->all();

        if($data['child_account'] == 'parent'){
            $parent_account = 1;
            $child_account = 0;
        }else{
            $parent_account = 0;
            $child_account = 1;
        }
        if(empty($data['parent_company'])){
            $parent_company = 'null';
        }else{
            $parent_company =$data['parent_company'];
        }

        if($data['stage'] == 'assessment'){
            $probability ='30%';
        }elseif($data['stage'] == 'contacted'){
            $probability ='50%';
        }
        elseif($data['stage'] == 'proposal'){
            $probability ='70%';
        }
        elseif($data['stage'] == 'closedwon'){
            $probability ='100%';
        }
        elseif($data['stage'] == 'closedlost'){
            $probability ='0%';
        }
        Trackersheet::where('id',$id)->update([
            'user_id' => auth()->user()->id,
            'group_id' => auth()->user()->group_id,
            'company_name' => $data['company_name'],
            'account_owner' => $data['account_owner'],
            'parent_account' => $parent_account,
            'chil_account' => $child_account,
            'parent_company' => $parent_company,
            'line_manage' => $data['line_manage'],
            'contact_name' => $data['contact_name'],
            'position' => $data['position'],
            'website' => $data['website'],
            'stage' => $data['stage'],
            'probability' => $probability,
            'revenue' => $data['revenue'],
            'expected_revenue' => $data['expected_revenue'],
            'type'   => $data['type'],
            'quote_created' => $data['quote_created'],
            'customer_type' => $data['customer_type'],
            'product_name' => $data['product_name'],
            'comments' => $data['comments'],
            'action_to_take' => $data['action_to_take'],
            'last_contact_date' => $data['last_contact_date'],
            'next_contact_date' => $data['next_contact_date'],
            'expected_close_date' => $data['expected_contact_date'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'country' => $data['country'],
            'city' => $data['city'],
            'zip' => $data['zip'],
        ]);
        session()->flash('success','your data has been edited successfully !!!!');
        return back();
    }

    public function tracker_delete($id){
        $tracker = Trackersheet::find($id);
        if($tracker){
            Trackersheet::where('id',$id)->delete();
            session()->flash('success','the Data has been Deleted');
            return back();
        }else{
            session()->flash('error','the Data is not found');
            return back();
        }
    }
}
