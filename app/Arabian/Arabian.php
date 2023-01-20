<?php

namespace App\Arabian;

use App\Arabian\Modules\Users;
use App\Arabian\Modules\Categories;
use App\Arabian\Modules\Articles;

class Arabian
{
  private static $users = null;
  private static $categories = null;
  private static $articles = null;


  public static function users()
  {
    if (! is_a( self::$users, Users::class ) ) {
      self::$users = new Users;
    }

    return self::$users;
  }

  public static function categories()
  {
      if ( ! is_a( self::$categories, Categories::class ) ) {
          self::$categories = new Categories();
      }
      
      return self::$categories;
  }

  public static function articles()
  {
    if (! is_a( self::$articles, Articles::class ) ) {
      self::$articles = new Articles;
    }
    
    return self::$articles;
  }


}
