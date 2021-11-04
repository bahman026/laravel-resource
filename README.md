
# laravel resource

This package provides for you a transformation layer that sits between your Eloquent models and the JSON responses.
You can select the fields of the table you need to eturn as a json and provide your API



# How to Install

```composer
composer require bahman026/laravel-resource
```




# How to use

```composer
BResource::resource(model|collection $model, string|array ...$columns, string|null $dataName = null): array
```


# Examle

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

use bahman026\laravelResource\BResource;

class MainController extends Controller
{
    
    public function index()
    {
        $user = User::first();
        $data = BResource::resource($user,['userId','firstName','lastName','posts'=>['postId','title','tags'=>['tagId','tagName']]],'data');
        return response()->json($data);
    }

}
```




## License

[MIT](https://choosealicense.com/licenses/mit/)

