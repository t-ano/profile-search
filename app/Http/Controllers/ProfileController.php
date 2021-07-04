<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $_SESSION['word'] = '';
        if ($request->word !== null) {
            $profiles = Profile::where('name', 'like', "%{$request->word}%")->get();
            $_SESSION['word'] = $request['word'];
        } else {
            $profiles = Profile::get();
        }

        return view('dashboard', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_path = Storage::putFile('/images', $request->file('image'), 'public');

        $profile = new Profile();
        $profile->name = $request->name;
        $profile->summary = $request->summary;
        $profile->image = $file_path;
        $profile->save();

        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('image') !== null) {
            Storage::disk('public')->delete($request->current_image);  // 古いファイルは削除
            $file_path = Storage::putFile('/images', $request->file('image'), 'public');
        } else {
            $file_path = $request->current_image;
        }

        Profile::where('id', $id)
            ->update([
                'name' => $request->name,
                'summary' => $request->summary,
                'image' => $file_path
            ]);

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        Storage::disk('public')->delete($profile->image);
        $profile->delete();

        return redirect()->route('profile.index');
    }
}
