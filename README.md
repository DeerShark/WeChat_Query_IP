# WeChat_Query_IP
### 👍 项目介绍

为了查询网站解析的IP和IP的位置或者在手机上查询IP方便，对接上自己的公众号查询是十分不错的选择！

大家可以关注我的公众号试试 😎  
![公众号](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215164916.png)  

### 🚀 如何使用--给的小白教程（自己也才略知一二(。-ω-)zzz）
**上传源码**  

下载源码后上传至你的服务器，打开「wx_api.php」，修改你想填的「taken」，然后将 ```$wechatObj->valid();``` 的注释去掉

![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215162237.png)  

**配置公众号**  

1.首先注册**微信公众号**（这不用多说）

2.进入公众号在左侧栏找到并点击「基本配置」，点击「修改配置」

![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215162639.png)  
![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215162908.png)  

3.然后按照图中的指示填写（其实是懒）  

![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215163153.png)  

4.点击「提交」，提交验证成功后再进入服务器打开「wx_api.php」

5.将```$wechatObj->valid();```注释或者删除，将 ```$wechatObj->responseMsg();``` 的注释删除

![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215163715.png)  

6.发送IP地址或者域名给你的公众号试试吧

![截图](https://github.com/Liuescn/WeChat_Query_IP/blob/main/QQ%E6%88%AA%E5%9B%BE20210215164203.png)  

### 🎉 其他
IP本地查询功能来自：[https://mkblog.cn/1951/](https://mkblog.cn/1951/)  
**源码内已有2021-02-15获取的纯真IP数据库**
