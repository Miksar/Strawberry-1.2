#_strawberry
# table insert

INSERT INTO `{pref}blocks` (`bid`, `title`, `bposition`, `weight`, `active`, `blockfile`, `view`, `which`) VALUES
(1, '������� ����', 'c', 1, 1, 'bl-up_menu.php', 'sall,', 'iall,'),
(2, '������ ����', 'd', 1, 1, 'bl-down_menu.php', 'sall,', 'iall,'),
(3, '�����������', 'l', 1, 1, 'bl-left_login.php', 'sall,', 'iall,'),
(4, '���� �� �����', 'l', 2, 1, 'bl-left_menu.php', 'sall,', 'iall,'),
(5, '��������� �����', 'l', 3, 1, 'bl-money.php', 'sall,', 'iall,'),
(6, '�������Off', 'l', 4, 1, 'bl-gallery.php', 'sall,', 'iall,'),
(7, '��������� ��������', 'l', 5, 1, 'bl-calendar.php', 'sall,', 'iall,'),
(8, '���� ������', 'l', 6, 1, 'bl-you_data.php', 'sall,', 'iall,'),
(10, '������ �� �����', 'l', 7, 1, 'bl-online.php', 'sall,', 'iall,');

INSERT INTO `{pref}categories` (`id`, `name`, `icon`, `url`, `parent`, `level`, `template`, `description`, `usergroups`, `numb`, `modul`) VALUES 
(1, '�����', '', 'archiv', 0, 0, '', '', '', 1, 'news'),
(2, '�������', '', 'news', 0, 0, '', '', '', 2, 'news'),
(3, '��������', '', 'kontakty', 0, 0, '', '', '', 3, 'news');

