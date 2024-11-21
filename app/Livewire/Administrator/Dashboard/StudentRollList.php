<?php

namespace App\Livewire\Administrator\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('administrator.layouts.master')]
class StudentRollList extends Component
{
    public $selectedState = null;
    public $selectedDistricts = [];
    public $selectedScholarhips = [];
    public $selectedGenders = [];
    public $selectedClasses = [];

    
    public function render()
    {
        // $achievedUsers = [];
        // $users = User::with(['referrals', 'investments'])->get();

        // // Get query parameters for filtering and sorting
        // $search = $request->input('search.value');
        // $orderColumn = $request->input('order.0.column');
        // $orderDir = $request->input('order.0.dir');

        // // Apply filtering based on search term
        // if (!empty($search)) {
        //     $users = $users->where(function ($query) use ($search) {
        //         $query->where('name', 'like', '%' . $search . '%')
        //               ->orWhere('email', 'like', '%' . $search . '%')
        //               ->orWhere('phone', 'like', '%' . $search . '%');
        //     });
        // }

        // // Apply sorting based on order column and direction
        // if (!empty($orderColumn)) {
        //     $sortableColumns = ['name', 'email', 'phone', 'last_login', 'achieved_level', 'total_referral_count'];
        //     $orderColumn = $sortableColumns[$orderColumn];
        //     $users = $users->orderBy($orderColumn, $orderDir);
        // }

        // foreach ($users as $user) {
        //     // Use a cached version of referral users with investment data if available
        //     if (!isset($referralCache[$user->id])) {
        //         $referralCache[$user->id] = $user->referralUsersWithInvestment([$user->id]);
        //     }
        //     $achievedLevel = $user->getRewardAchievementLevel();
        //     if ($achievedLevel > 0) {
        //         $totalReferralCount = 0;
        //         $referralData = $referralCache[$user->id];
        //         // Calculate total referral count for the current user
        //         foreach ($referralData as $level => $referrals) {
        //             $totalReferralCount += count($referrals);
        //         }
        //         // Add only the users who achieved levels
        //         $achievedUsers[] = (object) [
        //             'user_id' => $user->id,
        //             'getUser' => $user->getUser(),
        //             'email' => $user->email,
        //             'phone' => $user->phone,
        //             'last_login' => $user->last_login,
        //             'achieved_level' => $achievedLevel,
        //             'total_referral_count' => $totalReferralCount,
        //         ];
        //     }
        // }

        // $achievedUsers = (object)$achievedUsers;

        // return DataTables::of($achievedUsers)
        //     ->addColumn('user', function ($item): mixed {
        //         return $item->getUser;
        //     })
        //     ->addColumn('email', function ($item) {
        //         return '<span class="d-block h5 mb-0">' . $item->email . '</span>
        //                     <span class="d-block fs-5">' . $item->phone . '</span>';
        //     })
        //     ->addColumn('achieved_level', function ($item) {
        //         return 'Level: '.$item->achieved_level;
        //     })
        //     ->addColumn('total_referral_count', function ($item) {
        //         return $item->total_referral_count.' Referrals';
        //     })
        //     ->addColumn('last_login', function ($item) {
        //         return diffForHumans($item->last_login);
        //     })
        //     ->rawColumns(['user', 'email', 'achieved_level', 'total_referral_count', 'last_login'])
        //     ->make(true);

        return view('livewire.administrator.dashboard.student-roll-list');
    }
}
