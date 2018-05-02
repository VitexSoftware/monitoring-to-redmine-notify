# monitoring-to-redmine-notify

Allow Icinga/Nagios notify server problem as new issue in redmine

Please Use following formats for **address2** url:

 * login/pass   https://login:password@server/path?project=monitoring
 * apikey       https://apikey@server/path?project=monitoring

?project value is project identifier as is used in redmine project url

We need redmine API enabled https://www.youtube.com/watch?v=l3vhtQohrXw

Add To your configuration:

```
define command { 
        command_line /usr/bin/host-notify-by-redmine
        command_name host-notify-by-redmine
}

define command { 
        command_line /usr/bin/service-notify-by-redmine
        command_name service-notify-by-redmine
}

define contact { 
        address2                      https://login:password@server/redmine?project=monitoring
        alias                         redmine
        contact_name                  john doe redmine
        host_notification_commands    host-notify-by-redmine
        host_notification_options     d,u,r
        host_notification_period      24x7
        host_notifications_enabled    1
        service_notification_commands service-notify-by-redmine
        service_notification_options   ,w,u,c
        service_notification_period   24x7
        service_notifications_enabled 1
        use                           generic-contact
}

```

Debian Installation
-------------------

Please use our repo:

```
    wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -
    echo deb http://v.s.cz/ stable main > /etc/apt/sources.list.d/ease.list
    apt update
    apt install monitoring-to-redmine-notify
```


You can import initial configuration into [Icinga Editor](https://github.com/VitexSoftware/Icinga-Editor) using this command:

```
iecfgimporter  /usr/share/doc/monitoring-to-redmine-notify/notifications.cfg
```

We Use https://github.com/kbsali/php-redmine-api to talk with redmine
