<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class employeesController extends Controller
{
public function loginCheck(Request $request){
    $checkEmployee = DB::table('employees')->where('login', $request->input('login'))
        ->where('password', $request->input('password'))->first();

    if (isset($checkEmployee)){
        $checkAccess = DB::table('accesses')->where('id', $checkEmployee->id_access)->value('access');
            if ($checkAccess == 'сотрудник'){
                return view('employee.index');
            }elseif ($checkAccess == 'админ'){
                return view('admin.index');
            }else{

            }
    }
}
}
