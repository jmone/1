<?php
return array(
    'index' => array('label' => '网站概览', 'icon' => 'icon-th-large', 'url' => array('/admin/setting/index/siteid/'.$this->siteid)),
    'setting' => array('label' => '网站设置', 'icon' => 'icon-plus', 'url' => array('/admin/setting/update/siteid/'.$this->siteid)),
    'article' => array('label' => '文章管理', 'icon' => 'icon-plus', 'url' => array('/admin/setting/article/siteid/'.$this->siteid)),
    'category' => array('label' => '文章分类', 'icon' => 'icon-plus', 'url' => array('/admin/setting/articleCategory/siteid/'.$this->siteid)),
    'message' => array('label' => '留言管理', 'icon' => 'icon-plus', 'url' => array('/admin/setting/message/siteid/'.$this->siteid)),
    'friend_link' => array('label' => '友情链接', 'icon' => 'icon-plus', 'url' => array('/admin/setting/friendLink/siteid/'.$this->siteid)),
    'job' => array('label' => '招聘管理', 'icon' => 'icon-plus', 'url' => array('/admin/setting/job/siteid/'.$this->siteid)),
);
?>
