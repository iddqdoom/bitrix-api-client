# bitrix-http-client

Bitrix Framework API Client Development Kit.

## Usage

Let's see an example of client code.

```php

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$client = new \App\Client\Client();
$decision = $client->decision();
$decisions = $decision->getById(1);
```
