<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Posts extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'blog_posts';

    protected $fillable = [
        'category_id',
        'title',
        'content',
    ];

    protected $sortable = [
        'id',
        'category_id',
        'title',
        'status',
        'created_at',
        'publish_at',
    ];

    public function publish()
    {
        return date('d M Y | H:i', strtotime($this->publish_at));
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Blog\Categorys');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Admin\Blog\Comments', 'post_id');
    }
}
