<?php

namespace App\Controllers;

use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\ApplicantModel;
use App\Controllers\BaseController;

class UserController extends ResourceController
{

    public function applicantlogin(){
        
    }
    public function userhome()
    {
        return view('User/userhome');
    }

    public function about()
    {
        return view('User/about');
    }

    public function joblist()
    {
        return view('User/joblist');
    }

    public function jobdetails()
    {
        return view('User/jobdetails');
    }

    public function contact()
    {
        return view('User/contact');
    }

    public function getdata()
    {
        $appli = new ApplicantModel();
        $data = $appli->findAll();
        return $this->respond($data, 200);
    }

    public function save()
    {
        $json = $this->request->getJSON();
        $data=[
            'full_name' => $json->full_name,
            'contact_number' => $json->contact_number,
            'address' => $json->address,
            'email' => $json->email,
            'category' => $json->category,
            'username' => $json->username,
            'password' => $json->password,
        ];
        $appli = new ApplicantModel();
        $r = $appli->save($data);
        return $this->respond($r, 200);
        
    }
}
