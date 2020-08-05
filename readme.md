## タイトル：reforme
・URL:http://desolate-meadow-36178.herokuapp.com/</br>
</br>
・テストアカウント</br>
&emsp;アドレス:test@test.com</br>
&emsp;パスワード:11111111</br>
</br>
・GitURL:https://github.com/sakagu/reforme</br>
・開発環境:html,CSS,PHP,laravel,MySQL,GitHub,AWS(S3),heroku</br>
・内容</br>
</br>
&emsp;●概要:自身の住宅リフォームを投稿できるアプリです。</br>
&emsp;●実装機能:ユーザ登録,ログイン・ログアウト,投稿,お気に入り登録,マイページ</br>
</br>
・企画背景</br>
&emsp;住宅リフォームの情報量の少なさから、もっと情報開示が必要と感じていたため</br>

## users table
|Colm|Type|Option|
|----|----|------|
|name|string|null: false|
|email|string|null: false|
|password|text|null: false|

## posts table
|Colm|Type|Option|
|----|----|------|
|title|string|null: false|
|text|text|null: false|
|image|string|null: false|
|cost|string||
|store|string||
|user_id|integer|null: false|
|likes_count|integer||

## likes table
|Colm|Type|Option|
|----|----|------|
|user_id|integer|null: false|
|post_id|integer|null: false|