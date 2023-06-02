<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        $allStatus = Status::latest()->paginate(10);
        return view('status.list', ['statuses' => $allStatus, 'total_status' => count(Status::all())]);
    }

    public function create()
    {
        return view('status.create');
    }

    public function update($id)
    {
        $statuses = Status::all();
        $status = Status::where('id', $id)->first();
        if ($status === null) {
            return redirect()->to('/status/list')->withErrors(array('idNotFound' => 'No data found'));
        } else return view('status.update', ['status' => $status, 'statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $formattedTitle = preg_replace('/\s+/', ' ', $request->title);

        $slug = str_replace(' ', '_', $formattedTitle);

        $status = new Status();

        $status['title'] = $formattedTitle;
        $status['description'] = preg_replace('/\s+/', ' ', $request->description);
        $status['slug'] = strtoupper($slug);
        $status->save();

        return redirect()->to('/status/list')->withSuccess('Status added successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $formattedTitle = preg_replace('/\s+/', ' ', $request->title);

        $slug = str_replace(' ', '_', $formattedTitle);

        $status = Status::where('id', $id)->first();

        $status['title'] = $formattedTitle;
        $status['description'] = preg_replace('/\s+/', ' ', $request->description);
        $status['slug'] = strtoupper($slug);
        $status->save();

        return redirect()->to('/status/list')->withSuccess('Status updated successfully');
    }

    public function destroy($id)
    {
        $status = Status::where('id', $id)->first();
        $status->delete();

        return redirect()->to('/status/list')->withSuccess('Status deleted successfully');;
    }

    public function show($id)
    {
        $status = Status::where('id', $id)->first();
        return view('status.view', ['status' => $status]);
    }
}
