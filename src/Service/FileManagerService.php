<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManagerService implements FileManagerServiceInterface
{

    public function imagePostUpload(UploadedFile $file): string
    {
        // TODO: Implement imagePostUpload() method.
    }

    public function removePostImage(string $fileName)
    {
        // TODO: Implement removePostImage() method.
    }
}