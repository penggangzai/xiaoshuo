<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 后台首页
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    Route::get('admindex','Admin\LoginController@index');
});

// 前台首页
Route::get('/', 'Home\Index\IndexController@index');
Route::group(['prefix' => 'home'], function () {
    // 前台列表页
    Route::get('/blist/{cid}/{pid?}', 'Home\Index\ListController@index');
    //详情
    Route::get('/deta/{id}', 'Home\Index\DetaController@index');
    //章节列表页面
    Route::get('/listchapter/{id}','Home\Index\ChapterController@chap');
    //阅读页面
    Route::get('/withindex/{id}/{tid?}', 'Home\Index\WithController@with');
});


Route::group(['prefix' => 'member','middleware' =>'rig'], function () {
    //个人中心首页
    Route::get('/index', 'Home\Member\IndexController@index');
    //修改
    Route::get('/edit', 'Home\Member\IndexController@edit');
    //执行修改
    Route::post('/save', 'Home\Member\IndexController@save');
    //查询单条
    Route::get('/find/{phone}', 'Home\Member\IndexController@find');
    //短信验证
    Route::get('/phone/{id}', 'Home\Member\IndexController@phone');
    //密码修改
    Route::post('/pwd', 'Home\Member\IndexController@pwd');
    //退出个人中心
    Route::get('/out','Home\Member\IndexController@out');
    //收藏个人书籍
    Route::get('/add/{id}','Home\Member\CollectionController@add');
    //加载个人收藏书籍
    Route::get('/collection','Home\Member\CollectionController@index');
    //删除个人收藏的书籍
    Route::get('/collectiondel/{id}','Home\Member\CollectionController@del');
    //跟换图片
    Route::post('/img','Home\Member\CollectionController@img');

});

//轮播图
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    //添加页面
    Route::get('/adin', 'Admin\Banner\BannerController@addindex');
    //添加轮播图编号
    Route::post('/banadd', 'Admin\Banner\BannerController@add');
    //轮播图列表
    Route::get('/banlist', 'Admin\Banner\BannerController@lis');
    // 轮播图详情页面
    Route::get('/bansect/{id}', 'Admin\Banner\BannerController@bimg');
    //以书名添加轮播图
    Route::post('/biadd', 'Admin\Banner\BannerController@biadd');
    //修改状态
    Route::get('/face/{id}', 'Admin\Banner\BannerController@face');
    //单张轮播图删除
    Route::get('/bannerdel/{id}', 'Admin\Banner\BannerController@del');
    //轮播图组删除
    Route::get('/bannerdels/{id}', 'Admin\Banner\BannerController@dels');

});

//人气精品推荐
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    //添加页面
    Route::get('/grin', 'Admin\Groom\GroomController@addindex');
    //添加推荐编号
    Route::post('/groadd', 'Admin\Groom\GroomController@add');
    //推荐列表
    Route::get('/groomlist', 'Admin\Groom\GroomController@lis');
    // 推荐详情页面
    Route::get('/groomsect/{id}', 'Admin\Groom\GroomController@bimg');
    //以书名添加推荐
    Route::post('/groomadd', 'Admin\Groom\GroomController@biadd');
    //修改状态
    Route::get('/groomface/{id}', 'Admin\Groom\GroomController@face');
    //单张推荐删除
    Route::get('/groomdel/{id}', 'Admin\Groom\GroomController@del');
    //推荐组删除
    Route::get('/groomdels/{id}', 'Admin\Groom\GroomController@dels');

});

// 背景音乐管理
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    //列表
    Route::get('/mp', 'Admin\Audio\AudioController@mp');
    // 添加
    Route::post('/mpadd', 'Admin\Audio\AudioController@mpadd');
    //删除
    Route::get('/mpdel/{id}', 'Admin\Audio\AudioController@mpdel');
    //display
    Route::get('/mpdisplay/{id}/{d}', 'Admin\Audio\AudioController@mpdisplay');
    // face
    Route::get('/mpface/{id}/{f}', 'Admin\Audio\AudioController@mpface');
});

// 公告管理
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    //列表
    Route::get('/not', 'Admin\Notice\NoticeController@not');
    // 添加
    Route::post('/notadd', 'Admin\Notice\NoticeController@notadd');
    //删除
    Route::get('/notdel/{id}', 'Admin\Notice\NoticeController@notdel');
    // face
    Route::get('/notface/{id}/{f}', 'Admin\Notice\NoticeController@notface');
});

