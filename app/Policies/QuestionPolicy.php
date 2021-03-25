<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks
     *
     * @param  \App\Models\User  $user
     * @param  string $ability
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        // TODO Block even admins from edit operations
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  $question
     * @return mixed
     */
    public function view(User $user, Question $question)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  $question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        return $question->author->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  $question
     * @return mixed
     */
    public function delete(User $user, Question $question)
    {
        return $question->author->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  $question
     * @return mixed
     */
    public function restore(User $user, Question $question)
    {
        return $question->author->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  $question
     * @return mixed
     */
    public function forceDelete(User $user, Question $question)
    {
        return $question->author->id === $user->id;
    }
}