INSERT INTO `{pref}usergroups` (`id`, `name`, `access`, `permissions`) VALUES
(1, '��������������', 'full', 'N;'),
(2, '���������', 'a:2:{s:5:"write";a:31:{s:15:"adepto_fastload";s:1:"0";s:7:"go_link";s:1:"0";s:2:"js";s:1:"0";s:3:"rss";s:1:"0";s:9:"trackback";s:1:"0";s:5:"ipban";s:1:"1";s:5:"mails";s:1:"1";s:4:"main";s:1:"1";s:2:"gb";s:1:"1";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"1";s:6:"import";s:1:"0";s:5:"links";s:1:"1";s:10:"categories";s:1:"1";s:8:"comments";s:1:"1";s:6:"online";s:1:"1";s:8:"personal";s:1:"1";s:6:"syscon";s:1:"0";s:5:"about";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"1";s:9:"editusers";s:1:"1";s:6:"regmod";s:1:"0";s:8:"editnews";s:1:"1";s:6:"backup";s:1:"1";s:9:"statistic";s:1:"1";s:5:"rufus";s:1:"0";s:7:"sblocks";s:1:"1";s:6:"images";s:1:"1";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}s:4:"read";a:31:{s:15:"adepto_fastload";s:1:"0";s:7:"go_link";s:1:"0";s:2:"js";s:1:"0";s:3:"rss";s:1:"0";s:9:"trackback";s:1:"0";s:5:"ipban";s:1:"1";s:5:"mails";s:1:"1";s:4:"main";s:1:"1";s:2:"gb";s:1:"1";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"1";s:6:"import";s:1:"0";s:5:"links";s:1:"1";s:10:"categories";s:1:"1";s:8:"comments";s:1:"1";s:6:"online";s:1:"1";s:8:"personal";s:1:"1";s:6:"syscon";s:1:"0";s:5:"about";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"1";s:9:"editusers";s:1:"1";s:6:"regmod";s:1:"0";s:8:"editnews";s:1:"1";s:6:"backup";s:1:"1";s:9:"statistic";s:1:"1";s:5:"rufus";s:1:"0";s:7:"sblocks";s:1:"1";s:6:"images";s:1:"1";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}}', 'a:7:{s:12:"approve_news";s:1:"0";s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";s:8:"edit_all";s:1:"1";s:10:"delete_all";s:1:"1";s:8:"comments";s:1:"1";s:6:"fields";a:9:{s:4:"date";s:1:"1";s:8:"category";s:1:"1";s:3:"url";s:1:"1";s:3:"xml";s:1:"1";s:10:"edcomments";s:1:"1";s:11:"news_format";s:1:"1";s:10:"trackbacks";s:1:"1";s:15:"adepto_fastload";s:1:"1";s:6:"sticky";s:1:"1";}}'),
(3, '������������', 'a:2:{s:5:"write";a:20:{s:15:"adepto_fastload";s:1:"0";s:5:"ipban";s:1:"0";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"1";s:6:"import";s:1:"0";s:10:"categories";s:1:"0";s:8:"personal";s:1:"1";s:6:"regmod";s:1:"0";s:6:"syscon";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"0";s:9:"editusers";s:1:"0";s:8:"editnews";s:1:"1";s:6:"backup";s:1:"0";s:4:"main";s:1:"0";s:3:"cqt";s:1:"0";s:5:"rufus";s:1:"0";s:6:"images";s:1:"1";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}s:4:"read";a:20:{s:15:"adepto_fastload";s:1:"0";s:5:"ipban";s:1:"0";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"1";s:6:"import";s:1:"0";s:10:"categories";s:1:"0";s:8:"personal";s:1:"1";s:6:"regmod";s:1:"0";s:6:"syscon";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"0";s:9:"editusers";s:1:"0";s:8:"editnews";s:1:"1";s:6:"backup";s:1:"0";s:4:"main";s:1:"0";s:3:"cqt";s:1:"0";s:5:"rufus";s:1:"0";s:6:"images";s:1:"1";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}}', 'a:8:{s:12:"approve_news";s:1:"0";s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";s:8:"edit_all";s:1:"0";s:10:"delete_all";s:1:"0";s:8:"comments";s:1:"1";s:10:"categories";s:11:"on,on,17,18";s:6:"fields";a:10:{s:4:"date";s:1:"1";s:8:"category";s:1:"1";s:3:"url";s:1:"0";s:10:"edcomments";s:1:"1";s:10:"meta_title";s:1:"1";s:13:"meta_keywords";s:1:"1";s:16:"meta_description";s:1:"1";s:15:"adepto_fastload";s:1:"0";s:11:"news_format";s:1:"0";s:6:"sticky";s:1:"0";}}'),
(4, '������������', 'a:2:{s:5:"write";a:31:{s:15:"adepto_fastload";s:1:"0";s:7:"go_link";s:1:"0";s:2:"js";s:1:"0";s:3:"rss";s:1:"0";s:9:"trackback";s:1:"0";s:5:"ipban";s:1:"0";s:5:"mails";s:1:"0";s:4:"main";s:1:"0";s:2:"gb";s:1:"0";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"0";s:6:"import";s:1:"0";s:5:"links";s:1:"0";s:10:"categories";s:1:"0";s:8:"comments";s:1:"0";s:6:"online";s:1:"0";s:8:"personal";s:1:"1";s:6:"syscon";s:1:"0";s:5:"about";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"0";s:9:"editusers";s:1:"0";s:6:"regmod";s:1:"0";s:8:"editnews";s:1:"0";s:6:"backup";s:1:"0";s:9:"statistic";s:1:"0";s:5:"rufus";s:1:"0";s:7:"sblocks";s:1:"0";s:6:"images";s:1:"0";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}s:4:"read";a:31:{s:15:"adepto_fastload";s:1:"0";s:7:"go_link";s:1:"0";s:2:"js";s:1:"0";s:3:"rss";s:1:"0";s:9:"trackback";s:1:"0";s:5:"ipban";s:1:"0";s:5:"mails";s:1:"0";s:4:"main";s:1:"1";s:2:"gb";s:1:"0";s:10:"usergroups";s:1:"0";s:7:"addnews";s:1:"0";s:6:"import";s:1:"0";s:5:"links";s:1:"0";s:10:"categories";s:1:"0";s:8:"comments";s:1:"0";s:6:"online";s:1:"0";s:8:"personal";s:1:"1";s:6:"syscon";s:1:"0";s:5:"about";s:1:"0";s:7:"plugins";s:1:"0";s:3:"snr";s:1:"0";s:9:"editusers";s:1:"0";s:6:"regmod";s:1:"0";s:8:"editnews";s:1:"0";s:6:"backup";s:1:"0";s:9:"statistic";s:1:"1";s:5:"rufus";s:1:"0";s:7:"sblocks";s:1:"0";s:6:"images";s:1:"0";s:9:"emoticons";s:1:"0";s:9:"templates";s:1:"0";}}', 'a:7:{s:12:"approve_news";s:1:"0";s:4:"edit";s:1:"1";s:6:"delete";s:1:"0";s:8:"edit_all";s:1:"0";s:10:"delete_all";s:1:"0";s:8:"comments";s:1:"1";s:6:"fields";a:9:{s:4:"date";s:1:"1";s:8:"category";s:1:"1";s:3:"url";s:1:"0";s:3:"xml";s:1:"1";s:10:"edcomments";s:1:"0";s:11:"news_format";s:1:"0";s:10:"trackbacks";s:1:"1";s:15:"adepto_fastload";s:1:"0";s:6:"sticky";s:1:"0";}}');