<?php  // <~ do not copy the opening php tag

add_shortcode('members_social','members_social_func');
function members_social_func($atts=array()){
global $bp;
$user_id = $bp->loggedin_user->id;
$fields = array('Twitter Url', 'Facebook Url', 'Google Plus Url');
$html='';
if(!empty($fields)){
    $html.='<ul>';
    foreach($fields as $key=>$value){
	   $link = xprofile_get_field_data($value,$user_id);
       if($link){
	   	$html.='<li>'.$value.': '.$link.'</li>';
	   }
     }
    $html.='</ul>';
}
return $html;
}
