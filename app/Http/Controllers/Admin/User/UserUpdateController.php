<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserUpdateController extends Controller 
{
    public function __invoke(UpdateRequest $request, User $user) {

        $data = $request->validated();

        DB::beginTransaction();

        try {
            $user->update($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error updating user: ' . $exception->getMessage());

            return redirect()->back()->with('error', 'Failed to update user.');
        }
        return redirect()->route('admin.user.edit', $user->id);
    }
}
