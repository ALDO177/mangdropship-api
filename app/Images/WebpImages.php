<?php

namespace App\Images{

    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;
    use Symfony\Component\HttpFoundation\File\Exception\FileException;
    use Intervention\Image\Facades\Image as Image;

    class WebpImages{

        public string $filename;
        protected $clasifiedImg;
        protected string $disk;

        public function __construct(protected $file, protected int $width, protected int $heigth)
        {
            if($file instanceof UploadedFile){
                $this->clasifiedImg = $file;
                $this->filename = $this->clasifiedImg->getClientOriginalExtension();
            }else{
                throw new FileException('data not file support');
            }
        }

        public function image(){
            $images =  Image::make($this->clasifiedImg)->encode('webp', 90);
            return $images->resize($this->width, $this->heigth);
        }

        public function stream(){
            return $this->image()->stream();
        }

        public function putWithDisk(string $disk, string $path) : bool{
            $this->disk =  $disk;
            $this->filename = md5(time() . random_int(0, 255)) . '.webp';
            $put = Storage::disk($disk)->put($path . '/' .$this->filename, $this->stream());
            if($put) return true; return false;
        }

        public function url() : string{
            return Storage::disk($this->disk)->url($this->filename);
        }
    }
}