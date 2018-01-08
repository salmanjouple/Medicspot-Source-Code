<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php
        if(isset($cl_clinic_name)){
			echo fuel_var('page_title');
            //echo $cl_clinic_name;
        }else{
            if (!empty($is_blog)) :

                echo $CI->fuel->blog->page_title($page_title, ' : ', 'right');
            else:

                $slug = uri_segment(1);

                if($slug=='article'){
                    //echo '###';
                    $slug = uri_segment(2);
                    if ($slug){

                        $CI->load->database();

                        $CI->db->where('slug', $slug);
                        $data = $CI->db->get('articles')->row_array();
												
                        echo $data['title'];
                        //$tags = fuel_model('tags');
                        //	echo $article['title'];
						$meta_title = $data['meta_title'];
                        $meta_keywords = $data['meta_keywords'];
                        $meta_description = $data['meta_description'];
                        if (empty($data['title'])) :
                            redirect_404();
                        endif;

                    }

                }else{
					
                    echo fuel_var('page_title', '');
					//echo fuel_var('meta_title');
                }

            endif;
        }
        ?>
    </title>
	<meta name="title" content="<?php if(isset($meta_title)){ echo $meta_title;}else{ echo fuel_var('meta_title');}?>">
    <meta name="keywords" content="<?php if(isset($meta_keywords)){ echo $meta_keywords;}else{ echo fuel_var('meta_keywords');}?>">
    <meta name="description" content="<?php if(isset($meta_description)){ echo $meta_description; }else{ echo fuel_var('meta_description'); }?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">
    <link rel="icon" href="/assets/img/favicon/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/assets/img/favicon/apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/site.normalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/site.main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/site.booking.css');?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ" async defer></script>-->
    <script src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&libraries=places" type="text/javascript"></script>

    


    <script language="javascript">
        var globals = {};
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, function(failure){
                    console.log(failure.message);
                    // Secure Origin issue.
                });
            } else {
                //x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            jQuery('#lat').val(position.coords.latitude);
            jQuery('#lng').val(position.coords.longitude);
            globals.lat = position.coords.latitude;
            globals.lng = position.coords.longitude;

            //alert(globals.lat);
            //alert(globals.lng);
            //if ($('.booking-content').length) {
            booking_Map();
            //}
        }

        $( document ).ready(function() {

            //if ($('.booking-content').length) {
            booking_Map();

            //}

            getLocation();
        });
    </script>
    <script src="<?php echo base_url('assets/js/site.main.js');?>" defer></script>
    <script src="<?php echo base_url('assets/js/moment-with-locales.js');?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102975050-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-102975050-1');
    </script>


    <?php
    //echo css('main').css($css);

    if (!empty($is_blog)):
        echo $CI->fuel->blog->header();
    endif;
    ?>
    <?=jquery()?>




    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '355555998205448');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=355555998205448&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7XJWFH');</script>
    <!-- End Google Tag Manager -->

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7XJWFH"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<header id="page-header">
    <div class="container">
        <div class="page-header-wrapper">
            <a href="<?php echo base_url();?>" class="page-logo" title="Medicspot" style="background: url('<?php echo base_url('/assets/images/logo-ms.png');?>');    background-size: 15.2rem 4.8rem;">Medicspot</a>
            <nav class="nav-main">
                <div class="mobile-menu-header">
                    <a href="/" class="page-logo" title="Medicspot">Medicspot</a>
                    <button id="close-menu" title="Close Menu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <?php
                $CI->load->helper('url');
                $url = $CI->uri->segment_array();
                $record_num = end($url);?>
                <a href="<?php echo base_url();?>" <?php if($record_num==''){?>class="active"<?php } ?>>Home</a>
                <a href="<?php echo base_url('pricing');?>" <?php if($record_num=='pricing'){?>class="active"<?php } ?>>Pricing</a>
                <a href="<?php echo base_url('how-it-works');?>" <?php if($record_num=='how-it-works'){?>class="active"<?php } ?>>How it works</a>
                <a href="<?php echo base_url('our-clinics');?>" <?php if($record_num=='our-clinics'){?>class="active"<?php } ?>>Our clinics</a>

            </nav>
            <button id="show-menu" title="Show Menu">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
</header>