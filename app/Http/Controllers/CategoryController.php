<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use Hash;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    function register(Request $request){
        $validator = Validator::make($request->all(),[
            'category_name'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'status'=>false,
                    'messange' =>$validator->errors(),
                ]
                );
        }
        $data = [
            'category_name'=>$request->get('category_name'),
        ];
        try {
            $insert = Category::create($data);
            return response()->json(["status"=>true,'messange'=>'Data berhasil ditambahkan']);
        }catch(Exception $e){
            return response()->json(["status"=>false,'messange'=>$e]);
        }
        
    }
    function getCategory() {
        try{
            $Category = Category::get();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data user',
                'data'=>$Category,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data user. '. $e,]);
        }
    }
    function getDetailCategory($id) {
        try{
            $Category = Category::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data detail user',
                'data'=>$Category,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data detail user. '. $e,
            ]);
        }
    }
    function update_Category($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'category_name'=>'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = [
            'category_name'=>$request->get('category_name'),
        ];
        try {
            $update = Category::where('id', $id)->update($data);
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil diupdate'
            ]);


        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>$e
            ]);
        }
    }
    function hapus_Category($id) {
        try{
            Category::where('id',$id)->delete();
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil dihapus'
            ]);
        } catch(Exception $e){
            return Response()->json([
                "status"=>false,
                'message'=>'gagal hapus user. '.$e,
            ]);
        }
    }
}
