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
            url: window.location.href.split('?')[0]
        }
        document.addEventListener('DOMContentLoaded', function () {
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                dataType: "json",
                data: {
                    action: 'get_company_info',
                    url: window.location.href.split('?')[0],
                },
                success: function (response) {
                    console.log(response);
                    if (response.data.status=="redirect"){
                        window.setTimeout(alert(response.data.message), 1000);
                        window.location.replace(response.data.url)
                    }
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

    $url = $_POST['url'];
    $userID = get_current_user_id();
    $companyID = get_usermeta($userID, 'company');

    $query = "select * from companies where id=$companyID";
    $click_logs = $wpdb->get_results($query);
    $result = [];
    foreach ($click_logs as $log) {
        $result['logo_url'] = $log->logo_url;
        $result['qrcode_url'] = $log->qrcode_url;
    }

    $query = "select * from limit_link_with_times where url='$url'";
    $limitLinks = $wpdb->get_results($query);

    foreach ($limitLinks as $limit) {
        $query = "select * from schedule_executions where link='$url' and company_id =$companyID and user_id ='$userID'";
        $schedules = $wpdb->get_results($query);
        foreach ($schedules as $schedule) {
            $now = date("Y-m-d h:i:s");
            if ($now >= $schedule->schedule_access) {
                if ($now <= $schedule->schedule_deadline) {
                    wp_send_json_success(['logo_url' => $result['logo_url'], 'qrcode_url' => $result['qrcode_url']]);
                    wp_die();
                } else {
                    $url = $limit->redirect_url;
                    $status = 'redirect';
                    $message = "Has passed the limit ". $schedule->schedule_deadline;
                    wp_send_json_success(['url' => $url, 'status' => $status, 'message' => $message,'logo_url' => $result['logo_url'], 'qrcode_url' => $result['qrcode_url']]);
                    wp_die();
                }
            } else {
                $url = $limit->redirect_url;
                $status = 'redirect';
                $message = "Can access on ". $schedule->schedule_access;
                wp_send_json_success(['url' => $url, 'status' => $status, 'message' => $message, 'logo_url' => $result['logo_url'], 'qrcode_url' => $result['qrcode_url']]);
                wp_die();
            }
        }
        $url = $limit->redirect_url;
        $status = 'redirect';
        $message = "You don't have access";
        wp_send_json_success(['url' => $url, 'status' => $status, 'message' => $message]);
        wp_die();
    }
    wp_send_json_success(['logo_url' => $result['logo_url'], 'qrcode_url' => $result['qrcode_url']]);
    wp_die();
}

add_action('wp_ajax_get_company_info', 'get_company_info', 1, 3);
