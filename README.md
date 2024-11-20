# HolisticAgency/Decouple

Decoupling interfaces.

This package is a very light and agnostic set of interfaces and implementations designed to
fake or render unpredictable return values of some PHP native functions dealing with external concerns.

## Installation

```bash
composer require holistic-agency/decouple:^1.0
```

## Usage

### ClockInterface

This package implememts `psr\clock`. See <https://www.php-fig.org/psr/psr-20/>

The Clock `now()` method returns a new DateTimeImmutable object
with the current time acccording to the php `date.timezone` setting.

The Frozen\Clock `now()` method returns the DateTimeImmutable object
passed to the constructor.

```php
// src/MyClass.php
use HolisticAgency\Decouple\ClockInterface;
use Psr\Clock\ClockInterface;

class MyClass
{
    public function myMethod(ClockInterface $clock)
    {
        // some code ...

        $now = $clock->now()->format('Y-m-d H:i:s T');

        // some code ...
    }
}

// src/Elsewhere.php
use HolisticAgency\Decouple\Clock;

$myClass = new Myclass();
$myClass->myMethod(new Clock());

// tests/MyClassTest.php
use HolisticAgency\Decouple\Frozen\Clock;

class MyClassTest
{
    public function testMyMethod()
    {
        // Given
        $myTestClass = new MyClass();
        $frozen = new Clock(new DateTimeImmutable('2022-02-05 16:32:29 CET'));

        // When
        $actual = $myTestClass->myMethod($frozen);

        // Then
        // assert what you need
        // knowing $now is equal to '2022-02-05 16:32:29 CET'
        // inside myMethod()
    }
}
```

### NumberGeneratorInterface

The MersenneTwister `draw()` method returns an integer from a `mt_rand()` call.

The Frozen\NumberGenerator `draw()` method returns one of ordered values passed to the constructor cyclically.

```php
$generator = new MersenneTwister();
$unknon = $generator->draw(); // an integer between 0 and PHP_INT_MAX included

$generator = new MersenneTwister(1, 6);
$diceType = 'D' . strval($generator->max); // D6
$diceRoll = $generator->draw() ; // an integer between 1 and 6 included
if ($diceRoll == $this->min) {
    echo $diceType . ' roll, you loose.'; // if 1 is rolled
}

$guesser = new Frozen\NumberGenerator(10, 17, 1);
$cheater = $guesser->draw(); // 10
$cheater = $guesser->draw(); // 17
$cheater = $guesser->draw(); //  1
$cheater = $guesser->draw(); // 10
```

### SystemInterface

| method                | native PHP call                                  |
| --------------------- | ------------------------------------------------ |
| freeSpace($directory) | disk_free_space($directory)                      |
| documentRoot()        | $_SERVER['DOCUMENT_ROOT'] or empty string (`''`) |
| pid()                 | getmypid()                                       |
| umask()               | umask()                                          |

### PlatformInterface

| method                | native PHP call                                |
| --------------------- | ---------------------------------------------- |
| sapi()                | PHP_SAPI                                       |
| version()             | PHP_VERSION                                    |
| extensions()          | get_loaded_extensions()                        |
| memory()              | ini_get('memory_limit') or empty string (`''`) |

### NetworkInterface

| method                | native PHP call                                |
| --------------------- | ---------------------------------------------- |
| hostname()            | gethostname() or empty string (`''`)           |
| ipV4()                | gethostbyname()                                |
| httpHost()            | $_SERVER['HTTP_HOST'] or empty string          |
| resolve($remote)      | gethostbyname($remote) or empty string         |

## Example

```php
// src/MyNetwork.php
use HolisticAgency\Decouple\NetworkInterface;

class MyNetwork
{
    public checkIfRemoteIsAvailable(NetworkInterface $network, string $remote): bool
    {
        return $network->resolve($remote) != '';
    }
}

// tests/MyNetworkTest.php
use HolisticAgency\Decouple\Frozen\Network as FrozenNetwork;

class MyNetworkTest
{
    public function testCheckIfRemoteIsAvailable()
    {
        // Given
        $myTestClass = new MyNetwork();
        $frozen = new FrozenNetwork(
            'production.local',
            '192.168.1.10',
            'app.my.org',
            ['proxy.inside.local' => '10.10.0.10'],
        );

        // When
        $actual1 = $myTestClass->checkIfRemoteIsAvailable($frozen, 'api.outside.net');
        $actual2 = $myTestClass->checkIfRemoteIsAvailable($frozen, 'proxy.inside.local');

        // Then
        // $actual1 is false
        // $actual2 is tue
    }
}
```
