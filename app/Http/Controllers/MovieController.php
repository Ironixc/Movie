<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Movie;
use Hash;
use Illuminate\Validation\Rule;


class MovieController extends Controller
{
    function register(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'voteaverage'=>'required',
            'overview'=>'required',
            'posterpath'=>'required',
            'category_id'=>'required',
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
            'title'=>$request->get('title'),
            'voteaverage'=>$request->get('voteaverage'),
            'overview'=>$request->get('overview'),
            'posterpath'=>$request->get('posterpath'),
            'category_id'=>$request->get('category_id'),
        ];
        try {
            $insert = Movie::create($data);
            return response()->json(["status"=>true,'messange'=>'Data berhasil ditambahkan']);
        }catch(Exception $e){
            return response()->json(["status"=>false,'messange'=>$e]);
        }
        
    }
    function getMovie() {
        try{
            $Movie = Movie::get();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data user',
                'data'=>$Movie,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data user. '. $e,]);
        }
    }
    function getDetailMovie($id) {
        try{
            $Movie = Movie::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data detail user',
                'data'=>$Movie,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data detail user. '. $e,
            ]);
        }
    }
    function update_Movie($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'voteaverage'=>'required',
            'overview'=>'required',
            'posterpath'=>'required',
            'category_id'=>'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = [
            'title'=>$request->get('title'),
            'voteaverage'=>$request->get('voteaverage'),
            'overview'=>$request->get('overview'),
            'posterpath'=>$request->get('posterpath'),
            'category_id'=>$request->get('category_id'),
        ];
        try {
            $update = Movie::where('id', $id)->update($data);
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
    function hapus_Movie($id) {
        try{
            Movie::where('id',$id)->delete();
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
