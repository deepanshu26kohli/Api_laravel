<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Http\Request;
use Validator;
class DeviceController extends Controller
{
    function list($id=null){
             return $id?Device::find($id):Device::all();
    }
    function add(Request $req){
    //    dd($req);
        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result){
            return ["Result" => "Data has been saved"];
        }
        else{
            return ["Result" => "Data has not been saved"];
        }
    }
    function update(Request $req){
        $device =  Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result){
            return ["Result" => "Data has been updated"];
        }
        else{
            return ["Result" => "Data has not been updated"];
        }
    }
    function search($name){
        $res = Device::where("name","like","%".$name."%");
        
        if($res->exists()){
            return $res->get();
        }
        else{
            return "No results found for ".$name;
        }
    }
    function delete($id){
        $device = Device::find($id);
        if($device){
            $res = $device->delete();
        }
        else{
            return "data not present in DB";
        }
        if($res){
            return "deleted successfully";
        }
        else{
            return "Not deleted";
        }
    }
    function testData(Request $req){
        $rules = array(
            "member_id" => "required|min:2|max:4"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            $device = new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if($result){
                return "Data has been saved";
            }
            else{
                return "Data has not been saved";
            }
           
        }
    }
}
