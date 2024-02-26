<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }

    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentName = uniqid() . '_' . $attachment->getClientOriginalName();
            $attachment->storeAs('storage', $attachment);
            $validatedData['attachment'] = $attachmentName;
        }
        Comment::create($validatedData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

}
