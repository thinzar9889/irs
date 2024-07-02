<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Company;
// use App\Models\Intern;
// use App\Models\CompanySupervisor;

class Evaluation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'intern_id',
        'company_id',
        'period',
        'leaves_day',
        'contact_supervisor',
        'punctual',
        'reliably_performed_assignments',
        'ability_solve_problem',
        'organization_skills',
        'communication_skills',
        'ability_work_independently',
        'willingness_learn_new_tasks',
        'eagerness_to_learn',
        'basic_skill',
        'professional_appearance',
        'overall_assessment_work_quality',
        'professional_viewpoint',
        'comments_student',
        'comments_intership',
        'comments',
        'discuss_intern',
        'signature',
        'company_supervisor_id',
        'title',
        'address',
        'contact'
    ];

        public function intern()
        {
            return $this->belongsTo(Intern::class);
        }

        public function company()
        {
            return $this->belongsTo(Company::class);
        }
        public function company_supervisor()
        {
            return $this->belongsTo(CompanySupervisor::class);

        }
}
