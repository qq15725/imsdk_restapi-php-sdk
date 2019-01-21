<?php

namespace Wxm\QcloudImsdk;

class TimRestApiGear
{
    /**
     * 单发信息
     **/
    function send_msg(TimRestAPI $api, $data_list)
    {
        if ($GLOBALS['argc'] < 6) {
            printf("openim.sendmsg 需要三个参数: account_id, receiver, text_content\n");
            return "Fail: not enough paragram for openim.sendmsg";
        }
        list($account_id, $receiver, $text_content) = $data_list;

        $ret = $api->openim_send_msg($account_id, $receiver, $text_content);
        return $ret;
    }

    /**
     * 单发图片
     **/
    function send_msg_pic(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("openim.sendmsg_pic 需要三个参数: account_id, receiver, pic_path\n");
            return "Fail: not enough paragram for openim.sendmsg_pic";
        }
        list($account_id, $receiver, $pic_path) = $data_list;

        $ret = $api->openim_send_msg_pic($account_id, $receiver, $pic_path);
        return $ret;
    }

    /**
     * 批量发信息
     **/
    function batch_sendmsg(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("openim.batchsendmsg 需要两个参数: account_id, text_content\n");
            return "Fail: not enough paragram for openim.batchsendmsg";
        }
        list($account_id_set, $text_content) = $data_list;
        $account_list = explode(",", $account_id_set);
        $ret          = $api->openim_batch_sendmsg($account_list, $text_content);
        return $ret;
    }

    /**
     * 批量发图片
     **/
    function batch_sendmsg_pic(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("openim.batchsendmsg 需要两个参数: account_id, text_content\n");
            return "Fail: not enough paragram for openim.batchsendmsg";
        }
        list($account_id_set, $pic_path) = $data_list;
        $account_list = explode(",", $account_id_set);
        $ret          = $api->openim_batch_sendmsg_pic($account_list, $pic_path);
        return $ret;
    }

    /**
     * 独立模式帐号同步
     **/
    function account_import(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("profile.portrait_get 需要三个参数: 帐号id, 用户昵称, 头像url\n");
            return "Fail: not enough paragram for im_open_login_svc.account_import";
        }
        list($identifier, $nick, $face_url) = $data_list;
        $ret = $api->account_import($identifier, $nick, $face_url);
        return $ret;
    }

    /**
     * 托管模式存量帐号导入
     **/
    function register_account(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("profile.portrait_get 需要三个参数: 帐号id, 帐号类型, 帐号密码\n");
            return "Fail: not enough paragram for registration_service.register_account";
        }
        list($identifier, $identifier_type, $password) = $data_list;
        $ret = $api->register_account($identifier, $identifier_type, $password);
        return $ret;
    }

    /**
     * 获取用户信息
     * account_list 为要拉取的用户id集合
     * tag_list 为选项字段，指明要拉取的信息，比如昵称
     **/
    function portrait_get(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("profile.portrait_get 需要一个参数: 帐号id\n");
            return "Fail: not enough paragram for profile.portrait_get";
        }
        list($account_id) = $data_list;
        $ret = $api->profile_portrait_get($account_id);
        return $ret;
    }

    /**
     * 设置用户信息
     **/
    function portrait_set(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("profile.portrait_set 需要两个参数: 帐号id, 新昵称\n");
            return "Fail: not enough paragram for profile.portrait_set";
        }
        list($account_id, $new_name) = $data_list;
        $ret = $api->profile_portrait_set($account_id, $new_name);
        return $ret;
    }

    /**
     * 建立好友关系
     **/
    function friend_import(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("sns.friend_import 需要两个参数: 帐号id, 需要添加的好友id\n");
            return "Fail: not enough paragram for sns.friend_import";
        }
        list($account_id, $receiver) = $data_list;
        $ret = $api->sns_friend_import($account_id, $receiver);
        return $ret;
    }

    /**
     * 解除好友关系
     **/
    function friend_delete(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("sns.friend_delete 需要两个参数: 帐号id, 需要删除的好友id\n");
            return "Fail: not enough paragram for sns.friend_delete";
        }
        list($account_id, $frd_id) = $data_list;
        $ret = $api->sns_friend_delete($account_id, $frd_id);
        return $ret;
    }

    /**
     * 解除用户所有好友关系
     **/
    function friend_delete_all(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("sns.friend_delete_all 需要一个参数: 帐号id\n");
            return "Fail: not enough paragram for sns.friend_delete_all";
        }
        list($account_id) = $data_list;
        $ret = $api->sns_friend_delete_all($account_id);
        return $ret;
    }

    /**
     * 校验好友关系
     **/
    function friend_check(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("sns.friend_check 需要两个参数: 帐号id, 校验对象id\n");
            return "Fail: not enough paragram for sns.friend_check";
        }
        list($account_id, $to_account) = $data_list;
        $ret = $api->sns_friend_check($account_id, $to_account);
        return $ret;
    }

    /**
     * 获取用户全部好友
     **/
    function friend_get_all(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("sns.friend_get_all 需要一个参数: 帐号id\n");
            return "Fail: not enough paragram for sns.friend_get_all";
        }
        list($account_id) = $data_list;
        $ret = $api->sns_friend_get_all($account_id);
        return $ret;
    }

    /**
     * 获取用户指定好友
     **/
    function friend_get_list(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("sns.friend_get_list 需要两个参数: 帐号id, 需要被拉取的好友id\n");
            return "Fail: not enough paragram for sns.friend_get_list";
        }
        list($account_id, $frd_id) = $data_list;
        $ret = $api->sns_friend_get_list($account_id, $frd_id);
        return $ret;
    }

    /**
     * 获取app中所有群组(高级接口)a
     **/
    function get_appid_group_list(TimRestAPI $api, $data_list)
    {

        $ret = $api->group_get_appid_group_list();
        return $ret;
    }

    /**
     * 创建群
     **/
    function create_group(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.create_group 至少需要2个参数: 群类型，群名称\n");
            return "Fail: not enough paragram for group_open_http_svc.create_group";
        }
        list($group_type, $group_name, $owner_id) = $data_list;
        $ret = $api->group_create_group($group_type, $group_name, $owner_id);
        return $ret;
    }

    /**
     * 转让群
     **/
    function change_group_owner(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.create_group 至少需要2个参数: 群id，新群主id\n");
            return "Fail: not enough paragram for group_open_http_svc.change_group_owner?";
        }
        list($group_type, $group_name, $owner_id) = $data_list;
        $ret = $api->group_change_group_owner($group_type, $group_name, $owner_id);
        return $ret;
    }

    /**
     * 获取群组详细信息
     **/
    function get_group_info(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("group_open_http_svc.get_group_info 需要至少一个参数: 群id\n");
            return "Fail: not enough paragram for group_open_http_svc.get_group_info";
        }
        list($group_id) = $data_list;
        $ret = $api->group_get_group_info($group_id);
        return $ret;
    }

    /**
     * 获取群组成员详细资料
     * limit, offset字段分别表示最大数量和偏移量
     **/
    function get_group_member_info(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("group_open_http_svc.get_group_member_info 需要至少一个参数: 群id\n");
            return "Fail: not enough paragram for group_open_http_svc.get_group_member_info";
        } else {
            list($group_id, $limit, $offset) = $data_list;
            $ret = $api->group_get_group_member_info($group_id, $limit, $offset);
        }
        return $ret;
    }

    /**
     * 修改群组资料
     * 这里只修改群组名字
     **/
    function modify_group_base_info(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("group_open_http_svc.modify_group_base_info 需要至少一个参数: 群id\n");
            return "Fail: not enough paragram for group_open_http_svc.modify_group_base_info";
        }
        list($group_id, $group_name) = $data_list;

        $ret = $api->group_modify_group_base_info($group_id, $group_name);
        return $ret;
    }

    /*
       * 增加群组成员
       **/
    function add_group_member(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.add_group_member 需要至少两个参数: 群id, 用户id\n");
            return "Fail: not enough paragram for group_open_http_svc.add_group_member";
        }
        list($group_id, $member_id, $silence) = $data_list;

        $ret = $api->group_add_group_member($group_id, $member_id, $silence);
        return $ret;
    }

    /*
       * 删除群组成员
       * mem_list为增加用户列表，这里只有一个用户
       **/
    function delete_group_member(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.delete_group_member 需要至少两个参数: 群id, 用户id\n");
            return "Fail: not enough paragram for group_open_http_svc.delete_group_member";
        } else {
            list($group_id, $member_id, $silence) = $data_list;
            $ret = $api->group_delete_group_member($group_id, $member_id, $silence);
        }
        return $ret;
    }

    /*
       * 修改群组成员身份
       **/
    function modify_group_member_info(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("group_open_http_svc.modify_group_member_info 需要至少两个参数: 群id, 用户id, 身份标识\n");
            return "Fail: not enough paragram for group_open_http_svc.modify_group_member_info";
        } else {
            list($group_id, $account_id, $role) = $data_list;
            $ret = $api->group_modify_group_member_info($group_id, $account_id, $role);
        }
        return $ret;
    }

    /*
       * 解散群组
       **/
    function destroy_group(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("group_open_http_svc.destroy_group 需要至少一个参数: 群id\n");
            return "Fail: not enough paragram for group_open_http_svc.destroy_group";
        } else {
            list($group_id) = $data_list;
            $ret = $api->group_destroy_group($group_id);
        }
        return $ret;
    }

    /*
       * 获取某用户加入的群组
       **/
    function get_joined_group_list(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 4) {
            printf("group_open_http_svc.get_joined_group_list 需要至少一个参数: 用户id\n");
            return "Fail: not enough paragram for group_open_http_svc.get_joined_group_list";
        }
        list($account_id) = $data_list;
        $ret = $api->group_get_joined_group_list($account_id);
        return $ret;
    }

    /*
       * 查询用户在某个群中身份
       **/
    function get_role_in_group(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.get_role_in_group 需要至少两个参数: 群id, 用户id\n");
            return "Fail: not enough paragram for group_open_http_svc.get_role_in_group";
        } else {
            list($group_id, $member_id) = $data_list;
            $ret = $api->group_get_role_in_group($group_id, $member_id);
        }
        return $ret;
    }

    /*
       * 批量禁言/取消禁言
       **/
    function forbid_send_msg(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("group_open_http_svc.forbid_send_msg 需要至少两个参数: 群id, 用户id, 禁言时间(秒)\n");
            return "Fail: not enough paragram for group_open_http_svc.forbid_send_msg";
        }
        list($group_id, $member_id, $second) = $data_list;
        $ret = $api->group_forbid_send_msg($group_id, $member_id, $second);
        return $ret;
    }

    /**
     * 在某一群组里发普通消息
     **/
    function send_group_msg(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.open_send_group_msg 需要至少两个参数: 群组id, 文本内容\n");
            return "Fail: not enough paragram for group_open_http_svc.open_send_group_msg";
        }
        list($account_id, $group_id, $text_content) = $data_list;
        $ret = $api->group_send_group_msg($account_id, $group_id, $text_content);
        return $ret;
    }

    /**
     * 在某一群组里发送图片
     **/
    function send_group_msg_pic(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("group_open_http_svc.open_send_group_msg_pic 需要至少三个参数: 发送者id, 群组id, 图片本地路径\n");
            return "Fail: not enough paragram for group_open_http_svc.open_send_group_msg_pic";
        }
        list($account_id, $group_id, $pic_path) = $data_list;
        $ret = $api->group_send_group_msg_pic($account_id, $group_id, $pic_path);
        return $ret;
    }

    /**
     * 在某一群组里发系统消息
     **/
    function send_group_system_notification(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.send_group_system_notification 需要至少两个参数: 群组id, 文本内容\n");
            return "Fail: not enough paragram for group_open_http_svc.send_group_system_notification";
        }
        list($group_id, $text_content, $receiver_id) = $data_list;
        //默认为空，发送全员
        $ret = $api->group_send_group_system_notification($group_id, $text_content, $receiver_id);
        return $ret;
    }

    /**
     * 导入群成员
     **/
    function import_group_member(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 5) {
            printf("group_open_http_svc.send_group_system_notification 需要至少两个参数: 群组id, 成员id\n");
            return "Fail: not enough paragram for group_open_http_svc.import_group_member";
        }
        if ($GLOBALS['argc'] == 5) {
            list($group_id, $member_id) = $data_list;
        } else {
            list($group_id, $member_id, $role) = $data_list;
        }
        $role = null;
        $ret  = $api->group_import_group_member($group_id, $member_id, $role);
        return $ret;
    }

    /**
     * 导入群消息
     **/
    function import_group_msg(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("group_open_http_svc.send_group_system_notification 需要至少两个参数: 群组id, 消息发送者, 文本内容\n");
            return "Fail: not enough paragram for group_open_http_svc.import_group_msg";
        }
        list($group_id, $from_account, $text) = $data_list;

        $ret = $api->group_import_group_msg($group_id, $from_account, $text);
        return $ret;
    }

    /**
     * 导入群消息
     **/
    function set_unread_msg_num(TimRestAPI $api, $data_list)
    {

        if ($GLOBALS['argc'] < 6) {
            printf("group_open_http_svc.send_group_system_notification 需要至少两个参数: 群组id, 成员id, 群内身份\n");
            return "Fail: not enough paragram for group_open_http_svc.set_unread_msg_num";
        }
        list($group_id, $member_account, $unread_msg_num) = $data_list;
        //默认为空，发送全员
        $ret = $api->group_set_unread_msg_num($group_id, $member_account, $unread_msg_num);
        return $ret;
    }
}
