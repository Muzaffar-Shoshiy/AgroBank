<?php

namespace App\Http\Controllers;

use App\Models\Positon;
use App\Models\Vacancy;
use App\Models\VacancySkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $weekly = DB::select('SELECT responds.resume_id, COUNT(responds.id) AS number, resumes.name, resumes.created_at FROM responds INNER JOIN resumes ON resumes.id = responds.resume_id WHERE resumes.created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() GROUP BY responds.resume_id');
        $statistics_by_vacancies = DB::select('SELECT responds.vacancy_id, COUNT(responds.id) as number_of_otkliks, vacancies.name, vacancies.position, vacancies.city, vacancies.created_at, vacancies.experience, vacancies.salary FROM responds INNER JOIN vacancies ON vacancies.id = responds.vacancy_id GROUP BY responds.vacancy_id');
        $statistics_by_resumes = DB::select('SELECT responds.resume_id, COUNT(responds.id) as number_of_otkliks, resumes.name, resumes.surname, resumes.created_at FROM responds INNER JOIN resumes ON resumes.id = responds.resume_id GROUP BY responds.resume_id');
        return view('admin_side.index', compact('statistics_by_vacancies', 'statistics_by_resumes', 'weekly'));
    }
    public function forms()
    {
        $positions = DB::select('select * from positons');
        return view('admin_side.form', compact('positions'));
    }
    public function createVac(Request $req)
    {
        // dd($req->all());
        Vacancy::create([
            'user_id' => Auth()->user()->id,
            'name' => $req->name,
            'position' => $req->position,
            'work_mode' => $req->work_mode,
            'city' => $req->city,
            'experience' => $req->experience,
            'salary' => $req->salary
        ]);
        $result = DB::select('SELECT id FROM vacancies WHERE user_id = ? ORDER BY id DESC LIMIT 1', [Auth()->user()->id]);
        foreach($result[0] as $id){
            foreach($req->myskill as $skill){
                VacancySkill::create([
                    'user_id' => Auth()->user()->id,
                    'vacancy_id' => $id,
                    'skill' => $skill
                ]);
            }
        }
        return redirect()->back()->with('created', 'Vacancy created successfully!');
    }
    public function addPosition(Request $req)
    {
        Positon::create([
            'position' => $req->position
        ]);
        return redirect()->back()->with('position', 'Position Created Successfully');
    }
    public function tables()
    {
        $responds = DB::select('SELECT resumes.id as resume_id, resumes.phone, resumes.city, resumes.d_birth, resumes.gender, resumes.country, resumes.experience, resumes.salary, resumes.name as employee_name, resumes.surname as employee_surname, responds.created_at, vacancies.name as employer_name, vacancies.position FROM resumes INNER JOIN responds ON resumes.id = responds.resume_id INNER JOIN vacancies ON vacancies.id = responds.vacancy_id WHERE responds.employer_id = ?', [Auth()->user()->id]);
        return view('admin_side.table', compact('responds'));
    }
    public function viewEmployee($id)
    {
        $resume = DB::select('SELECT * FROM resumes WHERE id = ?', [$id]);
        $skills = DB::select('SELECT skill FROM resume_skills INNER JOIN resumes ON resumes.id = resume_skills.resume_id WHERE resumes.id = ?', [$id]);
        $positions = DB::select('SELECT position FROM resume_positions INNER JOIN resumes ON resumes.id = resume_positions.resume_id WHERE resumes.id = ?', [$id]);
        $portfolios = DB::select('SELECT portfolio FROM resume_portfolios INNER JOIN resumes ON resumes.id = resume_portfolios.resume_id WHERE resumes.id = ?', [$id]);
        $langs = DB::select('SELECT lang FROM resume_langs INNER JOIN resumes ON resumes.id = resume_langs.resume_id WHERE resumes.id = ?', [$id]);
        return view('admin_side.view-employee', compact('resume', 'skills', 'positions', 'portfolios', 'langs'));
    }
    public function vacancies()
    {
        $vacancies = DB::select('select * from vacancies where user_id = ?', [Auth()->user()->id]);
        // $skills = DB::select('SELECT skill FROM vacancy_skills INNER JOIN vacancies ON vacancies.id = vacancy_skills.vacancy_id WHERE vacancies.user_id = ?', [Auth()->user()->id]);
        return view('admin_side.vacancies', compact('vacancies'));
        // dd($skills);
    }
    public function vacancy($id)
    {
        $vacancy = DB::select('SELECT * FROM vacancies WHERE id = ?', [$id]);
        $skills = DB::select('SELECT skill FROM vacancy_skills INNER JOIN vacancies ON vacancies.id = vacancy_skills.vacancy_id WHERE vacancy_skills.vacancy_id = ?', [$id]);
        return view('admin_side.vacancy', compact('vacancy', 'skills'));
    }
}
