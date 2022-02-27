# Frozen

Very light and agnostic set of interfaces and implementations designed to
fake or render unpredictable return values of some PHP native functions.

## Installation

```bash
composer require holistic-agency/frozen:dev-main
```

## Usage

### ClockInterface

The Clock `now()` method returns a new DateTimeImmutable object
with the current time acccording to the php `date.timezone` setting.

The FrozenClock `now()` method returns the DateTimeInterface object
passed to the constructor.

```php
// src/MyClass.php
use HolisticAgency\Frozen\ClockInterface;

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
use HolisticAgency\Frozen\Clock;

$myClass = new Myclass();
$myClass->myMethod(new Clock());

// tests/MyClassTest.php
use HolisticAgency\Frozen\FrozenClock;

class MyClassTest
{
    public function testMyMethod()
    {
        // Given
        $myTestClass = new MyClass();
        $frozen = new FrozenClock(new DateTimeImmutable('2022-02-05 16:32:29 CET'));

        // When
        $actual = $myTestClass->myMethod($frozen);

        // Then
        // assert what you need knowing
        // $now is equal to '2022-02-05 16:32:29 CET' inside myMethod()
    }
}
```

### Randomizer

The Randomizer `random()` method returns an integer from a `mt_rand()` call.

The FrozenRandomizer `random()` method returns the value passed to the constructor.

```php
$random = new Randomizer();
$unknon = $random->random(); // an integer between 0 and PHP_INT_MAX included

$random = new Randomizer(1, 6);
$dieType = 'D' . strval($random->max); // D6
$dieRoll = $random->random() ; // an integer between 1 and 6 included
if ($dieRoll == $this->min) {
    echo 'You loose.'; // if 1 is rolled
}

$guesser = new FrozenRandomizer(10);
$cheater = $guesser->random(); // Always 10
```

### System

The System methods return strings (or a float in the special case of freeSpace)
that may be empty depending on real conditions of the PHP platform.

| method                | native PHP call                                |
| --------------------- | ---------------------------------------------- |
| sapi()                | PHP_SAPI                                       |
| version()             | PHP_VERSION                                    |
| extensions()          | get_loaded_extensions()                        |
| memory()              | ini_get('memory_limit') or empty string (`''`) |
| hostname()            | gethostname() or empty string                  |
| ipV4()                | gethostbyname()                                |
| httpHost()            | $_SERVER['HTTP_HOST'] or empty string          |
| resolve($remote)      | gethostbyname($remote) or empty string         |
| freeSpace($directory) | disk_free_space($directory)                    |

The FrozenSystem act as a fake for tests purpose.

```php
// src/MyNetwork.php
use HolisticAgency\Frozen\SystemInterface;

class MyNetwork
{
    public checkIfRemoteIsAvailable(SystemInterface $system, string $remote): bool
    {
        return $system->resolve($remote) != '';
    }
}

// tests/MyNetworkTest.php
use HolisticAgency\Frozen\FrozenSystem;

class MyNetworkTest
{
    public function testCheckIfRemoteIsAvailable()
    {
        // Given
        $myTestClass = new MyNetwork();
        $frozen = new FrozenSystem(
            'fpm-fcgi',
            '7.4.28',
            ['zip', 'curl'],
            '16M',
            'production.local',
            '192.168.1.10',
            'app.my.org',
            ['proxy.inside.local' => '10.10.0.10'],
            1024 * 1024 * 100,
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
