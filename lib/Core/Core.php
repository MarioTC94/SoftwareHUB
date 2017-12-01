<?php
namespace lib\Core {

    $CONF = \parse_ini_file('config/config.ini');
    define('DIR_SEP', DIRECTORY_SEPARATOR);
    define('HTML_DIR', $CONF['VIEW_URL']);
    define('APP_URL', protocol() . '/' . ($CONF["CUSTOM_BASE_URL"] == '/' ? '' : $CONF["CUSTOM_BASE_URL"]));
    define('ROUTE_IMG', $CONF['IMG_ROUTE']);
    define('ROUTE_DOC', $CONF['DOC_ROUTE']);
    define('ROUTE_CSS', $CONF['CSS_ROUTE']);
    define('ROUTE_JS', $CONF['JS_ROUTE']);

    function protocol()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'];
    }
}
