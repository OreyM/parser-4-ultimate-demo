<?php


namespace App\Parser\Core\Services;


use App\Core\Abstracts\Services\StorageService;
use App\Storage\ImageStorage;

class ImageStorageService extends StorageService
{

    public function save($imageUrl) :? string
    {
        try {
            $resource = file_get_contents($imageUrl);
        } catch (\Exception $e) {
            $imageUrl = 'http://' . $imageUrl;

            try {
                $resource = file_get_contents($imageUrl);
            } catch (\Exception $e) {
                return null;
            }
        }

        $imageType = explode('/', image_type_to_mime_type(exif_imagetype($imageUrl)));

        $storage = $this->path . $this->subPath . $this->fileName . '.' . end($imageType);

        \Storage::put($storage, $resource);

        return \Storage::url($storage);
    }


//    private CurlService $curl;
//    private string $path;
//    private string $name;
//    private string $url;
//
//    public function __construct(string $publicPath, string $imageUrl, string $imageName)
//    {
//        $this->curl = new CurlService();
//        $this->path = $publicPath;
//        $this->name = $imageName;
//        $this->url = $imageUrl;
//    }
//
//    public function save(...$extraNameOptions)
//    {
//        try {
//            $resource = file_get_contents($this->url);
//        } catch (\Exception $e) {
//            $this->url = 'http://' . $this->url;
//            $resource = file_get_contents($this->url);
//        }
//
//        $imageType = explode('/', image_type_to_mime_type(exif_imagetype($this->url)));
//
//        $storage = $this->path . '/' . $this->name . '/' . $this->name .
//            ( ! is_array($extraNameOptions) ?: '-' . implode('-', $extraNameOptions) .
//                '.' . end($imageType));
//
//        \Storage::put($storage, $resource);
////        dd(Storage::url($storage));
//
//        return \Storage::url($storage);
//    }

}
