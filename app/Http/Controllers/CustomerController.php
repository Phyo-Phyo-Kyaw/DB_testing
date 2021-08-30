<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //cust register page
    public function register(){
        return view('customer.register');
    }

    //create customer
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('customer#register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getCustomerData($request);
        //MVC =>model view controller
        //create data
        //model call => array
        Customer::create($data);  //array format
        return back()->with(['insertSuccess' =>'User Information Recorted......']);
    }
    //cust list page
    public function list() {
        $data = Customer::get() ;
        return view('customer.list')->with(['customer' =>$data]);
    }
    //Cust info Seemore
    public function seeMore($id) {
        $data = Customer::where('customer_id', $id)->get()->toArray(); // array
        return view('customer.seeMore')->with(['customer' => $data]);
    }

    //cust info delete
    public function delete($id) {
        $data = Customer::where('customer_id' , $id)->delete();
        return back()->with(['deleteSuccess' => 'Customer Data Deleted']) ;
    }

    //edit cust data
    public function edit($id) {
        $data = Customer::where('customer_id', $id)->first(); // object
        /* var_dump($data->date_of_birth);
        var_dump($data->phone) ; */
        return view('customer.edit')->with(['customer' => $data]);
    }
    //update cust date
    public function update($id , Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('customer#edit' , $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $this->getCustomerData($request);
        $data['id'] = $id ;
        Session::put('CUSTOMER_DATA' ,  $data);
        return redirect()->route('customer#comfirm');
        }

    //Comfirm page
    public function comfirm() {

        
        return view('customer.comfirm')->with(['customer' => Session::get('CUSTOMER_DATA')]);
    }

    public function realUpdate() {
        $data = Session::get('CUSTOMER_DATA') ;
        $id = $data['id'] ;
        unset($data['id']); //remove data in id
        Session::forget('CUSTOMER_DATA') ;
        dd($data);
        Customer::where('customer_id' , $id)->update($data) ;
        return redirect()->route('customer#list')->with(['updateSuccess' => 'Update Success....']);

    }

    //request customer data
    private function getCustomerData($request){
        return [
            'name' => $request->name ,
            'email' => $request->email ,
            'address' => $request->address ,
            'gender' => $request->gender ,
            'date_of_birth' => $request->dateOfBirth ,
            'phone' => $request->phoneNumber ,
        ];
    }
}
