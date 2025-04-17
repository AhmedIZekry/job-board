<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, ?string $directory = null):string{

        $file->storeAs($directory, $file->getClientOriginalName(),'public');
        return "/$directory/{$file->getClientOriginalName()}";
    }

    function upload(UploadedFile $file,string $directory =null): string
    {
        $file->move(public_path($directory), $file->getClientOriginalName());
        return "/$directory/{$file->getClientOriginalName()}";
    }

    public function deleteFile(string $file):bool{
        if(File::exists(public_path($file))){
            File::delete(public_path($file));
            return true;
        }
        return false;
    }
}
