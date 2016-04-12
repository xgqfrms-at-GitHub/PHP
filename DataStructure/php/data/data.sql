CREATE TABLE IF NOT EXISTS `user` ( 
  `id` int(32) NOT NULL AUTO_INCREMENT KEY, 
  `username` varchar(255) NOT NULL COMMENT '用户名', 
  `password` varchar(255) NOT NULL COMMENT '密码', 
  `email` varchar(255) NOT NULL COMMENT '邮箱', 
  `token` varchar(255) NOT NULL COMMENT '帐号激活码', 
  `token_exptime` int(32) NOT NULL COMMENT '激活码有效期', 
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活', 
  `regtime` int(32) NOT NULL COMMENT '注册时间', 
) ENGINE=INNODB  DEFAULT CHARSET=utf8; 
CREATE TABLE IF NOT EXISTS `users` ( 
  `id` int(32) UNSIGNED NOT NULL  KEY AUTO_INCREMENT , 
  `username` varchar(255) NOT NULL UNIQUE COMMENT '用户名', 
  `password` varchar(255) NOT NULL COMMENT '密码', 
  `email` varchar(255) NOT NULL UNIQUE COMMENT '邮箱', 
  `token` varchar(255) NOT NULL UNIQUE COMMENT '帐号激活码', 
  `token_expire` varchar(255) NOT NULL COMMENT '激活码有效期', 
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活', 
  `register_time` int(32) NOT NULL COMMENT '注册时间', 
) ENGINE=INNODB  DEFAULT CHARSET=utf8; 