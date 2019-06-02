# 投票sass
- 1: 会员注册,可以登陆后台添加投票项目.超过一定条件 需要支付购买.
- 2: 基于swoole 将后台动态添加选手 投放前端 同时将评委打出的分数 同步前端
## 操作步骤
- 1: composer require tw/server(暂未发布正式版本 部分windows用户可能需要在composer.json的require对象加上"tw/server":"dev-master")
- 2: php artisan vendor:publish --provider="Tw\Server\TwServiceProvider"
- 3: php artisan storage:link  建立软连接
- 4: php artisan migrate 执行数据迁移
- 5: php artisan db:seed --class=TwUsersTableSeeder 进行数据填充
## 登陆
- 1 登陆地址：http://你的url/twserver/login
- 2 默认账号：18123670736    密码：123456


