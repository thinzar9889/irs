<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intern;
use App\Models\Internship;
use App\Models\User;
use App\Models\UniversitySupervisor;
use App\Models\CompanySupervisor;
use App\Models\University;
use App\Models\WeeklyReport;
use App\Models\InternReport;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        public function dashboard()
        {
            $user = auth()->user(); // Retrieve authenticated user

            // Check user roles and permissions to determine dashboard content
            if ($user->hasRole('admin')) {
                return $this->adminDashboard();
            } elseif ($user->hasRole('intern')) {
                return $this->internDashboard();
            } elseif ($user->hasRole('company-supervisor')) {
                return $this->companySupervisorDashboard();
            } elseif ($user->hasRole('university-supervisor')) {
                return $this->universitySupervisorDashboard();
            }

            //abort(403, 'Unauthorized action.'); // Handle unauthorized access
        }

        protected function adminDashboard()
        {
            $totalCompany = Company::count(); // Total users in the system
            $totalCompanySupervisor = CompanySupervisor::count();
            $totalUniSupervisor = UniversitySupervisor::count();
            $totalInterns = Intern::count(); // Total interns in the system

            return view('backend.dashboard.admin', compact('totalCompany','totalCompanySupervisor','totalUniSupervisor', 'totalInterns'));
        }

        protected function internDashboard()
        {
            $intern = auth()->user();

            // Example: Fetch data for intern dashboard

            $assignedTasks = Intern::count();
           //$totalWeeklyReports = $intern->internship->weeklyReports()->count();
            //$totalWeeklyReports =WeeklyReport::count();
            $totalWeeklyReports = WeeklyReport::where('internship_id', $intern->id)->count();

            return view('backend.dashboard.intern', compact('assignedTasks','totalWeeklyReports'));
        }

        protected function companySupervisorDashboard()
        {
            // Example: Fetch data for company supervisor dashboard
            $companyInterns = Intern::count(); // Interns associated with the company

            return view('backend.dashboard.company_supervisor', compact('companyInterns'));
        }

        protected function universitySupervisorDashboard()
        {
                 // Get the logged-in supervisor
                //$loggedInSupervisor = auth()->user();

                // Ensure supervisor and university relationship is eager loaded
                //$loggedInSupervisor->load('university');
                //$totalInternCount = Intern::where('university_id')->count(); // Total count of interns
                $totalUniSupervisor = UniversitySupervisor::count(); // Default to 0 if permission is not granted
                $recentReports =WeeklyReport::count();
                //$loggedInUniversityId = auth()->user()->university_id;

                // Fetch total count of supervisors for the logged-in user's university
                //$totalSupervisorCount = UniversitySupervisor::where('university_id', $loggedInSupervisor->university_id)->count();
                //$totalInternCount = Intern::where('university_id')->count(); // Total count of interns
            return view('backend.dashboard.university_supervisor', compact('totalUniSupervisor','recentReports'));
        }
}
