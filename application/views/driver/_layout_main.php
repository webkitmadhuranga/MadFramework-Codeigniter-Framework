<?php $this->load->view('driver/component/page_header',array('meta_title'=>$meta_title)); ?>
<?php $this->load->view($subview);?> 
<?php $this->load->view('driver/component/page_footer',array('site_name'=>$site_name)); ?>
