<?php

use App\Models\Like;

    if (!function_exists('user_likes')) {
        function user_likes($user_id, $topic_id) {
            $like = Like::where('user_id', $user_id)
            ->where('topic_id', $topic_id)
            ->first();
            if ($like) {
                return true;
            } else {
                return false;
            }
        }
    }
?>