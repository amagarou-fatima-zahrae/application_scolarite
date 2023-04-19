<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
use mysqli;

class Data extends Controller
{
    public function requestData(){
        $connection=mysqli_connect("localhost", "root", "","projetGL", 3306);
        $result=mysqli_query($connection, "SELECT * FROM ETUDIANTS");
//storing in array

$data = array();
while($row =mysqli_fetch_assoc($result)){
   $data[] = $row; 
}
echo json_encode($data);
    }
}
