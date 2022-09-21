<?php

namespace App\Exports;

use App\Models\WpUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class WpusersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WpUser::select('ID','display_name','user_login')->get();
        /*return WpUser::join('wp_usermeta','wp_usermeta.user_id','=','wp_users.ID')
        ->join('alumnos','alumnos.wp_user_id','=','wp_users.ID')
        ->where('meta_key','wp_capabilities')
        ->select('wp_users.ID as wid','alumnos.ID as aid','wp_users.user_login','wp_users.display_name','wp_usermeta.meta_key','wp_usermeta.meta_value')->get();
        */
    }
}
