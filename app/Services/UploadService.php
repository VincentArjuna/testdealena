<?php

namespace App\Services;

use Illuminate\Http\Request;

class UploadService
{
    /**
     * Upload image to server
     *
     * @param \Illuminate\Http\Request $request
     * @param string $path
     * @param string $file_name
     * @param string $key request key to get
     * @return string $image
     */
    public function uploadImage(Request $request, $path, $key = 'image', $file_name = null)
    {
        $default_path = 'images/' . $path;
        $image = empty($file_name)
            ? time() . '-' . $key . '.' . $request->file($key)->extension()
            : $file_name;
        $request->file($key)->move($default_path, $image);

        return $image;
    }
}
