<?php
return array(
    'index' => array('label' => '网站概览', 'icon' => 'icon-globe', 'url' => array('/admin/setting/index/siteid/'.$this->siteid)),
    'setting' => array('label' => '网站设置', 'icon' => 'icon-wrench', 'url' => array('/admin/setting/update/siteid/'.$this->siteid)),
    'article' => array('label' => '文章管理', 'icon' => 'icon-file', 'url' => array('/admin/setting/article/siteid/'.$this->siteid)),
    'category' => array('label' => '文章分类', 'icon' => 'icon-th-large', 'url' => array('/admin/setting/articleCategory/siteid/'.$this->siteid)),
    'message' => array('label' => '留言管理', 'icon' => 'icon-comment', 'url' => array('/admin/setting/message/siteid/'.$this->siteid)),
    'friend_link' => array('label' => '友情链接', 'icon' => 'icon-hand-up', 'url' => array('/admin/setting/friendLink/siteid/'.$this->siteid)),
    'job' => array('label' => '招聘管理', 'icon' => 'icon-star', 'url' => array('/admin/setting/job/siteid/'.$this->siteid)),
    'index_slide' => array('label' => '首页幻灯片', 'icon' => 'icon-picture', 'url' => array('/admin/setting/indexSlide/siteid/'.$this->siteid)),
    'navigation_link' => array('label' => '导航链接', 'icon' => 'icon-fire', 'url' => array('/admin/setting/navigationLink/siteid/'.$this->siteid)),
    'position' => array('label' => '推荐位管理', 'icon' => 'icon-random', 'url' => array('/admin/position/admin/siteid/'.$this->siteid)),
);
?>
