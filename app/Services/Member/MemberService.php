<?php

namespace App\Services\Member;

use App\Models\Member\Member;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class MemberService
{
    /**
     * Submit changes's for member_info
     *
     * @param \App\Models\Member\MemberInfo $info
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Member\MemberAddress
     */
    public function submit(Member $info, Request $request)
    {
        $info->user_id = $request->user()->id;
        foreach ($request->except('image') as $key => $value) {
            if ($key == 'birth_date') {
                $info->{$key} = Date::parse($value)->format('Y-m-d');
            } else {
                $info->{$key} = $value;
            }
        }
        if ($request->file('image')) {
            $uploadService = new UploadService();
            $info->image = $uploadService->uploadImage($request, 'members');
        }
        $info->save();

        return $info;
    }
}
