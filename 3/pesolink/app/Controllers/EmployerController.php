<?php

namespace App\Controllers;
// use App\Models\PostjobModel;
use App\Controllers\BaseController;

class EmployerController extends BaseController
{

    private $postjob;
    private $registeremp;

    public function __construct()
    {
        $this->registeremp = new \App\Models\EmployerRegistrationModel();
        $this->postjob = new \App\Models\PostjobModel();
    }

   

    public function employerhome()
    {
        return view('Employer/employerhome');
    }

    public function postvacancy()
    {
        return view('Employer/postvacancy');
    }

    public function jobpost()
    {
        $data = [
            'jobsposted' => $this->postjob->findAll(),
        ];
        return view('Employer/jobpost', $data);
    }

    public function jobdetails($vacancy_id = null)
    {
        $data = [
            'details' => $this->postjob->where('vacancy_id', $vacancy_id)->first(),
        ];
        return view('Employer/jobdetails', $data);
    }

    public function jobapplicants()
    {
        return view('Employer/jobapplicants');
    }

    // public function emplogin()
    // {
    //     return view('Employer/employerlogin');
    // }

    public function empregister()
    {
        return view('Employer/empregister');
    }

    public function addjob(){
        // $postjob = new PostjobModel();
        $data=[
            'company_name'=> $this->request->getVar('company_name'),
            'occupation_title'=> $this->request->getVar('occupation_title'),
            'required_no'=> $this->request->getVar('required_no'),
            'location'=> $this->request->getVar('location'),
            'qualification'=> $this->request->getVar('qualification'),
            'job_description'=> $this->request->getVar('job_description'),
            'prefered'=> $this->request->getVar('prefered'),
            'category'=> $this->request->getVar('category'),
            'salary'=> $this->request->getVar('salary'),
            'per'=> $this->request->getVar('per'),
        ];
        $this->postjob->insert($data);
        // redirect()->to('/employerhome');
        return $this->response->redirect(site_url('/employerhome'));
    }

    public function jobpost_cancel($vacancy_id)
    {
      
        $this->postjob->set('status', 'Cancelled')->where('vacancy_id', $vacancy_id)->update();

        return redirect()->route('jobpost');
    }

    

    public function registeremployer(){
        $data=[
            'employer_id'=> $this->request->getVar('employer_id'),
            'empprofile'=> $this->request->getVar('empprofile'),
            'company_name'=> $this->request->getVar('company_name'),
            'company_address'=> $this->request->getVar('company_address'),
            'full_name'=> $this->request->getVar('full_name'),
            'position'=> $this->request->getVar('position'),
            'address'=> $this->request->getVar('address'),
            'contactnum'=> $this->request->getVar('contactnum'),
            'email'=> $this->request->getVar('email'),
            'password'=> $this->request->getVar('password'),
        ];
        $this->registeremp->insert($data);
        return $this->response->redirect(site_url('/empregister'));
    }

    public function emplogin()
    {
                
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
                
        $data = $this->registeremp->where('email', $email)->first();
                
        var_dump($email);
        var_dump($password);
        var_dump($data);
                
        if ($data) {
            $pass = $data['password'];
            if ($password === $pass) {
                if($data['status'] == 'Approved'){
                    // $session->setFlashdata('msssg', 'Your account has been blocked by admin.');
                    return redirect()->to('/employerhome');
                }
                else{
                    // $session->setFlashdata('msssg', 'Your account has been blocked by admin.');
                   
                    return redirect()->to('/employerlogin?msg=Your+account+has+been+blocked+by+admin.');
                }
                
            } else {
                
                return redirect()->to('/employerlogin');
            }
        } else {

            return redirect()->to('/employerlogin');
        }
    }

    public function emplogindex()
    {
        echo view('Employer/employerlogin');
    } 

    
}
