<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillResource;
use App\Http\Resources\V1\Skillcollection;

class SkillController extends Controller
{
    //creating endpoint of my api

    public function index()
    {
        return new Skillcollection(Skill::all());
    }
    // show a skill
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }
    
    // store skill
    public function store(StoreSkillRequest $request) 
    {
        Skill::create($request->validated());
        return response()->json("skill created");
    }
    // update skill
    public function update(StoreSkillRequest $request, Skill $skill)
    {
        
        $skill->update($request->validated());
        return response()->json("skill updated");
    }
    //delete skill
    public function destroy(Skill $skill){
         $skill->delete();
         return response()->json("skill deleted");
    }
}
