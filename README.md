#URL Parser Tool

###Example Usage

```php
$url = "http://www.xxx.com/search/?k=word";
$urlType = new Url($url);

//Get query params as array
$query = $urlType->getQuery()->toArray();

//Get uri path
$path = $urlType->getPath();

//Update query param
$urlType->getQuery()->set("k" => "wordxx");
```
