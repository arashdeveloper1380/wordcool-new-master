<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller{

    public function index(){
        $var = "var";
        blade('form.form', ['var' => $var]);
    }

    public function store(){
        
        if(csrf_check()){
            $validate = [
                'name'  => 'required|max:50|min:2|string',
            ];
            $errors = request()->validate($validate);
            if(!empty($errors)){
                dd($errors);
            }
            $name = request()->post('name');

            $inserted = db()->table('test')->insert(['name' => $name]);
            if($inserted)
            
            redirect()->url('form')->with('success', 'با موفقیت ثبت شد');
        }else{
            dd("no match");
        }
    }

    public function storeValdator(){
        if(csrf_check()){
            
        }else{
            dd("no match");
        }
    }

}