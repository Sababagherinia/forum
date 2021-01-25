<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public static function prerequisites()
    {


        return [
            "brandName" => "فروم",
            "siteMainTitle" => " صفحه اصلی",
            "siteMainDescription" => "فروم",

        ];
    }

    public static function errorMessage($validator)
    {
        if (is_array($validator)) {
            alert()->error(join("<br>", $validator))->html()->persistent('خب');
        } elseif (is_string($validator)) {
            alert()->error($validator)->html()->persistent('خب');
        } else {

            $errors = [];
            foreach ($validator->errors()->messages() as $error)
                foreach ($error as $item)
                    $errors[] = $item;
            alert()->error(join("<br>", $errors))->html()->persistent('خب');
        }
    }

    public static function successMessage($messages)
    {
        if (is_array($messages))
            alert()->success(join("<br>", $messages))->html()->persistent('خب');
        elseif (is_string($messages))
            alert()->success($messages)->html()->persistent('خب');
    }





}
