# DbCipher

## description

If you want to give a unique token to each user and they only can access their data and you don't want to have access to users data this package is for you.
This is a package for encrypting your data in the database and generate a key for each user and decrypting own data and only accessible with the key.

## Install with composer

``` composer require whitestarcode/encryptiondb ```

## توضیحات
شما می توانید با این پکیج به هر کاربر یک توکن منحصر به فرد بدهید و فقط کاربر با آن توکن بتواند دیتا خودش را رمزگشایی کند

## How to use

First add ``` use Encryptable ``` to your eloquent model

For each column you want to encrypt creating a bird for example ``` address_bidx ``` it helps you when you want to ``` where ``` on your columns to find it.
It need because ``` BlindIndexService::make("My address") ``` generate a one way hash(same input same out put) then when you ``` where ``` on your columns it checks out-put with stored hash.

Add ``` use Encryptable ``` to your model.

## Example usage
```
$user = User::first();
$generated_key = KeyGenerator::generateKey($user->password);
         
$key = json_decode(Storage::get('temp.json') , true);
        
if (!isset($key["key"])) { 
    Storage::put('temp.json' , json_encode(
        ["key" => base64_encode($generated_key)]
    ));
}   
         
KeyManager::set($key["key"]);

$address_bidx = BlindIndexService::make("My address");

$order = new Order();
$order->address = "My address";
$order->address_bidx = $address_bidx;
$order->save(); 

$order = Order::first(); 


$address_search = BlindIndexService::make("My address");

$order = Order::where("address_bidx" , $address_search)->first();
```