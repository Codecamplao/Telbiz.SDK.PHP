# TelBiz-Pkg

## Installation

Begin by installing this package through Composer. Just run following command to terminal-

```shell script
composer require codecamplao/telbiz
```
You can also edit your project's `composer.json` file to require `codecamplao/telbiz`.

```json
"require": {
    "codecamplao/telbiz": "^1.0"
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

Next, Add more config on environment file. Open `.env`, and add a new three config like below.

```dotenv
TELBIZ_BASE_URI=""
TELBIZ_CLIENT_ID=""
TELBIZ_CLIENT_SECRET=""
```

## Example to use
```php
protected $telbiz_sms;
public function __construct()
{
    $this->telbiz_sms = new TelBizSMS();
}

public function index(): Response
{
    return $this->telbiz_sms->sendSmsService(TitleEnum::Default, '2099490807', 'Hello From Telbiz');
}
```

Example response:
```json
{
    "response": {
        "code": "SUCCESS_OPERATION",
        "message": "Success",
        "success": true,
        "detail": "Success"
    },
    "key": {
        "partitionKey": "16512253832870000",
        "rangeKey": "16538405678928228"
    }
}
```


