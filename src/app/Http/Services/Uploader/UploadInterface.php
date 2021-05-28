<?php


namespace App\Http\Services\Uploader;


interface UploadInterface
{

    public function setFile($file);

    public function setDirectory($path);

    public function store();

}
