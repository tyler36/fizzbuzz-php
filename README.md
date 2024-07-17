# FizzBuzz

- [FizzBuzz](#fizzbuzz)
  - [Rules](#rules)
  - [TDD](#tdd)
    - [composer test](#composer-test)
    - [PHPunit](#phpunit)

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
