<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use App\Helpers\CustomHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        return view('admin.characaters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.characaters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacterRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Character());

        //if(array_key_exists('thumb_path', $form_data)){
        if($request->hasFile('thumb_path')){

            $form_data =  CustomHelper::saveImage('thumb_path',$request, $form_data, new Character());

        }


        $new_chatacter = new Character();
        $new_chatacter->fill($form_data);
        $new_chatacter->save();

        return redirect()->route('admin.characters.show', $new_chatacter);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return view('admin.characaters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        return view('admin.characaters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $form_data = $request->all();

        if($form_data['name'] !== $character->name){
            $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Character());
        }else{
            $form_data['slug'] = $character->slug;
        }

        if($request->hasFile('thumb_path')){

            if($character->thumb_path){
                Storage::disk('public')->delete($character->thumb_path);
            }
            $form_data =  CustomHelper::saveImage('thumb_path',$request, $form_data, new Character());

        }

        $character->update($form_data);

        return redirect()->route('admin.characters.show', $character);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return redirect()->route('admin.characters.index')->with('deleted', "Il carattere $character->name è stato eliminato correttamente");
    }



}
