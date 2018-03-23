<?php
$firstcolor = get_option('dysania_first_color');
$secondcolor = get_option('dysania_second_color');
$thirdcolor = get_option('dysania_third_color');
$fourthcolor = get_option('dysania_fourth_color');
$fifthcolor = get_option('dysania_fifth_color');
$firstfont = get_option('dysania_fontheadingfamily'); 
$secondfont = get_option('dysania_fontfamily');
$sitetitle = get_option('dysania_sitetitlesize');
$h1size = get_option('dysania_h1');
$h2size = get_option('dysania_h2');
$h3size = get_option('dysania_h3');
$h4size = get_option('dysania_h4');
$h5size = get_option('dysania_h5');
$h6size = get_option('dysania_h6');
$psize = get_option('dysania_p');
$menusize = get_option('dysania_menusize');
$dropdownwidth = get_option('dysania_dropdownwidth');
?>

<style type="text/css"> 
body, p,label,blockquote cite,input[type="text"], input[type="email"], input[type="number"], input[type="date"], input[type="password"], textarea,input[type="submit"],.button,.cbp-qtrotator .blockquote .footer,.ionTabs__tab {
    <?php if (!empty($secondfont)) { echo stripslashes($secondfont); } else { echo "font-family: 'open_sansregular';"; } ?>
    font-size: <?php if (!empty($psize)) { echo stripslashes($psize); } else { echo "13"; } ?>px;
}
.logo {
    font-size: <?php if (!empty($sitetitle)) { echo stripslashes($sitetitle); } else { echo "60"; } ?>px;
}    
h1 {
	font-size: <?php if (!empty($h1size)) { echo stripslashes($h1size); } else { echo "48"; } ?>px;
}
h2 {
	font-size: <?php if (!empty($h2size)) { echo stripslashes($h2size); } else { echo "36"; } ?>px;
}
h3,.zeus-info {
	font-size: <?php if (!empty($h3size)) { echo stripslashes($h3size); } else { echo "28"; } ?>px;
}
h4,#reply-title {
	font-size: <?php if (!empty($h4size)) { echo stripslashes($h4size); } else { echo "24"; } ?>px;
}
h5, .toggleMenu, .numericlist dt {
	font-size: <?php if (!empty($h5size)) { echo stripslashes($h5size); } else { echo "20"; } ?>px;
}
h6,.blogpostdate {
	font-size: <?php if (!empty($h6size)) { echo stripslashes($h6size); } else { echo "16"; } ?>px;
}
.nav,.next, .previous {
    font-size: <?php if (!empty($menusize)) { echo stripslashes($menusize); } else { echo "14"; } ?>px;
}
h1, h2, h3, h4, h5, h6, .nav, .fit-text, #modal ul li:before, .toggleMenu,.countdown,.zeus-info,.da-thumbs li a div span,.numericlist dt,.st-accordion ul li > a,.zeus-text-right,.zeus-text-left, #filters li a, .zeus-text-center,#portfolio-layout .dysania-filters li a {
    <?php if (!empty($firstfont)) { echo stripslashes($firstfont); } else { echo "font-family: 'oswaldregular';"; } ?>
    font-weight:normal;
    text-transform:uppercase;
}
::-moz-selection {
	color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
	text-shadow:none;
	background:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
::selection {
	color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
	text-shadow:none;
	background:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
::-webkit-scrollbar {
	width:5px;
    background:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
::-webkit-scrollbar-thumb {
	background:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
.nav ul {
    width: <?php if (!empty($dropdownwidth)) { echo stripslashes($dropdownwidth); } else { echo "14"; } ?>em;
}    
.subtitle,.toggleMenu,.nav a,.icon .circle,.rightcontainer input, .rightcontainer textarea, .darkcontainer input, .darkcontainer textarea,footer,.footer-widget ul li a:hover,.flex-title-right,.zeus-text-right,.zeus-default,.zeus-default .zeus-content h1, .zeus-default .zeus-content h2, .zeus-default .zeus-content h3,.zeus-default .zeus-info,.tagcloud a,#cs-main,.rightcontainer .blogpostdate,.darkcontainer .blogpostdate, .logo h1,.searchbox input[type="text"].searchtext,.darkcontainer .rightsidebarcontainer .sidebarbox ul li a:hover,pre, .blogexcerpt h5, .blogdate {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
blockquote, blockquote p {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
}
body,a,.leftcontainer .st-accordion ul li > a , .lightcontainer .st-accordion ul li > a,.leftcontainer .st-accordion ul li > a:hover, .lightcontainer .st-accordion ul li > a:hover,.leftcontainer .st-accordion ul li.st-open > a, .lightcontainer .st-accordion ul li.st-open > a,.rightcontainer .st-accordion ul li > a , .darkcontainer .st-accordion ul li > a,.rightcontainer .st-accordion ul li.st-open > a, .darkcontainer .st-accordion ul li.st-open > a,.rightcontainer .st-accordion ul li > a:hover, .darkcontainer .st-accordion ul li > a:hover  {
	color: <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
blockquote,.tagcloud a  {
    border-left:3px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
    background-color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.nav .sub-menu ul {
    border-left:3px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.tagcloud a:hover {
    background-color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}    
.subtitle,.label,.nav > .activelink > a,.nav > li > a:hover, .cbp-qtprogress {
    background-color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.nav-container {
    background: <?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
    border-bottom:3px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.toggleMenu {
    background: <?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
    border-top:3px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
    border-bottom:3px solid <?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
nav,#right-bg, #left-bg-dark, .flex-direction-nav .flex-next,.zeus-default .next-block,.cs-foot {
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.nav li ul, .rightcontainer hr, .darkcontainer hr,.cs-bg,pre {
    background-color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.nav li li a:hover, .nav li li li a :hover {
    color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
#left-bg, #right-bg-light, .flex-direction-nav .flex-prev,.flex-title-left,.zeus-text-left,.zeus-default .prev-block,.leftcontainer .zeus-default,.lightcontainer .zeus-default {
    background-color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
.lightcontainer {
    color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?> !important;
    background-color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
.darkcontainer {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.leftcontainer {
    color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?> !important;
    background-color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?>;
}
.rightcontainer {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.leftcontainer hr, .lightcontainer hr, .leftcontainer pre, .lightcontainer pre {
    background-color:<?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.leftcontainer p, .lightcontainer p, .leftcontainer pre, .lightcontainer pre {
    color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer p,.darkcontainer p, .rightcontainer dd,.blogexcerpt p,#footer-widgets p,.footer-widget ul li a,.credits,.zeus-default .zeus-content  {
    color:<?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.lightcontainer .rightsidebarcontainer .sidebarbox ul li {
    border-bottom:1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.lightcontainer .rightsidebarcontainer .sidebarbox ul li a,.leftcontainer .blogpostdate,.lightcontainer .blogpostdate {
    color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.lightcontainer .rightsidebarcontainer .sidebarbox ul li a:hover {
    color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.darkcontainer .rightsidebarcontainer .sidebarbox ul li {
    border-bottom:1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.darkcontainer .rightsidebarcontainer .sidebarbox ul li a {
    color:<?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
} 
.maincontainer,.back-to-top,.zeus-default,.blogpager .button, .flex-title-right,.zeus-text-right,input[type="submit"],.errorbox .button  {
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.icon .circle,.blogpager {
    background-color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer .flex-video, .darkcontainer .flex-video{
   border:3px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.leftcontainer .flex-video, .lightcontainer .flex-video{
   border:3px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.blogcontainer {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
    border-bottom:1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.btitle {
    border-top:3px solid <?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.commentsborder,.leftcontainer .comments_content, .lightcontainer .comments_content {
    border-top:1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.leftcontainer .comments a.comment-reply-link, .lightcontainer a.comment-reply-link{
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
    background-color:<?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.rightcontainer .comments_content, .darkcontainer .comments_content{
    border-top:1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer .comments a.comment-reply-link, .darkcontainer a.comment-reply-link, .button, input[type="submit"],.rightcontainer .caption-image figcaption, .darkcontainer .caption-image figcaption,.social-icon{
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
    background-color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.leftcontainer input, .leftcontainer textarea, .lightcontainer input, .lightcontainer textarea
{
    border: 1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
    color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.rightcontainer input, .rightcontainer textarea, .darkcontainer input, .darkcontainer textarea
{
    border: 1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.errorbox input[type="text"] {
    border: 1px solid <?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
input:focus, textarea:focus, .searchbox input[type="text"].searchtext:focus {
	border-color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.button:hover,.social-icon:hover,.back-to-top:hover,.zeus-default .zeus-info,input[type="submit"]:hover, a.comment-reply-link:hover {
	background-color:<?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.leftcontainer .cbp-qtrotator .cbp-qtcontent, .lightcontainer .cbp-qtrotator .cbp-qtcontent {
	border-top: 1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.leftcontainer .cbp-qtrotator img, .lightcontainer .cbp-qtrotator img,.leftcontainer .caption-image img, .lightcontainer .caption-image img,.leftcontainer .st-accordion img, .lightcontainer .st-accordion img {
    border:3px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.rightcontainer .cbp-qtrotator .cbp-qtcontent, .darkcontainer .cbp-qtrotator .cbp-qtcontent {
	border-top: 1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer .cbp-qtrotator img, .darkcontainer .cbp-qtrotator img {
    border:3px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.leftcontainer .caption-image figcaption, .lightcontainer .caption-image figcaption{
    background-color:<?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.rightcontainer .caption-image img, .darkcontainer .caption-image img,.rightcontainer .st-accordion img, .darkcontainer .st-accordion img{
    border:3px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.leftcontainer .st-accordion, .lightcontainer .st-accordion {
    border-top:1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.leftcontainer .st-accordion ul li , .lightcontainer .st-accordion ul li {
    border-bottom: 1px solid <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
}
.leftcontainer .st-accordion ul li > a span, .lightcontainer .st-accordion ul li > a span {
    color:<?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?> !important;
}
.rightcontainer .st-accordion, .darkcontainer .st-accordion {
    border-top:1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer .st-accordion ul li , .darkcontainer .st-accordion ul li,#footer-widgets,.footer-widget ul li {
    border-bottom: 1px solid <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.rightcontainer .st-accordion ul li > a span, .darkcontainer .st-accordion ul li > a span {
    color:<?php if (!empty($fourthcolor)) { echo $fourthcolor; } else { echo '#fff'; } ?> !important;
}
footer {
    background-color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
    border-top:3px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
.rightcontainer .ionTabs__tab, .rightcontainer .ionTabs__tab:hover, .rightcontainer .ionTabs__tab.ionTabs__tab_state_active, .rightcontainer .ionTabs__body, .darkcontainer .ionTabs__tab, .darkcontainer .ionTabs__tab:hover, .darkcontainer .ionTabs__tab.ionTabs__tab_state_active, .darkcontainer .ionTabs__body {
    background: <?php if (!empty($thirdcolor)) { echo $thirdcolor; } else { echo '#262626'; } ?>;
}
.leftcontainer .ionTabs__tab, .leftcontainer .ionTabs__tab:hover, .leftcontainer .ionTabs__tab.ionTabs__tab_state_active, .leftcontainer .ionTabs__body, .lightcontainer .ionTabs__tab, .lightcontainer .ionTabs__tab:hover, .lightcontainer .ionTabs__tab.ionTabs__tab_state_active, .lightcontainer .ionTabs__body {
    background: <?php if (!empty($fifthcolor)) { echo $fifthcolor; } else { echo '#c7c7c7'; } ?>;
} 
.flex-title-left,.zeus-text-left {
    color:<?php if (!empty($secondcolor)) { echo $secondcolor; } else { echo '#1b1b1b'; } ?>;
}
.countdown div span {
  border-top: 1px solid <?php if (!empty($firstcolor)) { echo $firstcolor; } else { echo '#da2f10'; } ?>;
}
</style>