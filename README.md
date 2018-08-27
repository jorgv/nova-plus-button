# A simple plus button that runs an ajax request to increment a number field

This package contains a Nova field to add increment button to the index view. This is my first Nova package if you have any suggestion or improvement please let me know, *I am certeain there can be better approaches*.

This field was made in order to add votes and other numeric values from the index view in a quick way

![screenshot of the Plus Button field](https://i.imgur.com/OdCeNkm.png)

## Requirements

This field requires an increment method within your controller and a route like this: /api/resour-name/increment/{id}.

## Installation

Install this package in your Laravel app via composer:

```bash
composer require jorgv/nova-plus-button
```

## Usage

You can use this field in your forms as default number input and in your index view as a button. You can pass the `increaseValue` as parameter, by default increases by 1.

```php

\\ use Jorgv\PlusButton\PlusButton;

public function fields()
{
    return [
            PlusButton::make('count')->increaseValue(5),
    ];
}
```

Suggested Method in controller
```php

class YourController extends Controller
{

    public function increment(Request $request, $id)
    {
        if (request()->expectsJson()) {
            $object = Class::find($id);
            $object->count = $request->count;
            $object->save();
            return $object;
            }
    }
}  
```

Suggested Route

```php
Route::post('class/increase/{id}', 'YourController@increment');
```

## Credits

- [Jorge Pereyra](https://github.com/jorgv)

## License

The MIT License (MIT).
