<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;


    // 'Scope Filtering' for tags (which utilizes 'Query Scopes' (Local Scopes or Dynamic Scopes))
    // Local Scopes: https://laravel.com/docs/9.x/eloquent#local-scopes    // To define a Local Scope, prefix an Eloquent model method with 'scope' word    // Utilizing A Local Scope: https://laravel.com/docs/9.x/eloquent#utilizing-a-local-scope
    // Dynamic Scopes: https://laravel.com/docs/9.x/eloquent#dynamic-scopes    // Note: Dynamic Scopes are Local Scopes, but they accept passing in parameters (after the $query parameter)
    public function scopeFilter($query, array $filters) { // filtering the 'tags' and the Search <form>    // To define a Local Scope, prefix an Eloquent model method with 'scope' word    // this method is called by the filter() method inside index() method in ListingController.php
        // Filtering tags (the <a> HTML element in components/listing-tags.blade.php)
        if ($filters['tag'] ?? false) { // 'tag' is for the tags
            $query->where('tags', 'like', '%' . request('tag') . '%'); // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `tags` column in `listings` table
        }

        // Filtering the Search Form value (in partials/_search.blade.php)
        if ($filters['search'] ?? false) { // 'search' is for the Search <form>
            $query->where(  'title'      , 'like', '%' . request('search') . '%')  // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `title`       column in `listings` table
                  ->orWhere('description', 'like', '%' . request('search') . '%')  // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `description` column in `listings` table
                  ->orWhere('tags'       , 'like', '%' . request('search') . '%'); // e.g.    '%laravel%'    // the percent sign % SQL Wildcard    // search in the `tags`        column in `listings` table
        }
    }



    // Relationship of a Listing `listings` with User `users`
    public function user() { // A Listing `listings` belongs to a User `users`, and the Foreign Key of the Relationship is the `user_id` column
        return $this->belongsTo(User::class, 'user_id');
    }

}
