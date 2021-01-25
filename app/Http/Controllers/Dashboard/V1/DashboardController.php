<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;
use Gate;

class DashboardController extends Controller
{
    public function home()
    {


        $pageTitle = "داشبورد - صفحه اصلی";
        return view('Dashboard.home', compact(
            'pageTitle'
            ));
    }





}
