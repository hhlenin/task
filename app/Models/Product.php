<?php

namespace App\Models;

use App\Helper\ImageURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected static $product;
    protected static $directory = 'db/images/product/';

    public static function storeProduct($input, $id = null)
    {
        isset($id)? self::$product = Product::find($id) : self::$product = new Product();
        
        self::$product->name = $input['name'];
        self::$product->description = $input['description'];
        self::$product->price = $input['price'];
        self::$product->unit = $input['unit'];
        self::$product->quantity = $input['quantity'];
        isset($input['image'])?self::$product->image =  ImageURL::getImageURL($input['image'], self::$directory, self::$product->image) : '';
        self::$product->save();

        return self::$product;
    }
}
