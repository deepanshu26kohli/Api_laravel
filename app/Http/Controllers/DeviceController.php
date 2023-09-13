<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;

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
}
