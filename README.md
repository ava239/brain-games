# Brain Games
[![Maintainability](https://api.codeclimate.com/v1/badges/04f7a3c4d31ecae4f33a/maintainability)](https://codeclimate.com/github/ava239/php-project-lvl1/maintainability)
![CI](https://github.com/ava239/php-project-lvl1/workflows/CI/badge.svg)

CLI games to workout your brain with simple mathematics.
* brain-even  
Say whether number is even
* brain-calc  
Enter result of simple operation with natural numbers
* brain-gcd  
Enter the greatest common divisor of two numbers
* brain-progression  
Enter missing number in arithmetic progression
* brain-prime  
Say if number is prime

## Install with composer
```sh
# globally
$ composer global require ava/brain-games

# or locally
$ composer require ava/brain-games
```
Examples below are for global installation  

## Run "Even" game
```sh
$ brain-even
```

[![asciicast](https://asciinema.org/a/UrkZB1cgyvRLG3ncHxDSIj41y.svg)](https://asciinema.org/a/UrkZB1cgyvRLG3ncHxDSIj41y)

## Run "Calc" game
```sh
$ brain-calc
```

[![asciicast](https://asciinema.org/a/341981.svg)](https://asciinema.org/a/341981)

## Run "GCD" game
```sh
$ brain-gcd
```

[![asciicast](https://asciinema.org/a/342193.svg)](https://asciinema.org/a/342193)

## Run "Progression" game
```sh
$ brain-progression
```

[![asciicast](https://asciinema.org/a/342742.svg)](https://asciinema.org/a/342742)

## Run "Prime" game
```sh
$ brain-prime
```

[![asciicast](https://asciinema.org/a/342781.svg)](https://asciinema.org/a/342781)

If you use local installation add path to package.  
Also note that games placed in /bin/ directory of package.  
Example if you are at package root directory: 
```sh
./bin/brain-even
```
