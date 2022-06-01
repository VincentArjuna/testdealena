<?php

namespace App\Services\Store;

use App\Models\Store\Store;
use App\Services\UploadService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreService
{
    /**
     * Submit changes's for member_info
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Member\MemberAddress
     */
    public function submit(Request $request)
    {
        $user = $request->user();
        if (!empty($user->store)) {
            $store = Store::find($user->store->id);
        } else {
            $store = new Store();
        }

        $store->user_id = $request->user()->id;
        foreach ($request->except('image') as $key => $value) {
            $store->{$key} = $this->renderSubmitData(
                $request,
                $store,
                $key,
                $value
            );
        }
        if ($request->file('image')) {
            $uploadService = new UploadService();
            $store->image = $uploadService->uploadImage($request, 'stores');
        }
        $store->save();

        return $store;
    }

    /**
     * Render submit data
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store\Store $store
     * @param string|int $key
     * @param mixed $value
     */
    public function renderSubmitData(Request $request, Store $store, $key, $value)
    {
        if ($key == 'slug' && (empty($store->slug) || empty($value))) {
            $rendered_value = $this->generateSlug($request->name);
        } elseif ($key == 'couriers') {
            $couriers = collect(json_decode($value, true));
            if ($couriers->count() < 1) {
                $response['status'] = false;
                $response['message'] = 'No courier selected!';

                throw new HttpResponseException(response()->json($response, 422));
            }
            $rendered_value = $couriers;
        } else {
            $rendered_value = $value;
        }

        return $rendered_value;
    }

    /**
     * Generate slug
     *
     * @param string $name
     * @return string $slug
     */
    public function generateSlug($name)
    {
        $slug = Str::slug($name);
        $same = Store::where('slug', $slug)->get();
        if ($same->count() > 0) {
            $increment = $same->count() + 1;
            $slug .= '-' . $increment;
        }

        return $slug;
    }
}
