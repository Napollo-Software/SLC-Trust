<?php
 
namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;
use Maatwebsite\Excel\Concerns\WithStartRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row 
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = now();
        if($row[12]!=null){
        $date= Date::excelToDateTimeObject($row[12]);
        }
        $billing_cycle = 1;
        $notify_before = 2;
        $path = 'user/images';
        $fontpath = public_path('fonts/oliciy.ttf');
        $char = strtoupper($row['1'][0]);
        $newAvatarname = rand(12,34355).time().'_avatar.png';
        $dest = $path.$newAvatarname;

        $createAvatar = makeAvatar($fontpath, $dest, $char);
        $avatar = $createAvatar == true ? $newAvatarname : '';
        $address = $row['18'].' '.$row['19'];
        $phone = $row['6'];
          if($row['7'] != '--'){
            $phone = $phone.' , '.$row['7'];
          }
          if($row['8'] != '--'){
            $phone = $phone.' , '.$row['8'];
          }
          if($row['19'] == '--'){
            $address = $row['18'];
          }
          if($row['60'] != null){
             $billing_cycle = $row['60'];
          }
          if($row['61'] != null){
             $notify_before = $row['61'];
          }
        if($row['3']=="--" || $row['3']==""){
          $fname =  strtolower($row['1']);
          $lname =  strtolower($row['2']);
          $email = $fname.$lname.'@intrustpit.com';  
          $user = User::where('email',$email)->first();   
          if(!$user)
          {
            return  new User([
              'name'      => $row['1'],
              'last_name' => $row['2'],
              'email'     => $email,
              'phone'     => $phone,
              'dob'       => $date,
              'full_ssn'  => $row['14'],
              'gender'    => $row['17'],
              'address'   => $address,
              'city'      => $row['21'],
              'state'     => $row['22'],
              'zipcode'   => $row['20'],
              'avatar'    => $avatar,
              'billing_cycle' => $billing_cycle,
              'notify_before' =>$notify_before,
              'account_status'=>'Approved',
              'password' => \Hash::make(strtolower($row['1'])),
          ]);
        }     
        }
    else{
          $email= $row['3'];
          $user = User::where('email',$email)->first();
          if(!$user)
          {
            return  new User([
              'name'      => $row['1'],
              'last_name' => $row['2'],
              'email'     => $email,
              'phone'     => $phone,
              'dob'       => $date,
              'full_ssn'  => $row['14'],
              'gender'    => $row['17'],
              'address'   => $address,
              'city'      => $row['21'],
              'state'     => $row['22'],
              'zipcode'   => $row['20'],
              'avatar'    => $avatar,
              'billing_cycle' => $billing_cycle,
              'notify_before' =>$notify_before,
              'account_status'=>'Approved',
              'password' => \Hash::make(strtolower($row['1'])),
          ]);
        }
      }
    }
    public function startRow(): int
    {
        return 2;
    }
}
