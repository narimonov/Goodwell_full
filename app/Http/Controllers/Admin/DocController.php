<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Project;
use App\Download;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documents = Document::all();
        $documents2 = Document::all();

          foreach ($documents as  $document) {
            if ($document->project_id > 2 && $document->project_id < 5 ) {
              $documents = Document::orderBy('id', 'desc')->take(1)->where('project_id', '3')->get();
              $documents2 = Document::orderBy('id', 'desc')->take(1)->where('project_id', '4')->get();
            }
          }
        return view('admin.doc.index', compact('documents','documents2'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.doc.create', compact('projects'));
    }


    public function store(StoreDocumentRequest $req)
    {
        $req->validate([
        'description' => 'required',
        'document_file' => 'required|max:2048',
        'document_file_pdf' => 'required|max:2048',
        'document_file_json' => 'required|max:2048',
        'document_file_txt' => 'required|max:2048',
        ]);

        $fileModel = Document::create($req->all());

        if($req->file()) {
            $fileName = time().'_'.$req->document_file->getClientOriginalName();
            $fileName2 = time().'_'.$req->document_file_pdf->getClientOriginalName();
            $fileName3 = time().'_'.$req->document_file_json->getClientOriginalName();
            $fileName4 = time().'_'.$req->document_file_txt->getClientOriginalName();
            $filePath = $req->file('document_file')->storeAs('uploads', $fileName, 'public');
            $filePath2 = $req->file('document_file_pdf')->storeAs('uploads', $fileName2, 'public');
            $filePath3 = $req->file('document_file_json')->storeAs('uploads', $fileName3, 'public');
            $filePath4 = $req->file('document_file_txt')->storeAs('uploads', $fileName4, 'public');
            $fileModel->name = time().'_'.$req->document_file->getClientOriginalName();
            $fileModel->description =  $req->description;
            $fileModel->xlsx = '/storage/' . $filePath;
            $fileModel->pdf = '/storage/' . $filePath2;
            $fileModel->json = '/storage/' . $filePath3;
            $fileModel->txt = '/storage/' . $filePath4;
            $fileModel->save();

            Download::truncate();

            return back()
            ->with('success','File has been uploaded.')
            ->with('document_file', $fileName)
            ->with('document_file_pdf', $fileName2)
            ->with('document_file_json', $fileName3)
            ->with('document_file_txt', $fileName4);
        }


            return redirect()->route('admin.doc.index')
                            ->with('success','Product created successfully.');
        }

    public function edit(Document $document)
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $document->load('project');

        return view('admin.doc.edit', compact('projects', 'document'));
    }

    public function update(UpdateDocumentRequest $req, Document $document)
    {

      $document->update($req->all());

      if ($request->input('document_file', false)) {
          if (!$document->xlsx || $req->input('document_file') !== $document->xlsx->fileName) {
            $document->xlsx = '/storage/' . $req->input('document_file')->storeAs('uploads', time().'_'.$req->xlsx->getClientOriginalName() , 'public');;
          }
      } elseif ($document->xlsx) {
          $document->delete();
      }
      if ($request->button) {
        Auth::user()->doc_id = $request->button;
      }
        return redirect()->route('admin.doc.index');
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->load('project');

        return view('admin.doc.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        Document::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
