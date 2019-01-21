### 工具目录结构

├── README
├── config
│     ├── config.php
├── src
│     ├── TimRestApiGear.php
│     ├── TimRestApi.php
│     ├── TimRestInterface.php
├── imsdk

config/config.php 为该工具所需APP基础配置信息。
imsdk 为使用接口示例工具
TimRestApi.php 为接口具体实现。
TimRestInterface.php 为访问rest api示例的接口集合。

### 使用步骤

独立模式
1.配置config/config.php文件，其中：
identifier 为APP管理者账户；
private_pem_path 为本地私钥位置；
user_sig 请填""。
2.执行 `php imsdk` 可看到该工具访问命令(用法)。

托管模式
1.配置config/config.php文件，其中：
identifier 为APP管理者账户；
user_sig 为托管模式用户下载到的用户凭证；
private_pem_path 请填""。
2.执行 `php imsdk` 可看到该工具访问命令(用法)。

