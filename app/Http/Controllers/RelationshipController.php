<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relationship;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class RelationshipController extends Controller
{
    public function follow(User $profile_user, User $user)
    {
        $relation = new Relationship;
        $relation = $relation->create([
            'follower_id' => $user->id, 
            'followed_id' => $profile_user->id
        ]);

        //Storing activity data to activity model.
        $activity = new Activity;
        $activity->create([
            'user_id' => Auth::id(),
            'action_id' => $relation->id,
            'action_type' => 'followed'
        ]);
        return back();
    }

    public function unfollow(User $profile_user, User $user)
    {
        $relationship = Relationship::findRelationship($profile_user->id, $user->id);
        $activity = Activity::where('action_id', $relationship->id)->delete();
        $relationship->delete();
        return back();
    }



}
