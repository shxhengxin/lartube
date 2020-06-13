<?php

namespace App\Models;

use App\Traits\UuidPrimaryKey;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use UuidPrimaryKey;
    use HasMediaTrait;
    public $guarded = [];//字段黑名单

    public function registerMediaCollections(Media $media=null)
    {
        $this->addMediaConversion('thumb')
            ->crop(Manipulations::CROP_CENTER, 100, 100)
            ->sharpen(10);

       /* $this->addMediaConversion('medium')
            ->crop(Manipulations::CROP_CENTER, 400, 400)
            ->sharpen(10);*/
    }

    /**
     * Created by PhpStorm.
     * @Desc:该频道属于那个用户
     * @User: shenhengxin
     * @Date: 2020/6/3
     * @Time: 16:40
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * Created by PhpStorm.
     * @Desc:检测 用户是否登录并频道是不是登录用户的频道
     * @User: shenhengxin
     * @Date: 2020/6/3
     * @Time: 16:39
     * @return bool
     */
    public function editable(){
        if(!auth()->check()){
            return false;
        }
        return $this->user_id === auth()->user()->id;
    }

    public function image()
    {
        if($this->hasMedia("image")){
            return $this->getMedia('image')->last()->getFullUrl("thumb");
        }
        return "";
    }
}
