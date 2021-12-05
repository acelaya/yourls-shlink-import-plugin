<?php
/*
Plugin Name: Shlink import plugin
Plugin URI: https://github.com/acelaya/yourls-shlink-import-plugin
Description: This plugin adds extra actions to the API which are needed to import links from YOURLS to a Shlink instance
Version: 1.0
Author: ACelaya
Author URI: https://alejandrocelaya.com
*/

yourls_add_filter('api_action_shlink-list', 'list_all_links');
yourls_add_filter('api_action_shlink-link-visits', 'get_link_visits');

function list_all_links() {
    $table = YOURLS_DB_TABLE_URL;

    return [
        'statusCode' => 200,
        'message' => 'success',
        'result' => yourls_get_db()->fetchAll("SELECT keyword, url, title, timestamp, ip, clicks FROM `$table`"),
    ];
}

function get_link_visits() {
    $shortCode = isset( $_REQUEST['shortCode'] ) ? $_REQUEST['shortCode'] : null;
    if (empty($shortCode)) {
        return [
            'errorCode' => 404,
            'message' => 'Error: short code not provided',
        ];
    }

    $table = YOURLS_DB_TABLE_LOG;

    return [
        'statusCode' => 200,
        'message' => 'success',
        'result' => yourls_get_db()->fetchAll(
            "SELECT click_time, referrer, user_agent, ip_address, country_code FROM `$table` WHERE shorturl=:shortUrl",
            ['shortUrl' => $shortCode]
        ),
    ];
}
