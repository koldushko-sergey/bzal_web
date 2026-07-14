<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $submissions = Submission::query()
            ->when($request->type, fn ($q) => $q->where('type', $request->type))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.submissions.index', compact('submissions'));
    }

    public function show(Submission $submission)
    {
        if (! $submission->is_read) {
            $submission->update(['is_read' => true]);
        }

        return view('admin.submissions.show', compact('submission'));
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();

        return redirect()->route('admin.submissions.index')->with('success', 'Обращение удалено.');
    }
}
