<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;



    // For solving the Mass Assignment problem with the create() method using TWO ways: firstly, using the $fillable and $guarded properties inside the model, OR secondly, using the     \Illuminate\Database\Eloquent\Model::unguard();     inside boot() method inside the 'AppServiceProvider', check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
    // First way: (for the second way, check 'AppServiceProvider.php')
    // protected $fillable = ['title', 'company', 'location', 'email', 'website', 'tags', 'description'];



    // 'Scope Filtering' for tags (which utilizes 'Query Scopes' (Local Scopes or Dynamic Scopes)), check 1:49:06 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
    // Local Scopes: https://laravel.com/docs/9.x/eloquent#local-scopes    // To define a Local Scope, prefix an Eloquent model method with 'scope' word    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope
    // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes    // Note: Dynamic Scopes are Local Scopes, but they accept passing in parameters (after the $query parameter)
    public function scopeFilter($query, array $filters) { // filtering the 'tags' and the Search <form>    // To define a Local Scope, prefix an Eloquent model method with 'scope' word    // this method is called by the filter() method inside index() method in ListingController.php
        // dd($filters);
        // dd($filters['tag']);
        if ($filters['tag'] ?? false) { // 'tag' is for the tags    // '??' Null coalescing operator    // this means if there's $filters['tag'], get into the if statement block and execute what's in there. If there isn't $filters['tag'], don't do anything!
            $query->where('tags', 'like', '%' . request('tag') . '%'); // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `tags` column in `listings` table
        }

        if ($filters['search'] ?? false) { // 'search' is for the Search <form>    // '??' Null coalescing operator    // this means if there's $filters['tag'], get into the if statement block and execute what's in there. If there isn't $filters['tag'], don't do anything!
            $query->where(  'title'      , 'like', '%' . request('search') . '%')  // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `title`       column in `listings` table
                  ->orWhere('description', 'like', '%' . request('search') . '%')  // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `description` column in `listings` table
                  ->orWhere('tags'       , 'like', '%' . request('search') . '%'); // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `tags`        column in `listings` table
        }
    }

    

}
