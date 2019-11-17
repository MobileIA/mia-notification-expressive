# mia-notification-expressive
The library for Zend Expressive

# Activar rutas
/** NOTIFICACIONES **/
$app->route('/notification/last', [\Mobileia\Expressive\Auth\Handler\AuthHandler::class, \Mobileia\Expressive\Notification\Handler\LastHandler::class], ['GET', 'POST'], 'notification.last');
$app->route('/notification/news', [\Mobileia\Expressive\Auth\Handler\AuthHandler::class, \Mobileia\Expressive\Notification\Handler\NewsHandler::class], ['GET', 'POST'], 'notification.news');
$app->route('/notification/more', [\Mobileia\Expressive\Auth\Handler\AuthHandler::class, \Mobileia\Expressive\Notification\Handler\MoreHandler::class], ['GET', 'POST'], 'notification.more');
$app->route('/notification/read', [\Mobileia\Expressive\Auth\Handler\AuthHandler::class, \Mobileia\Expressive\Notification\Handler\ReadHandler::class], ['GET', 'POST'], 'notification.read');