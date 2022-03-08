// eslint..コードの検証を行う。コードの整形もできるがprettierの方が優れる。
// prettier....prettierrc.jsファイルに設定.

module.exports = {
  root: true, // true...この設定ファイルがある親階層にファイルを探しに行かなくする。
  env: {
    browser: true, // ブラウザなのか、Node.jsなのか。
    es2020: true, // es2020までの構文を利用してもエラーが発生しない。
  },
  parserOptions: { // パーサ...構文解析を行うためのプログラムの総称。
    sourceType: 'module', // esモジュールの構文を利用してもエラーが出ない。importやexportなど。
  },
  extends: [ // 外部で提供されるeslintとprettierのルールを指定。注意...eslint: recommendの間に空白を入れないようにする。
    'eslint:recommended', 
    // 'plugin:prettier/recommended', // plugin:prettierの記述は最後にする。
  ],
  rules: {
    'prefer-const': 'error', // 更新をしない変数の宣言にconst以外が宣言されていたらエラーが発生する。letを使い再代入がなかった場合など。
                            // extendsとrulesで内容が重なったらrulesが優先される。
  },
};
