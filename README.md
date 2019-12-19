# blogWeb
微型博客系统 Microblogging system

# 目录

+ [编写目的](#1)

+ [项目背景](#2)

+ [开发环境及工具](#3)

+ [功能描述](#4)
  
  + [功能模块](#4.1)
  
  + [整体框架视图](#4.2)
  
  + [源代码](#4.3)
  
  + [数据库设计](#4.4)
  
  + [其他设计](#4.5)

# <h1 id = "1">编写目的</h1>

作为 “Web数据库” 课程的期末考核大作业，以两人团队做一个微型博客系统

# <h1 id = "2">项目背景</h1>

”微博“ 是现在比较常用的一个软件，我们小组要开发一个简单小型的微博管理系统，”微型博客系统“ 可以实现基本的 “微博” 功能。

**参与开发人员**：许红凯、杨丽娜

# <h1 id = "3">开发环境及工具</h1>

**开发环境**：Windows 10

**开发工具**：PhpStorm + XAMPP (Apache + MySql) 

**使用语言**：PHP + HTML + CSS（使用框架为Bootsrtap）

# <h1 id = "4">功能描述</h1>

## <h2 id = "4.1">功能模块</h2>

+ **用户功能模块**
  
  + 注册、登录（登录界面允许用户保存用户名，同时未登录状态不允许进入本系统）
  
  + 发布微博，修改微博
  
  + 浏览 “微博广场” 的推荐微博
  
  + 浏览其他用户的个人主页
  
  + 修改自己的个人信息（性别、年龄、电话（必填）、QQ号、Email）

+ **管理员功能模块**
  
  + 登录
  
  + 浏览 “微博广场” 的推荐微博
  
  + 查看所有的微博并可以对其删除
  
  + 查看所有的用户并可以对其删除
  
  + 浏览不同用户的个人主页

## <h2 id = "4.2">整体框架视图</h2>

![image](https://user-images.githubusercontent.com/36668756/71190341-62ce3300-22bf-11ea-9f0c-dbd7040223c2.png)

## <h2 id = "4.3">源代码</h2>

![image](https://user-images.githubusercontent.com/36668756/71190685-03245780-22c0-11ea-9278-fe3ee057eef5.png)

**<↑总文件夹 “blogWeb” ↑>**

![image](https://user-images.githubusercontent.com/36668756/71190879-50082e00-22c0-11ea-866a-2dd5e668612e.png)

**<↑整体配置 “other” ↑>**

![image](https://user-images.githubusercontent.com/36668756/71190980-834abd00-22c0-11ea-9ed5-889d9a4d4030.png)

**<↑用户 “user” ↑>**

![image](https://user-images.githubusercontent.com/36668756/71190996-8ba2f800-22c0-11ea-94ab-11daa7ba7f49.png)

**<↑管理员 “admin” ↑>**

## <h2 id = "4.4">数据库设计</h2>

数据库 “blog” 中建立三个表：“admin”，“user”，“page”（本系统默认管理员唯一且已定，无需注册，只要登录即可）

每个表内分别有若干属性

![image](https://user-images.githubusercontent.com/36668756/71191218-f18f7f80-22c0-11ea-8cc1-c8a4ed87465b.png)

**<↑在一个库内建立三个表 ↑>**

![image](https://user-images.githubusercontent.com/36668756/71191370-46cb9100-22c1-11ea-8ac2-54a84c3a50fe.png)

**<↑管理员表↑>**

![image](https://user-images.githubusercontent.com/36668756/71191387-4b904500-22c1-11ea-9f8e-ca43190b8c3e.png)

**<↑用户表↑>**

![image](https://user-images.githubusercontent.com/36668756/71191396-5054f900-22c1-11ea-919d-2347da1dc6f2.png)

**<↑微博表↑>**

## <h2 id = "4.5">其他设计</h2>

1. **安全性设计**
   
   + **权限控制**：每一个页面会检测用户是否已经已经登录，如果未登陆则会跳转到总入口进行登录。在未登陆之前不能查看微博
   
   + **用户自主权**：用户可以在微博推荐页面通过点击作者查看其他人发得个人微博

2. **用户性能设计**
   
   + **操作方便合理**：尽量从用户角度出发，以方便使用本产品
   
   + **容错能力**：系统具有一定的容错和抗干扰能力，在非硬件或给通讯故障时，系统能够保证正常运行，并有足够的提示信息帮助用户有效正确地完成任务。

# 
