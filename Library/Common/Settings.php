<?php

namespace Leisure\Library\Common;

class Settings {

    //Database Configuration
    const DATABASE_HOST = "DB_HOSTNAME";
    const DATABASE_NAME = "DB_NAME";
    const DATABASE_PORT = 3306;
    const DATABASE_USER = "DB_USERNAME";
    const DATABASE_PASS = "DB_PASSWORD";
    //Logging Configuration
    const LOG_FILE = "/tmp/api.log";
    const LOGGING_LEVEL = 'debug';
    /*
     * Logging Levels Allowed, ordered highest to lowest:
     * emergency, alert, critical, error, warning, notice, info, debug
     */
    const TEMPLATE_DIR = "/www/html/Template/";
    const TEMPLATE_COMPONENT_DIR = "/www/html/Template/Component/";

    const IMAGE_STORE_DIR = "/www/html/Web/img/store/";
    const IMAGE_THUMB_DIR = "/www/html/Web/img/thumbnail/";

    const IMAGE_DISPLAY_DIR = "/Web/img/store/";
    const IMAGE_THUMB_DISPLAY_DIR = "/Web/img/thumbnail/";

    const THUMBNAIL_WIDTH = "300";
    const THUMBNAIL_HEIGHT = "200";


    const AUDIT_LEVEL_INFO = 1;
    const AUDIT_LEVEL_NOTICE = 2;
    const AUDIT_LEVEL_ALERT = 3;
    const AUDIT_LEVEL_CRITICAL = 4;

    const GALLERY_COMMERCIAL_ID = 1;
    const GALLERY_RESIDENTIAL_ID = 2;
    const GALLERY_MAIN_SCREEN_ID = 3;

    const PRIMARY_CONTACT_EMAIL_ADDRESS = "admin@email.com";

}