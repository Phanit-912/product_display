<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\TelegramController;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class SendMessageController extends Controller
{
    //POST
    public function show($sendmessage) {

      $message = new TelegramController;

      $dealer_name = 'Oneclick';
      $product_name = request('product_name');
      $product_quantity = 1;
      $product_general_price = request()->input('product_general_price');
      $product_wholesale_price = request()->input('product_wholesale_price');
      $product_special_price = request()->input('product_special_price');

      try{
        
          $message->send( 
            'Dear Seller, '.
            'You have new order from '. $dealer_name .' :'
            . '
- ' 
  . $product_name . '
      Quantity: '
      . $product_quantity . ' 
      Price: '
      . $product_general_price . ' $
      Wholesale: '
      . $product_wholesale_price . ' $
      Special: '
      . $product_special_price . ' $
      '
          );

      } catch( \Exception $e){

          $message->send( 'There is an error while update data from API ' . $e->getMessage() );
          return false;
      }

      return redirect()->back();

    }
}
