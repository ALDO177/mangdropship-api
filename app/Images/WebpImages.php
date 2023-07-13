<?php

namespace App\Images{

    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;
    use Intervention\Image\Facades\Image as Image;

    class WebpImages{

        public string $filename;
        protected $clasifiedImg;
        protected string $disk;
        protected int $width;
        protected int $heigth;

        public function __construct(UploadedFile $file, int $width, int $heigth)
        {
            $this->clasifiedImg = $file;
            $this->filename = $this->clasifiedImg->getClientOriginalExtension();
            $this->width = $width;
            $this->heigth = $heigth;
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