// 站点反馈
Route::group(['prefix' => 'admin',], function () {
    // 列表
    Route::get('/findex','Admin\Feedback\FeedbackController@index');
    // 添加
    Route::post('/fadd','Admin\Feedback\FeedbackController@fadd');
    // 删除
    Route::get('/fdel/{id}','Admin\Feedback\FeedbackController@feedel');
});

// 书籍管理路由
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    // 加载添加书籍页面路由
    Route::get('/book', 'Admin\Book\BookController@index');
    //书籍列表页面路由
    Route::get('/booklist', 'Admin\Book\BookListController@index');
    // 删除书籍路由
    Route::get('/bkdel/{id}', 'Admin\Book\BookListController@del');
    // 改变是否显示状态路由
    Route::get('/display/{d}/{id}', 'Admin\Book\BookListController@display');
    // 改变是否完结状态路由
    Route::get('/status/{d}/{id}', 'Admin\Book\BookListController@status');
    //改变是否在首页展示
    Route::get('/bookface/{d}/{id}', 'Admin\Book\BookListController@face');
    // 修改书籍书籍页面路由
    Route::get('/bookedit/{id}', 'Admin\Book\BookEditController@index');
    // 书籍详情路由页面
    Route::get('/bookdeta/{id}', 'Admin\Book\BookListController@show');
    // 添加书籍图片路由
    Route::post('/bookimg', 'Admin\Book\BookController@img');
    // 删除书籍图片路由
    Route::get('/delimg/{id}', 'Admin\Book\BookController@delimg');
    //章节管理书籍列表
    Route::get('/section/', 'Admin\Book\BookSectController@section');
    //查看章节
    Route::get('/show/{id}', 'Admin\Book\BookSectController@show');
    //添加章节页面路由
    Route::get('/sadd/{id}', 'Admin\Book\BookSectController@addindex');
    //删除章节
    Route::get('/sectdel/{id}', 'Admin\Book\BookSectController@sectdel');
    //修改章节状态
    Route::get('/secsta/{id}', 'Admin\Book\BookSectController@status');
});




Route::group(['prefix' => 'admin'], function () {
    // 添加书籍操作路由
    Route::post('/bookadd', 'Admin\Book\BookController@add');
    //执行书籍修改操作路由
    Route::post('/bookup', 'Admin\Book\BookEditController@up');
    // 执行添加章节
    Route::post('/sectadd', 'Admin\Book\BookSectController@add');
    // 执行添加分类路由
    Route::post('/cateadd', 'Admin\Category\CategoryController@add');
    // 执行分类修改
    Route::post('/catup', 'Admin\Categorylist\CotegoryListController@up');
    // 跳转提示
    Route::get('/prompt', 'Admin\Prompt\PromptController@index');

});

// 分类路由
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    //添加分类页面
    Route::get('/cateindex/{pid?}/{path?}', 'Admin\Category\CategoryController@index');
    //分类列表
    Route::get('/clist', 'Admin\Categorylist\CotegoryListController@index');
    // 删除路由
    Route::get('del/{id}', 'Admin\Categorylist\CotegoryListController@del');
    //改变状态路由
    Route::get('/state/{d}/{id}', 'Admin\Categorylist\CotegoryListController@state');
    //修改分类页面路由
    Route::get('/catedit/{id}', 'Admin\Categorylist\CotegoryListController@upindex');

// 用户路由组
    // 用户列表
    Route::get('/user', 'Admin\user\UserController@index');
    // 用户跳到添加页
    Route::get('/useradd', 'Admin\user\UseraddController@index');
    // 用户执行添加操作
    Route::post('/useraddx', 'Admin\user\UseraddController@add');
    // 用户删除
    Route::get('/userdelete/{id?}', 'Admin\user\UserdeleteController@delete');
    // 用户执行修改操作
    Route::post('/usermodify', 'Admin\user\UsermodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/usersingledata/{id?}', 'Admin\user\UsermodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
    // 禁用
    Route::get('/userstatejy/{id?}', 'Admin\user\UserdeleteController@statejy');
    // 激活
    Route::get('/userstatejh/{id?}', 'Admin\user\UserdeleteController@statejh');
    // 查看详情信息
    Route::get('/userselect/{id?}', 'Admin\user\UserselectController@select');

// 后台登录模板
   
});

Route::group(['prefix' => 'admin'], function () {
    // 后台登录 控制器
    Route::post('/login', 'Admin\LoginController@login');
    // 跳转后台登录器
    Route::get('/entry', 'Admin\LoginController@deng');
    //后台退出
    Route::get('/out', 'Admin\LoginController@out');
});
 
