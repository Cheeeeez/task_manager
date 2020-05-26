<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $file = $request->inputFile;
        $title = $request->inputTitle;
        $content = $request->inputContent;
        $dueDate = $request->inputDueDate;
        if (!$request->hasFile('inputFile')) {
            $newFileName = $file;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $newFileName = time() . '-' . $fileName;
            $request->file('inputFile')->storeAs('public/images', $newFileName);
        }
        DB::insert('insert into tasks (taskTitle, content, dueDate, image) values (?, ?, ?, ?)', [$title, $content, $dueDate, $newFileName]);
        $message = "Tạo task $request->inputTitle thành công!";
        session()->flash('create-success', $message);
        return redirect()->route('tasks.index', compact('message'));
    }
}
