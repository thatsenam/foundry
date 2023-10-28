<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $appends = ['from', 'to', 'reply_count', 'files'];

    protected $guarded = [];
    protected $extension = [
        "ase",
        "art",
        "bmp",
        "blp",
        "cd5",
        "cit",
        "cpt",
        "cr2",
        "cut",
        "dds",
        "dib",
        "djvu",
        "egt",
        "exif",
        "gif",
        "gpl",
        "grf",
        "icns",
        "ico",
        "iff",
        "jng",
        "jpeg",
        "jpg",
        "jfif",
        "jp2",
        "jps",
        "lbm",
        "max",
        "miff",
        "mng",
        "msp",
        "nef",
        "nitf",
        "ota",
        "pbm",
        "pc1",
        "pc2",
        "pc3",
        "pcf",
        "pcx",
        "pdn",
        "pgm",
        "PI1",
        "PI2",
        "PI3",
        "pict",
        "pct",
        "pnm",
        "pns",
        "ppm",
        "psb",
        "psd",
        "pdd",
        "psp",
        "px",
        "pxm",
        "pxr",
        "qfx",
        "raw",
        "rle",
        "sct",
        "sgi",
        "rgb",
        "int",
        "bw",
        "tga",
        "tiff",
        "tif",
        "vtf",
        "xbm",
        "xcf",
        "xpm",
        "3dv",
        "amf",
        "ai",
        "awg",
        "cgm",
        "cdr",
        "cmx",
        "dxf",
        "e2d",
        "egt",
        "eps",
        "fs",
        "gbr",
        "odg",
        "svg",
        "stl",
        "vrml",
        "x3d",
        "sxd",
        "v2d",
        "vnd",
        "wmf",
        "emf",
        "art",
        "xar",
        "png",
        "webp",
        "jxr",
        "hdp",
        "wdp",
        "cur",
        "ecw",
        "iff",
        "lbm",
        "liff",
        "nrrd",
        "pam",
        "pcx",
        "pgf",
        "sgi",
        "rgb",
        "rgba",
        "bw",
        "int",
        "inta",
        "sid",
        "ras",
        "sun",
        "tga",
        "heic",
        "heif"
    ];


    //Add the below function
    public function getFromAttribute()
    {
        return User::find($this->from_id);
    }

    //Add the below function

    public function getToAttribute()
    {
        return User::find($this->to_id);
    }

    public function getRepliesAttribute()
    {

        $replies = Message::query()->where('message_id', $this->id)->get();

        return $replies;
    }

    public function getReplyCountAttribute()
    {

        return count($this->replies);
    }

    public function getFilesAttribute()
    {

        $files = [];

        if ($this->attachment != null) {
            $files = json_decode($this->attachment, true);
        }
        for ($i = 0; $i < count($files); $i++) {


            $files[$i] = asset('storage/' . $files[$i]);
        }
        return $files;
    }


}
