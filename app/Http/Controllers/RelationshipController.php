<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relationship;
use App\User;

class RelationshipController extends Controller
{
    public function follow(User $profile_user, User $user)
    {
        $relation = new Relationship;
        $relation->create([
            'follower_id' => $user->id, 
            'followed_id' => $profile_user->id
        ]);
        return back();
    }

    public function unfollow(User $profile_user, User $user)
    {
        Relationship::where('followed_id', $profile_user->id)->where('follower_id', $user->id)->delete();
        return back();
    }



}
