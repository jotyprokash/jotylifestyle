<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

class ImageService
{
    /**
     * Handle image upload, resizing, and storage.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string|null $oldFile
     * @return string
     */
    public function upload(UploadedFile $file, string $path, int $width, int $height, ?string $oldFile = null): string
    {
        // Delete old file if exists
        if ($oldFile && file_exists(public_path($path . '/' . $oldFile))) {
            @unlink(public_path($path . '/' . $oldFile));
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        Image::make($file)
            ->resize($width, $height)
            ->save(public_path($path . '/' . $filename));

        return $filename;
    }
}
