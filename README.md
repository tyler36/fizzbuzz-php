# FizzBuzz

- [FizzBuzz](#fizzbuzz)
  - [Rules](#rules)
  - [TDD](#tdd)
    - [composer test](#composer-test)
    - [PHPunit](#phpunit)
    - [3の倍数の時には数の代わりに「Fizz」とプリントする](#3の倍数の時には数の代わりにfizzとプリントする)
    - [5の倍数の時には数の代わりに「Buzz」とプリントする](#5の倍数の時には数の代わりにbuzzとプリントする)
    - [3と5両方の倍数の時には数の代わりに「FizzBuzz」とプリントする](#3と5両方の倍数の時には数の代わりにfizzbuzzとプリントする)
    - [Refactor: 文字列を連結する](#refactor-文字列を連結する)
    - [1から100までの数をプリントするプログラム](#1から100までの数をプリントするプログラム)
    - [Coverage](#coverage)
    - [GitHub Action](#github-action)

## Rules

> 【問題】
>
> - 1から100までの数をプリントするプログラム
> - 3の倍数の時には数の代わりに「Fizz」とプリントする
> - 5の倍数の時には数の代わりに「Buzz」とプリントする
> - 3と5両方の倍数の時には数の代わりに「FizzBuzz」とプリントする

## TDD

### composer test

1. Composer プロジェクトを初期化する

    ```shell
    composer init
    ```

1. テストコマンドを追加

    ```shell
    $ composer test
    Command "test" is not defined.
    ```

1. `composer.json` を更新する

    ```json
      "scripts": {
        "test": "echo hello"
      },
    ```

    ```shell
    $ composer test
    > echo hello
    hello
    ```

### PHPunit

1. Update `composer.json`

    ```json
      "scripts": {
        "test": "phpunit"
      },
    ```

    ```shell
    $ composer test
    sh: 1: phpunit: not found
    ```

1. [PHPunit](https://phpunit.de/index.html)を追加

    ```shell
    composer require phpunit/phpunit --dev
    ```

    ```shell
    $ composer test
    > phpunit
    PHPUnit 10.5.27 by Sebastian Bergmann and contributors.
    Script phpunit handling the test event returned with error code 1
    ```

1. PHPunit設定ファイルを作成する

    ```shell
    $ phpunit --generate-configuration
    Make sure to exclude the .phpunit.cache directory from version control.
    ```

    ```shell
    $ composer test
    > phpunit
    PHPUnit 11.2.2 by Sebastian Bergmann and contributors.

    Test directory "/home/user13/code/playground/fizzbuzz-php/tests" not found
    ```

1. 不足しているディレクトリを作成する

    ```shell
    $ mkdir tests
    $ composer test
    No tests executed!
    ```

1. 簡単なテストを作成する

    ```php
    <?php

    namespace Tests;

    use PHPUnit\Framework\TestCase;

    /**
    * Class FizzBuzzTest.
    */
    class FizzBuzzTest extends TestCase
    {
      public function test_it_works()
      {
        $this->assertTrue(true);
      }
    }
    ```

1. テストを実行する

    ```  shell
    $ composer test
    FAILURES!
    Tests: 1, Assertions: 1, Failures: 1.
    ```

1. カバレッジ」要件を削除する

    ```xml
    <!-- phpunit.xml -->
    requireCoverageMetadata="true"
    colors="true"
    ```

1. テストを実行する

    ```  shell
    $ composer test
    OK (1 test, 1 assertion)
    ```

### 3の倍数の時には数の代わりに「Fizz」とプリントする

1. テストを書く

    ```php
    public function test_1を返します()
    {
      $this->assertEquals(1, FizzBuzz::say(1));
    }
    ```

1. テストを実行する

    ```  shell
    $ composer test
    Error: Class "Tests\FizzBuzz" not found
    ```

1. 「src/FizzBuzz.php」ファイルを作成する

    ```php
    <?php
    // src/FizzBuzz.php
    namespace Tyler36\FizzBuzz;

    class FizzBuzz {}
    ```

1. テストを実行する

    ```  shell
    $ composer test
    Error: Class "Tests\FizzBuzz" not found
    ```

1. テストでファイルをインポートする

    ```php
    use Tyler36\FizzbuzzPhp\FizzBuzz;
    ```

1. テストを実行する

    ```shell
    $ composer test
    Error: Call to undefined method Tyler36\FizzbuzzPhp\FizzBuzz::say()
    ```

1. メソッドを追加

    ```php
    public static function say() {}
    ```

1. テストを実行する

    ```shell
    $ composer test
    Failed asserting that null matches expected 1.
    ```

1. 「スライム」テスト

    ```php
    public static function say() {
      return 1;
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (1 test, 1 assertion)
    ```

1. テストを書く

    ```php
    public function test_2を返します()
    {
      $this->assertEquals(2, FizzBuzz::say(2));
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    Failed asserting that 1 matches expected 2.
    ```

1. テストに合格する

    ```php
    public static function say($num) {
      return $num;
    }
    ```

1. テストを書く

    ```php
    public function test_3の倍数の時には数の代わりに「Fizz」とプリントする()
    {
      $this->assertEquals('Fizz', FizzBuzz::say(3));
    }
    ```

1. テストに合格する

    ```php
    public static function say($num) {
      if ($num == 3) {
        return 'Fizz';
      }

      return $num;
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (3 tests, 3 assertions)
    ```

1. リファクタリングテスト

    ```php
    foreach ([3, 6, 9, 12] as $num) {
      $this->assertEquals('Fizz', FizzBuzz::say($num));
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    Failed asserting that 6 matches expected 'Fizz'.
    ```

1. テストに合格する

    ```php
    public static function say($num) {
      if ($num % 3 === 0) {
        return 'Fizz';
      }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (3 tests, 6 assertions)
    ```

### 5の倍数の時には数の代わりに「Buzz」とプリントする

1. テストを書く

    ```php
      public function test_5の倍数の時には数の代わりに「Buzz」とプリントする()
      {
        foreach ([5, 10, 20, 50] as $num) {
          $this->assertEquals('Buzz', FizzBuzz::say($num));
        }
      }
    ```

1. テストを実行する

    ```shell
    $ composer test
    Failed asserting that 5 matches expected 'Buzz'.
    ```

1. テストに合格する

    ```php
    if ($num % 3 === 0) {
      return 'Fizz';
    }

    if ($num % 5 === 0) {
      return 'Buzz';
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (4 tests, 10 assertions)
    ```

### 3と5両方の倍数の時には数の代わりに「FizzBuzz」とプリントする

1. テストを書く

    ```php
    public function test_3と5両方の倍数の時には数の代わりに「FizzBuzz」とプリントする()
    {
      foreach ([15, 30, 45] as $num) {
        $this->assertEquals('FizzBuzz', FizzBuzz::say($num));
      }
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    Failed asserting that two strings are equal.
    --- Expected
    +++ Actual
    @@ @@
    -'FizzBuzz'
    +'Fizz'
    ```

1. テストに合格する

    ```php
    public static function say($num) {
      if ($num % 15 === 0) {
        return 'FizzBuzz';
      }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (5 tests, 13 assertions)
    ```

### Refactor: 文字列を連結する

1. 文字列を連結する

    ```php
    public static function say($num) {
      $string = '';

      if ($num % 3 === 0) {
        $string .= 'Fizz';
      }

      if ($num % 5 === 0) {
        $string .= 'Buzz';
      }

      return $string
        ? $string
        : $num;
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (5 tests, 13 assertions)
    ```

### 1から100までの数をプリントするプログラム

1. テストを書く

    ```php
    public function test_it_prints_numbers_to_100()
    {
      $filePath = getcwd() . '/example.txt';
      $example = file_get_contents($filePath);

      $this->assertSame($example, FizzBuzz::list(100));
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    Error: Call to undefined method Tyler36\FizzbuzzPhp\FizzBuzz::list()
    ```

1. テストに合格します

    ```php
    public function list(){}
    ```

1. テストに合格します

    ```shell
    $ composer test
    1) Tests\FizzBuzzTest::test_it_prints_numbers_to_100
    Failed asserting that null is identical to '1\n
    2\n
    Fizz\n
    4\n
    Buzz\n
    ```

1. ss

    ```php
    public static function list($last)
    {
      $list = '';
      for ($i=0; $i < $last; $i++) {
        $list .= self::say($i+1) . PHP_EOL;
      }

      return $list;
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (6 tests, 14 assertions)
    ```

1. Refactor

    ```php
    $list = '';

    foreach (range(1, $last) as $key => $value) {
      $list .= self::say($value) . PHP_EOL;
    }
    ```

1. テストを実行する

    ```shell
    $ composer test
    OK (6 tests, 14 assertions)
    ```

### Coverage

1. Update `phpunit.xml`

    ```xml
    <coverage includeUncoveredFiles="true">
        <report>
            <html outputDirectory="logs/php-coverage" lowUpperBound="50" highLowerBound="90" />
        </report>
    </coverage>
    ```

1. Update `composer.json`

    ```json
    "scripts": {
        "test": "phpunit",
        "test:coverage": "XDEBUG_MODE=coverage phpunit --coverage-text"
    },
    ```

1. Ignore coverage files.

    ```git
    logs/php-coverage/
    ```

### GitHub Action

1. 「.github/workflows/testing/yml」ワークフローファイルを追加します。

    ```yml
    name: testing
    on:
      workflow_dispatch:
      push:
        branches: [main]
      pull_request:
        branches: [main]
    jobs:
      phpunit:
        runs-on: ubuntu-latest
        steps:
          - name: "☁️ checkout repository"
            uses: actions/checkout@v4
          - name:  "🔧 Setup PHP"
            uses: shivammathur/setup-php@v2
            with:
              php-version: 8.2
              coverage: xdebug
          - name: "📦 Cache Composer dependencies"
            uses: actions/cache@v4
            with:
              path: /tmp/composer-cache
              key: ${{ runner.os }}-${{ hashFiles('**/composer.lock') }}
          - name: "📦 Install Dependencies"
            run: composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
          - name: "✅ Execute tests via PHPUnit"
            run: XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text
          - name: "☁️ Upload artifacts"
            uses: actions/upload-artifact@v4
            with:
              name: Logs
              path: ./logs
    ```
