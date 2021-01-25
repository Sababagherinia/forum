<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $createdAtFrom;
    private $createdAtTo;

    public function __construct($createdAtFrom , $createdAtTo)
    {
        $this->createdAtFrom = $createdAtFrom;
        $this->createdAtTo = $createdAtTo;
    }
    public function collection()
    {
        $users = User::select('name' , 'created_at' , 'phone')
                    ->where('type' , 'user' )
                    ->where('created_at' , '>=' , $this->createdAtFrom)
                    ->where('created_at' , '<=' , $this->createdAtTo)
                    ->get();


        foreach ($users as $key => $user)
        {
            $users[$key]->created_at = Verta($user->created_at);
        }

        return $users;

    }

}
