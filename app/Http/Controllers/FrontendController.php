<?php

namespace App\Http\Controllers;

use App\Models\Respond;
use App\Models\Resume;
use App\Models\ResumeLang;
use App\Models\ResumePortfolio;
use App\Models\ResumePosition;
use App\Models\ResumeSkill;
use App\Models\Vacancy;
use App\Models\Viewer;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysqli_result;

class FrontendController extends Controller
{
    //
    public function welcome()
    {
        if(isset(Auth()->user()->id)){
            $vacancies = DB::select('select * from vacancies');
            $resumes = DB::select('select * from resumes where user_id = ?', [Auth()->user()->id]);
            return view('welcome', compact('vacancies', 'resumes'));
        }else{
            $vacancies = DB::select('select * from vacancies');
            return view('welcome', compact('vacancies'));
            // dd($vacancies);
        }
    }
    public function createCv()
    {
        $positions = DB::select('select * from positons');
        return view('resume_form', compact('positions'));
        // dd($positions);
    }
    public function storeCv(Request $req)
    {
        Resume::create([
            'user_id' => Auth()->user()->id,
            'name' => $req->name,
            'surname' => $req->surname,
            'phone' => $req->phone,
            'city' => $req->city,
            'd_birth' => $req->d_birth,
            'gender' => $req->gender,
            'country' => $req->country,
            'experience' => $req->experience,
            'salary' => $req->salary
        ]);
        $result = DB::select('SELECT id FROM resumes WHERE user_id = ? ORDER BY id DESC LIMIT 1', [Auth()->user()->id]);
        foreach($result[0] as $id){
            foreach($req->myskill as $skill){
                ResumeSkill::create([
                    'user_id' => Auth()->user()->id,
                    'resume_id' => $id,
                    'skill' => $skill
                ]);
            }
            foreach ($result[0] as $id) {
                foreach($req->myposition as $position){
                    ResumePosition::create([
                        'user_id' => Auth()->user()->id,
                        'resume_id' => $id,
                        'position' => $position
                    ]);
                }
            }
            foreach ($result[0] as $id) {
                foreach($req->mylang as $lang){
                    ResumeLang::create([
                        'user_id' => Auth()->user()->id,
                        'resume_id' => $id,
                        'lang' => $lang
                    ]);
                }
            }
            foreach ($result[0] as $id){
                foreach($req->file('myportfolio') as $portfolio){
                    $fileName = time().$portfolio->getClientOriginalName();
                    $path = $portfolio->storeAs('files', $fileName, 'public');
                    $portfolio = '/storage/'.$path;
                    ResumePortfolio::create([
                        'user_id' => Auth()->user()->id,
                        'resume_id' => $id,
                        'portfolio' => $portfolio
                    ]);
                }
            }
        }

        return redirect()->back()->with('created', 'Resume created successfully!');
    }
    public function displayCv(){
        $resumes = DB::select('SELECT id as resume_id, name, created_at as ca FROM resumes WHERE user_id = ?', [Auth()->user()->id]);
        return view('resumes', compact('resumes'));
    }
    public function resume(Request $req)
    {
        $resumes = DB::select('SELECT * FROM resumes WHERE id =? AND user_id = ?', [$req->resume_id, Auth()->user()->id]);
        $skills = DB::select('SELECT skill FROM resume_skills INNER JOIN resumes ON resumes.id = resume_skills.resume_id WHERE resumes.id = ? AND resumes.user_id = ?', [$req->resume_id, Auth()->user()->id]);
        $positions = DB::select('SELECT position FROM resume_positions INNER JOIN resumes ON resumes.id = resume_positions.resume_id WHERE resumes.id = ? AND resumes.user_id = ?', [$req->resume_id, Auth()->user()->id]);
        $portfolios = DB::select('SELECT portfolio FROM resume_portfolios INNER JOIN resumes ON resumes.id = resume_portfolios.resume_id WHERE resumes.id = ? AND resumes.user_id = ?', [$req->resume_id, Auth()->user()->id]);
        $langs = DB::select('SELECT lang FROM resume_langs INNER JOIN resumes ON resumes.id = resume_langs.resume_id WHERE resumes.id = ? AND resumes.user_id = ?', [$req->resume_id, Auth()->user()->id]);
        return view('single_resume_display', compact('resumes', 'skills', 'positions', 'portfolios', 'langs'));
    }
    public function respond(Request $req)
    {
        Viewer::create([
            'employer_id' => $req->employer_id,
            'vacancy_id' => $req->vacancy_id,
            'employee_id' => Auth()->user()->id
        ]);
        Respond::create([
            'employer_id' => $req->employer_id,
            'vacancy_id' => $req->vacancy_id,
            'employee_id' => Auth()->user()->id,
            'resume_id' => $req->resume_id
        ]);
        // dd($req->all());
        return redirect()->back()->with('status', 'Resume Submitted Successfully!');
    }
    public function displayVac($id)
    {
        $resumes = DB::select('select * from resumes where user_id = ?', [Auth()->user()->id]);
        $vacancy = DB::select('SELECT * FROM vacancies WHERE id = ?', [$id]);
        $skills = DB::select('SELECT skill FROM vacancy_skills INNER JOIN vacancies ON vacancies.id = vacancy_skills.vacancy_id WHERE vacancies.id = ?', [$id]);
        return view('single_vacancy_display', compact('vacancy', 'skills', 'resumes'));
    }
    public function myResponds()
    {
        $responds = DB::select('select vacancies.name, vacancies.position, vacancies.work_mode, vacancies.city, vacancies.salary, vacancies.experience, responds.created_at, resumes.name as resume_name from vacancies inner join responds on responds.vacancy_id = vacancies.id inner join resumes on responds.resume_id = resumes.id where responds.employee_id = ?', [Auth()->user()->id]);
        return view('my_responds', compact('responds'));
    }
    public function search(Request $req)
    {
        $position = $req->position;
        $vacancies = DB::select('select * from vacancies where position like "%'.$position.'%"');
        return view('welcome', compact('vacancies'));
    }
}
