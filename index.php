<?php


$settings = get_option('settings', $params['id']);

$defaults = array(
    'video_id' => '279249292',
    'video_title' => 'Microweber CMS Tutorial Video',
    'video_description' => 'Microweber is a free Open Source CMS and Drag & Drop Builder',
    'video_order' => '1',
    'video_file' => ''
);

$is_empty = false;
$data = json_decode($settings, true);

if(!$data){
$data = array();    
}

if (count($data) == 0) {
    $is_empty = true;
//    print lnotif("Click on settings to edit this module");
  //  $data = array($defaults);
  //  return;
}


$module_template = get_option('data-template', $params['id']);


if ($module_template == false and isset($params['template'])) {
    $module_template = $params['template'];
}
if ($module_template != false) {
    $template_file = module_templates($config['module'], $module_template);
} else {
    $template_file = module_templates($config['module'], 'default');
}
if (is_file($template_file)) {
    include($template_file);
}
