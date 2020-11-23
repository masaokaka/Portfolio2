## このアプリを作成した背景

自業務(新卒採用)を簡略化できる何かがあればと考えてこのアプリを作成しました。  
自社の採用業務の中に、社員と学生との面談調整を行う業務があります。業務内容としては学生と社員にそれぞれ予定を聞いた上で、調整を行い連絡を入れる等、単純ですが時間がかかります。  
このアプリを使えば、アプリのリンクを送るだけで、利用者自ら面談の希望を入力してもらうことができ、採用担当は送信されてきたリクエストからマッチする学生と社員を選ぶだけの作業で済みます。  


## サービス概要紹介

#### 【サービス名】  
　QuickFix

#### 【想定する利用者】  
　・企業の採用担当  
　・企業のリクルーター社員  
　・学生

#### 【使用言語など】
　HTML/CSS/JavaScript(jQuery,Bootstrap),PHP(Laravel),MySQL

#### 【制作期間】
　1ヶ月(Laravelの学習を含む)

#### 【利用の流れ】  
　###### ○学生  
　ユーザー登録を行い、ログインします。ログイン後は、面談可能な日時と面談したい社員の希望などをリクエストすることができます。  
　リクエストした内容は採用担当に送信され、希望した内容に沿って採用担当により面談が調整されます。

　###### ○社員  
　ユーザー登録を行い、ログインします。ログイン後、面談可能な日時と面談形式の希望などをリクエストします。  
　リクエストした内容は採用担当に送信され、希望した内容に沿って採用担当により面談が調整されます。  
　面談終了後、面談した学生の評価を入力して採用担当に送信します。

　###### ○採用担当  
　ユーザー登録を行い、ログインします。ログイン後、学生から送信されてきた面談のリクエストを元に、希望を加味してどの社員と面談してもらうかの調整を行います。  
　面談終了後、社員が学生の評価を送信してくるので確認して、学生を次のステップに進めるかを決めることができます。

　#### 【実装した機能について】
　##### ○ユーザー登録、マルチログイン機能(採用担当、社員、学生)  
![ログインなど](https://user-images.githubusercontent.com/66907534/99960157-a1257980-2dcf-11eb-8ebe-d2d56ca5ca8e.gif)

　##### ○学生が面談日程や形式、面談する相手の希望などを入力してリクエストできる機能  
![面談リクエスト（学生）](https://user-images.githubusercontent.com/66907534/99963104-a0dbad00-2dd4-11eb-8a43-2b2e8b0682fa.gif)

　##### ○社員が面談日程や形式を入力してリクエストできる機能  
![面談リクエスト（社員）](https://user-images.githubusercontent.com/66907534/99963586-573f9200-2dd5-11eb-84c7-1009e2561ca2.gif)

　##### ○採用担当が社員と学生のリクエストを元に面談を調整できる機能  
![調整画面（人事）](https://user-images.githubusercontent.com/66907534/99964054-0da37700-2dd6-11eb-8222-6d793d01f7e9.gif)  
　登録学生が一覧で表示されており、学生の希望とマッチする社員がいれば「○件マッチしました」とボタンが表示される。  
　ボタンをクリックすると学生情報の詳細と面談リクエスト内容、マッチした社員が表示されるので、面談させたい社員を選択する。  

　##### ○面談日が過ぎると社員側は学生の評価を入力する画面が、学生は「ありがとうございました」と表示される機能  
![面談終了後（社員）](https://user-images.githubusercontent.com/66907534/99966066-206b7b00-2dd9-11eb-99cf-c5cd3a41fb3a.gif)  

![面談終了後（学生）](https://user-images.githubusercontent.com/66907534/99966147-3da04980-2dd9-11eb-8d40-844764c99cd3.png)  

　##### ○採用担当は社員が入力した評価を閲覧することができる  
![評価閲覧（人事）](https://user-images.githubusercontent.com/66907534/99966645-f49cc500-2dd9-11eb-8145-2f6a524d7e95.gif)

　#### 【工夫したポイント】
　・マルチログイン機能の実装
　・面談終了後の画面の切り替え
　・社員側は何度も面談ができるが、学生は1回しかできないようにすること

　#### 【今後やること、追加したい機能など】  
　・レンタルサーバーへのアップロード  
　・レイアウトやデザインの修正  
　・面談日が近づいたら案内メールが届く機能  
　・幅広く日時の指定ができる機能  
　・面談終了後、評価の高い学生に次のステップに案内するメールを自動送信できる機能  
　・面談キャンセル機能  
　・学生/社員の削除機能　など
