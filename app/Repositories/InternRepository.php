<?php

namespace App\Repositories;

use App\Models\Intern;

class InternRepository
{
    public static function listing($page = 1, $perPage = 10, $orderColumn = 'first_name', $orderDirection = 'asc', $search = null)
    {
        $interns = Intern::query();

        if ($search) {
            $interns->where(function ($searchQuery) use ($search) {
                $searchQuery->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('university', 'like', "%$search%");
            });
        }

        $interns->orderBy($orderColumn, $orderDirection);

        return $interns->paginate($perPage, ['*'], 'page', $page);
    }

    public static function update($intern, $firstName, $lastName, $email, $university, $level)
    {
        $intern->first_name = $firstName;
        $intern->last_name = $lastName;
        $intern->email = $email;
        $intern->university = $university;
        $intern->level = $level;

        $intern->save();

        return $intern;
    }

    public static function store($firstName, $lastName, $email, $university, $level)
    {
        $intern = new Intern();
        $intern->first_name = $firstName;
        $intern->last_name = $lastName;
        $intern->email = $email;
        $intern->university = $university;
        $intern->level = $level;

        $intern->save();

        return $intern;
    }

    public static function destroy($intern)
    {
        return $intern->delete();
    }
}
