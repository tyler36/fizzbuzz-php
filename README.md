# FizzBuzz

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
