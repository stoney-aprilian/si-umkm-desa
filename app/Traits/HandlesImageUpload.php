<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HandlesImageUpload
{
    /**
     * Upload single image and replace old image.
     */
    protected function uploadImage(
        Request $request,
        string $field,
        ?string $oldPath,
        string $directory
    ): ?string {

        if (! $request->hasFile($field)) {
            return $oldPath;
        }


        if (
            $oldPath &&
            Storage::disk('public')->exists($oldPath)
        ) {

            Storage::disk('public')->delete($oldPath);

        }


        return $request
            ->file($field)
            ->store($directory, 'public');
    }





    /**
     * Delete image.
     */
    protected function deleteImage(?string $path): void
    {

        if (
            $path &&
            Storage::disk('public')->exists($path)
        ) {

            Storage::disk('public')->delete($path);

        }

    }





    /**
     * Upload multiple images.
     */
    protected function uploadImages(
        Request $request,
        string $field,
        string $directory
    ): array {

        if (! $request->hasFile($field)) {

            return [];

        }


        $files = $request->file($field);


        if (! is_array($files)) {

            $files = [$files];

        }


        return collect($files)

            ->map(
                fn ($file) =>
                    $file->store($directory, 'public')
            )

            ->all();
    }
}
