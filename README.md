# TelBiz-Pkg

## Installation

Begin by installing this package through Composer. Just run following command to terminal-

```shell script
composer require codecamplao/telbiz
```
For Laravel use this-

```json
"require": {
    "codecamplao/telbiz": "1.0"
}
```
Next, update Composer from the Terminal:

```shell script
composer update
```

Once this operation completes, the final step is to add the service provider. Open `config/app.php`, and add a new item to the providers array.

```php
'providers' => [
    // ...
    CodeCampLAO\TelBiz\TelBizServiceProvider::class,
]
```


