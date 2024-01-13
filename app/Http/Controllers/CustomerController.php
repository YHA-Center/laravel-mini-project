<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    // direct home page
    public function home(){
        $customer = Customer::orderBy('updated_at', 'desc')->get();
        return view('customer.list', compact('customer'));
    }

    // direct create page
    public function createPage(){
        return view('customer.create');
    }

    // update post
    // public function update($id,Request $request){
    //     // dd($request->all(), $id);
    //     $arr = [
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'address' => $request->address,
    //     ];
    //     Customer::where('id', $id)->update($arr);
    //     return redirect()->route('customer.home'); // back()
    // }

    public function update(Request $request){
        $this->checkValidation($request, "update");
        $id = $request->postId;
        $arr = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
        ];
        // dd($request->all());
        if($request->hasFile('image')){
            $old = Customer::select('image')->where('id', $request->postId)->first()->toArray();
            $old = $old['image']; // get old image name
            Storage::delete('public/'.$old); // delete old image
            // update new image
            $filename = uniqid().'_'. $request->file('image')->getClientOriginalName();
            $arr['image'] = $filename;
            $request->file('image')->storeAs('public', $filename);
        }
        Customer::where('id', $id)->update($arr);
        return redirect()->route('customer.home')->with(["success" => "✔ Updated Post - ".$request->title." successfully"]); // back()
    }

    // direct edit page
    public function edit($id){
        $data = Customer::where('id', $id)->first();
        return view('customer.edit', compact('data'));
    }

    // delete
    public function delete($id){
        Customer::where('id', $id)->delete();
        return back()->with(["success" => "👍 Deleted Post successfully"]);
    }

    // create post
    public function create(Request $request){
        $this->checkValidation($request, "create");
        $arr = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
        ];
        if($request->hasFile('image')){
            $filename = uniqid().'_'. $request->image->getClientOriginalName();
            $arr['image'] = $filename;
            $request->image->storeAs('public', $filename);
        }
        Customer::create($arr);
        return redirect()->route('customer.home')->with(["success" => "😎 Created Post - ".$request->title." successfully"]);
    }


    // private
    private function checkValidation($request, $mode){
        $rule = [
            'title' => 'required|min:5|unique:customers,title,'.$request->postId,
            'description' => 'required|min:5',
            'price' => 'required',
            'address' => 'required|min:5',
        ];
        $message = [
            'title.required' => 'title field is empty',
            'description.required' => 'description field is empty',
            'price.required' => 'price field is empty',
            'address.required' => 'address field is empty',
            'title.min' => 'title must be minimum 5 characters',
            'description.min' => 'description must be minimum 5 characters',
            'address.min' => 'address must be minimum 5 characters',
        ];
        if($mode == 'create'){
            $rule['image'] = 'required|file|mimes:png,jpg,jpeg';
        }
        Validator::make($request->all(), $rule, $message)->validate();
    }


}
