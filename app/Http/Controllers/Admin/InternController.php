<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InternRequest;
use App\Models\Intern;
use App\Repositories\InternRepository;
use Illuminate\Validation\Rules\In;
use Log;
use Exception;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function listing(Request $request)
    {
        try {
            $page = $request->input('page');
            $perPage = $request->input('per_page');
            $orderColumn = $request->input('order_column');
            $orderDirection = $request->input('order_type');
            $search = $request->input('search');

            $interns = InternRepository::listing($page, $perPage, $orderColumn, $orderDirection, $search);

            return response()->json([
                'draw' => null,
                'recordsTotal' => $interns->total(),
                'recordsFiltered' => $interns->total(),
                'data' => $interns->items()
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function getById($internId)
    {
        try {
            $internData = Intern::query()->findOrFail($internId);
            return response()->json($internData);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function store(InternRequest $request)
    {
        $validator = $request->validated();

        try {
            $firstName = $request->get('first_name');
            $lastName = $request->get('last_name');
            $email = $request->get('email');
            $university = $request->get('university');
            $level = $request->get('level');

            $intern = InternRepository::store($firstName, $lastName, $email, $university, $level);

            return response()->json($intern);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function update(InternRequest $request, $internId)
    {

        $validator = $request->validated();
        try {
            $intern = Intern::query()->findOrFail($internId);
            $firstName = $request->get('first_name');
            $lastName = $request->get('last_name');
            $email = $request->get('email');
            $university = $request->get('university');
            $level = $request->get('level');

            $intern = InternRepository::update($intern, $firstName, $lastName, $email, $university, $level);

            return response()->json($intern);

        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function destroy($internId)
    {
        try {
            $intern = Intern::query()->findOrFail($internId);
            $deleted = InternRepository::destroy($intern);

            return response()->json($deleted);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}

