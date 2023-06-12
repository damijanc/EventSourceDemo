# SSE POC

```
docker-compose up -d
docker-compose run php composer install
```

### Browser:

Open http://localhost:8080

### PHP/Guzzle:

```
[I] ➜ docker-compose run php php guzzle.php
Fetching offers
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_0"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_1"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_2"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_3"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_4"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_5"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_6"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_7"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_8"}}"
}
array(2) {
  ["eventType"]=>
  string(4) "data"
  ["data"]=>
  string(23) "{"message":{"id":"id_9"}}"
}
Done fetching messages
```
