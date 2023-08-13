<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'title',
    //     'slug',
    //     'author',
    //     'exercpt',
    //     'body'
    // ];

    protected $guarded = ['id','timestamps'];
    protected $with = ['category','user'];

    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title','like','%'.$filters['search'].'%')
        //                  ->orWhere('body','like','%'.$filters['search'].'%');
        // } old method

        // $query->when(($filters['search']) ?? false, function($query,$search){
        //     return $query->where(function($query) use ($search) {
        //             $query->where('title', 'like', '%' . $search . '%')
        //                   ->orWhere('body', 'like', '%' . $search . '%');
        //     });
        // }); using function

        $query->when(($filters['search']) ?? false, fn($query,$search) =>
            $query->where(fn($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                          ->orWhere('body', 'like', '%' . $search . '%')
                          ->orWhere('exercpt', 'like', '%' . $search . '%')
            )
        ); // using arrow function

        $query->when(($filters['category']) ?? false, fn($query,$category) =>
            $query->whereHas('category',fn($query) =>
                $query->where('slug',$category)
            )
        );

        $query->when(($filters['user']) ?? false, fn($query,$user) =>
            $query->whereHas('user',fn($query) =>
                $query->where('username',$user)
            )
        );
    }

    // This table relationship with category table
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // This table relationship with user table
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Override key from Id to slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}