//后台用户路由组
Route::group(['prefix' => 'admin/auser', 'middleware' => 'role'], function () {
    Route::get('/index', 'Admin\Auser\AuserController@index');
    //添加页面
    Route::get('/add', 'Admin\Auser\AuserController@add');
    //查询账号是不是存在
    Route::get('/check/{user}', 'Admin\Auser\AuserController@check');

    //修改状态
    Route::get('/edit/{id}', 'Admin\Auser\AuserController@stutus');
    //加载编辑目录
    Route::get('/editl/{id}', 'Admin\Auser\AuserController@edit');
});
//执行添加方法
Route::post('admin/auser/insert', 'Admin\Auser\AuserController@insert');
//执行编辑方法
Route::post('admin/auser/save', 'Admin\Auser\AuserController@save');

//职位路由组
Route::group(['prefix' => 'admin/role', 'middleware' => 'role'], function () {
    //职位列表页
    Route::get('/index', 'Admin\Role\RoleController@index');
    //添加页面
    Route::get('/add', 'Admin\Role\RoleController@add');
    //删除页面
    Route::get('/del/{id}', 'Admin\Role\RoleController@del');
    //修改状态
    Route::get('/edit/{id}', 'Admin\Role\RoleController@stutus');
    //加载修改页面
    Route::get('/editl/{id}', 'Admin\Role\RoleController@edit');

});
//权限执行添加方法
Route::post('admin/role/insert', 'Admin\Role\RoleController@insert');
//执行职位编辑方法
Route::post('admin/role/save', 'Admin\Role\RoleController@save');

//权限路由
Route::group(['prefix' => 'admin/control', 'middleware' => 'role'], function () {
    Route::get('/index', 'Admin\Control\ControlController@index');
    Route::get('/add', 'Admin\Control\ControlController@add');
    //删除页面
    Route::get('/del/{id}', 'Admin\Control\ControlController@del');
    //加载编辑页面
    Route::get('/edit/{id}', 'Admin\Control\ControlController@edit');
});
//执行添加方法
Route::post('admin/control/insert', 'Admin\Control\ControlController@insert');
//执行修改方法
Route::post('admin/control/save', 'Admin\Control\ControlController@save');

//前端作者路由 中间键控制是不是登录
Route::group(['prefix' => 'home/author', 'middleware' => 'author'], function () {
    //加载作者个人中心首页
    Route::get('index/{id?}', 'Home\Author\AuthorController@index');
    //退出登录
    Route::get('exit', 'Home\Author\LoginController@exit1');
    //修改密码
    Route::post('pwd', 'Home\Author\AuthorController@pwd');
    //加载个人作品页面
    Route::get('work/{id}', 'Home\Author\AuthorController@work');
    //添加书籍页面
    Route::get('addbook', 'Home\Author\AuthorController@add');
    //执行添加书籍
    Route::post('insert', 'Home\Author\AuthorController@insert');
    //作者信息详情页加载
    Route::get('info/{id}','Home\Author\AuthorController@authorinfo');
    //执行作者信息修改
    Route::post('save','Home\Author\AuthorController@save');
    //作者信息详情页加载
    Route::get('edit/{id}','Home\Author\AuthorController@edit');
    //执行书籍信息修改
    Route::post('editbook','Home\Author\AuthorController@editbook');
    //添加书本章节页面
    Route::get('addchapter/{id}','Home\Author\ChapterController@add');
    //执行添加书籍
    Route::post('chapterinsert','Home\Author\ChapterController@insert');
    //加载积分兑换页面
    Route::get('/integ/{id}','Home\Author\IntegController@index');
    //执行兑换
    Route::get('/change/{id}/{gid}','Home\Author\IntegController@change');

    //我的物品页面加载
    Route::get('/good/{id}','Home\Author\IntegController@good');
    //物品使用
    Route::get('/gooddel/{id}','Home\Author\IntegController@gooddel');
    //查看已传章节
    Route::get('/end/{id}','Home\Author\ChapterController@end');

});
//作者登录页面
Route::group(['prefix' => 'home/author'],function (){
    //登陆页面
    Route::get('login','Home\Author\AuthorController@login');
    //进行登陆验证
    Route::post('checklogin','Home\Author\LoginController@login');
    //邮箱路由
    Route::post('email','Home\Author\LoginController@email');
    //注册页面
    Route::get('rig','Home\Author\AuthorController@rig');
    //执行作者用户添加
    Route::post('addrig','Home\Author\AuthorController@addrig');
});

