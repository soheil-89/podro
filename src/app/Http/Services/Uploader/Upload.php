<?php


namespace App\Http\Services\Uploader;


class Upload implements UploadInterface
{

    protected $file;
    protected $directory;
    protected $fileName;
    protected $path;

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    public function setDirectory($path)
    {
        $this->path = $path;
        $this->directory = app()->basePath('storage/app/public/' . $path);
        return $this;
    }

    public function fileName()
    {
        $this->fileName = time() . "_" . $this->file->getClientOriginalName();
        return $this;
    }

    public function store()
    {
        $this->file->move($this->directory, $this->fileName);
        return "storage/" . $this->path . "/" . $this->fileName;
    }
}
