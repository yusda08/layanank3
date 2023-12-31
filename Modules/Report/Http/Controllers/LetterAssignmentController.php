<?php

namespace Modules\Report\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Form;
use App\Models\LetterAssignment;
use App\Models\ReviewOfficer;
use App\Models\UtiLetterSigner;
use Illuminate\Http\Request;
use Modules\Report\Http\Services\AssignmentService;
use Mpdf\Mpdf;

class LetterAssignmentController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $applications = Form::with(['letter_assignment', 'company'])
            ->reviewStatus()
            ->formStatus()
            ->verificationStatus()
            ->latest()->get();
        return view('report::letter_assignment.index', compact('applications'));
    }

    public function inputAssignment(Form $form)
    {
        $number = LetterAssignment::where('assignment_year', date('Y'))->max('assignment_number');
        $data['maxNumber'] = $number ? $number + 1 : 1;
        $data['company'] = Company::find($form->company_id);
        $data['officers'] = ReviewOfficer::where('form_code', $form->form_code)->get();
        $data['signers'] = UtiLetterSigner::all();
        $data['form'] = $form;
        return view('report::letter_assignment.input', $data);
    }

    public final function store(Request $request, AssignmentService $reportService)
    {
        try {
            $reportService->addLetterAssignment($request);
            $this->setFlash('Input data SPT', true);
            return to_route('letter-assignment');
        } catch (\Exception $exception) {
            $this->setFlash($exception->getMessage());
            return back();
        }
    }

    public final function posting(Request $request, AssignmentService $assignmentService)
    {
        try {
            $assignmentService->postingLetterAssignment($request);
            $this->setFlash('Posting data SPT', true);
        } catch (\Exception $exception) {
            $this->setFlash($exception->getMessage());
        }
        return back();
    }


}