//后台作者管理
Route::group(['prefix' => 'admin/author', 'middleware' => 'role'], function () {
    //加载作者列表
    Route::get('index', 'Admin\Author\AutController@index');
    //加载天骄页面
    Route::get('add', 'Admin\Author\AutController@add');
    //执行添加
    Route::post('insert', 'Admin\Author\AutController@insert');
    //修改状态
    Route::get('edit/{id}', 'Admin\Author\AutController@status');
    //查看详情
    Route::get('a/{id}', 'Admin\Author\AutController@details');
});


// 前台登录注册
Route::group(['prefix' => 'home'], function () {
    // 前台登录
    Route::get('/entryy', 'Home\LoginnController@deng');
    // 前台登录处理
    Route::post('/loginn', 'Home\LoginnController@login');
    // 前台注册
    Route::get('/entry', 'Home\RegisterController@deng');
    // 前台注册处理
    Route::post('/registe', 'Home\RegisterController@register');
});

// 广告管理
Route::group(['prefix' => 'poster', 'middleware' => 'role'], function () {
    // 广告列表
    Route::get('/poster', 'Admin\Advertising\AdvertisingController@index');
    // 执行修改操作
    Route::post('/postermodify', 'Admin\Advertising\AdvertisingmodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/postersingledata/{id?}', 'Admin\Advertising\AdvertisingmodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
    // 隐藏
    Route::get('/posterstatejy/{id?}', 'Admin\Advertising\AdvertisingdeleteController@statejy');
    // 显示
    Route::get('/posterstatejh/{id?}', 'Admin\Advertising\AdvertisingdeleteController@statejh');
    // 查看详情
    Route::get('/posterselect/{id?}', 'Admin\Advertising\AdvertisingselectController@select');
});

// 后台评论管理
Route::group(['prefix'=>'comment', 'middleware' => 'role'],function (){
    // 评论列表列表
    Route::get('/comment', 'Admin\Comment\CommentController@index');
    // 执行修改操作
    Route::post('/commentmodify', 'Admin\Comment\CommentmodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/commentsingledata/{id?}', 'Admin\Comment\CommentmodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
        // 隐藏
        Route::get('/commentstatejy/{id?}', 'Admin\Comment\CommentdeleteController@statejy');
        // 显示
        Route::get('/commentstatejh/{id?}', 'Admin\Comment\CommentdeleteController@statejh');
    // 查看详情
    Route::get('/commentselect/{id?}', 'Admin\Comment\CommentselectController@select');
     // 回复评论列表列表
    Route::get('/commentt', 'Admin\Commentt\CommentController@index');
    // 回复执行修改操作
    Route::post('/commentmodifyy', 'Admin\Commentt\CommentmodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/commentsingledataa/{id?}', 'Admin\Commentt\CommentmodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
        // 回复评论隐藏
        Route::get('/commentstatejyy/{id?}', 'Admin\Commentt\CommentdeleteController@statejy');
        // 回复评论显示
        Route::get('/commentstatejhh/{id?}', 'Admin\Commentt\CommentdeleteController@statejh');
    // 回复评论查看详情
    Route::get('/commentselectt/{id?}', 'Admin\Commentt\CommentselectController@select');
});

// 前台评论
Route::group(['prefix'=>'comment'],function (){
    // 添加评论
    Route::post('/commentaddx', 'Admin\Comment\CommentaddController@add');
    // 回复评论页面
    Route::get('/commentdatal/{id}/{bookname}', 'Home\Index\DetalController@indexx');
    // 添加追加评论
    Route::post('/commentaddxx', 'Admin\Comment\CommentaddController@addx');
});

//奖品路由
Route::group(['prefix'=>'admin/prize', 'middleware' => 'role'],function(){
    Route::get('/index', 'Admin\Author\PrizeController@index');
    Route::get('/add', 'Admin\Author\PrizeController@add');
    Route::post('/insert', 'Admin\Author\PrizeController@insert');
    Route::get('/del/{id}', 'Admin\Author\PrizeController@del');
    //加载编辑路由
    Route::get('/edit/{id}', 'Admin\Author\PrizeController@edit');
    //执行编辑
    Route::post('/save', 'Admin\Author\PrizeController@save');

});

// 点赞功能路由
Route::group(['prefix' => 'dainzan', 'middleware' => 'role'], function () {
    // 点赞列表
    Route::get('/dainzan', 'Admin\Dainzan\DainzanController@index');
    // 执行修改操作
    Route::post('/dainzanmodify', 'Admin\Dainzan\DainzanmodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/dainzansingledata/{id?}', 'Admin\Dainzan\DainzanmodifyController@singledata');
    // 查看详情
    Route::get('/dainzanselect/{id?}', 'Admin\Dainzan\DainzanselectController@select');
});

// 前台点赞加减功能
Route::group(['prefix' => 'dainzan'], function () {
    // 加赞减赞
    Route::get('/dainzann/{comid}/{uid}','Home\Index\DetaController@status');
});

// 书籍评分
Route::group(['prefix' => 'dainzan'], function () {
    // 添加评分
    Route::get('/Pin/{sid}/{uid}/{score}','Home\Index\PinController@index');
});

// 后台书籍评分列表
Route::group(['prefix' => 'Grade', 'middleware' => 'role'], function () {
    // 后台评分列表
    Route::get('/Grade', 'Admin\Grade\GradeController@index');
    // 执行修改操作
    Route::post('/Grademodify', 'Admin\Grade\GrademodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/Gradesingledata/{id?}', 'Admin\Grade\GrademodifyController@singledata');
    // 查看详情
    Route::get('/Gradeselect/{id?}', 'Admin\Grade\GradeselectController@select');
});


// 友情链接管理
Route::group(['prefix' => 'exchange', 'middleware' => 'role'], function () {
    // 友情链接列表
    Route::get('/exchange', 'Admin\Exchange\ExchangeController@index');
    // 执行修改操作
    Route::post('/exchangemodify', 'Admin\Exchange\ExchangemodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/exchangesingledata/{id?}', 'Admin\Exchange\ExchangemodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
        // 隐藏
        Route::get('/exchangestatejy/{id?}', 'Admin\Exchange\ExchangedeleteController@statejy');
        // 显示
        Route::get('/exchangestatejh/{id?}', 'Admin\Exchange\ExchangedeleteController@statejh');
    // 查看详情
    Route::get('/exchangeselect/{id?}', 'Admin\Exchange\ExchangeselectController@select');
    // 友情链接删除
    Route::get('/exchangedelete/{id?}', 'Admin\Exchange\ExchangedeleteController@delete');
    // 友情链接跳到添加页
    Route::get('/exchangeadd', 'Admin\Exchange\ExchangeaddController@index');
    // 友情链接执行添加操作
    Route::post('/exchangeaddx', 'Admin\Exchange\ExchangeaddController@add');
});


// 游戏链接管理
Route::group(['prefix' => 'gamelink', 'middleware' => 'role'], function () {
    // 游戏链接列表
    Route::get('/gamelink', 'Admin\Gamelink\GamelinkController@index');
    // 执行修改操作
    Route::post('/gamelinkmodify', 'Admin\Gamelink\GamelinkmodifyController@modify');
    // 带id值跳转到修改页面
    Route::get('/gamelinksingledata/{id?}', 'Admin\Gamelink\GamelinkmodifyController@singledata');
    // 带id值和状态值跳转到修改状态控制器
        // 隐藏
        Route::get('/gamelinkstatejy/{id?}', 'Admin\Gamelink\GamelinkdeleteController@statejy');
        // 显示
        Route::get('/gamelinkstatejh/{id?}', 'Admin\Gamelink\GamelinkdeleteController@statejh');
    // 查看详情
    Route::get('/gamelinkselect/{id?}', 'Admin\Gamelink\GamelinkselectController@select');
    // 游戏链接删除
    Route::get('/gamelinkdelete/{id?}', 'Admin\Gamelink\GamelinkdeleteController@delete');
    // 游戏链接跳到添加页
    Route::get('/gamelinkadd', 'Admin\Gamelink\GamelinkaddController@index');
    // 游戏链接执行添加操作
    Route::post('/gamelinkaddx', 'Admin\Gamelink\GamelinkaddController@add');
});

// 前台游戏页面
Route::group(['prefix' => 'recreation'], function () {
    // 游戏页面
    Route::get('/recreation', 'Home\Recreation\RecreationController@deng');
});

// 密码找回
Route::group(['prefix' => 'Secret'], function () {
    // 密码找回页面
    Route::get('/Secret', 'Home\Secret\SecretController@dengg');
    // 密码添加
    Route::post('/Secretz', 'Home\Secret\SecretController@dengz');
    // 密码修改
    Route::post('/Secretx', 'Home\Secret\SecretController@dengx');
    // 找回密码页面
    Route::get('/Zaohui', 'Home\Secret\SecretController@zaohui');
    // 密保问题页面
    Route::post('/Wenti', 'Home\Secret\SecretController@wenti');
    // 执行判断
    Route::post('/Zhix', 'Home\Secret\SecretController@zhix');
    // 执行修改密码操作
    Route::post('/Zixg', 'Home\Secret\SecretController@zixg');
});
