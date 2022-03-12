#WordPress用テンプレの使い方

- gulpファイル
 - themeNameをテーマによって変更
 - 要件によって開発・商用環境の設定を変更
  - CSSを圧縮するかどうか
  - ソースマップを生成するかどうか
  - JavaScriptを圧縮するかどうか

- コマンド
 - 開発時 npm run dev
  - CSS、JavaScriptの圧縮なし
  - ソースマップは生成される

 - 納品時 npm run build
  - CSS、JavaScriptが圧縮される
  - ソースマップの生成はない

- 注意
 - 納品時は、CSSのソースマップなど不要なものは削除する。
 - webp画像の処理は開発、納品時の処理から切り離す。
  - webp画像生成のコマンド...npm run webp。
