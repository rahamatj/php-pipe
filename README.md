# PHP PIPE

## Installation
- ```composer create-project laravel/laravel project```
- ```cd project```
- ```composer require raham/php-pipe```
- Works with PHP builtin functions, Laravel Str facade methods (Just leave out the 'Str::' part) and custom functions.

## Example
```echo pipe("Hello World", "snake | upper")```
