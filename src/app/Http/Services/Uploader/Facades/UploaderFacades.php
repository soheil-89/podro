<?php


namespace App\Http\Services\Uploader\Facades;


use Illuminate\Support\Facades\Facade;

class UploaderFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Uploader';
    }
}
