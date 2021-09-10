<?php

namespace App\Core\Abstracts\Services;


use App\Core\Services\CurlService;
use Illuminate\Support\Str;

abstract class StorageService
{

    private CurlService $curl;
    protected string $path;
    protected string $subPath;
    protected string $fileName;

    protected function __construct()
    {
        $this->curl = new CurlService();
    }

    /**
     * @param $resource | an external resource that you want to save
     * @return string storage link
     */
    abstract public function save($resource) :? string;

    public static function config(string $path = 'public') : StorageService
    {
        $storage = new static();

        $storage->path = $path . '/';

        return $storage;
    }

    public function addSubPath(string $path) : StorageService
    {
        $this->subPath = '';
        $this->subPath .= Str::slug($path) . '/';

        return $this;
    }

    public function saveWithName(string $name, ...$nameParams) : StorageService
    {
        $this->fileName = Str::slug($name);

        if (is_array($nameParams)) {
            $this->fileName .= '-' . implode('-', $nameParams);
        }

        return $this;
    }

}
