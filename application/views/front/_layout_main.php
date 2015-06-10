<?php $this->load->view('front/component/page_header',array('meta_title'=>$meta_title)); ?>
<?php $this->load->view($subview);?> 
<?php $this->load->view('front/component/page_footer',array('site_name'=>$site_name)); ?>
