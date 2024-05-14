<?php

use function PHPUnit\Framework\isEmpty;

/**
 * Plugin Name: xfusion logo changer
 * Description: Plugin untuk menginjek fungsi updateIssue pada Wordfence.
 * Version: 1.0
 * Author: deskteam360
 */



function company_detect()
{
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var data = {
            url:window.location.href.split('?')[0]
        }
        document.addEventListener('DOMContentLoaded', function () {
            jQuery.ajax({
                url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                type: 'post',
                dataType: "json",
                data: {
                    action: 'get_company_info',
                    url: window.location.href.split('?')[0],
                },
                success: function (response) {
                    console.log(response);
                    var company = response;
                    const company_logo = document.getElementsByClassName("wp-image-5940");
                    company_logo[0].src = company.data.logo_url.replace("public/", "https://admin.teamsetup-2.deskteam360.com/storage/");
                    const qrcode = document.getElementsByClassName("wp-image-1124");
                    qrcode[0].src = company.data.qrcode_url.replace("public/", "https://admin.teamsetup-2.deskteam360.com/storage/");
                    qrcode[0].srcset = "";
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                }
            });
        });
    </script>
    <?php
}

add_action('wp_head', 'company_detect');

function get_company_info()
{
    global $wpdb;
    $json_data = file_get_contents('php://input');

    // Mendekode data JSON menjadi array asosiatif
    $data = json_decode($json_data, true);
    $url = $_POST['url'];
    $wpdb->insert(
        'log',
        array('log' => 'lewat gk sinadasd')
    );

    $userID = get_current_user_id(); // Mendapatkan ID pengguna yang saat ini login

    $companyID = get_usermeta($userID, 'company');

    $total_logs = $wpdb->get_results( "select count(id) as c from limit_link_with_times where url='$url'" );

    if ($total_logs[0]->c!=0){
        $query = "select * from schedule_executions where link='$url' and company_id =$companyID and user_id ='$userID'";
        $schedules = $wpdb->get_results($query);
        if ($schedules==null ||  isEmpty($schedules)){
            $url = '/revitalize/course/';
            $status ='redirect';
            $message ="You don't have access ";
            wp_send_json_success(array('url'=>$url,'status'=>$status,'message'=>$message));
            wp_die();
        }else{
            foreach ($schedules as $schedule) {
                $now = date("Y-m-d h:i:s");
                if ($now > $schedule->schedule_access and $now < $schedule->schedule_deadline){

                }else{
                    $url = '/revitalize/course/';
                    $status ='redirect';
                    $message ="You don't have access ";
                    wp_send_json_success(array('url'=>$url,'status'=>$status,'message'=>$message));
                    wp_die();
                }
            }
        }

    }

    $query = "select * from companies where id=$companyID";
    $click_logs = $wpdb->get_results($query);
    $result = [];
    foreach ($click_logs as $log) {
        $result['logo_url'] = $log->logo_url;
        $result['qrcode_url'] = $log->qrcode_url;
    }
    wp_send_json_success(array('logo_url'=>$result['logo_url'],'qrcode_url'=>$result['qrcode_url']));
    wp_die();
}

add_action('wp_ajax_get_company_info', 'get_company_info', 1, 3);
