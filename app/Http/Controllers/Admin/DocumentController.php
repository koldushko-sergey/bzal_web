<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $documents = Document::orderBy('sort_order')->paginate(15);

        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.form', ['document' => new Document]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['file_path'] = $this->storeDocument($request->file('file'), 'documents');
        $data['is_published'] = $request->boolean('is_published');

        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Документ добавлен.');
    }

    public function edit(Document $document)
    {
        return view('admin.documents.form', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $data = $this->validated($request);
        $data['file_path'] = $this->storeDocument($request->file('file'), 'documents', $document->file_path);
        $data['is_published'] = $request->boolean('is_published');

        $document->update($data);

        return redirect()->route('admin.documents.index')->with('success', 'Документ обновлён.');
    }

    public function destroy(Document $document)
    {
        $this->deleteFile($document->file_path);
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Документ удалён.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'file' => $request->isMethod('post') ? 'required|file|max:10240' : 'nullable|file|max:10240',
        ]);
    }
}
