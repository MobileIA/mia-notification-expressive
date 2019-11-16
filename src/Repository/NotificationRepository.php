<?php namespace Mobileia\Expressive\Notification\Repository;

use \Illuminate\Database\Capsule\Manager as DB;

/**
 * Description of CacheInterRepository
 *
 * @author matiascamiletti
 */
class NotificationRepository
{
    /**
     * 
     * @param \Mobileia\Expressive\Database\Query\Configure $configure
     * @return array
     */
    public static function fetchByConfigure(\Mobileia\Expressive\Database\Query\Configure $configure)
    {
        $query = \Mobileia\Expressive\Notification\Model\Notification::select('notification.*');
        
        if(!$configure->hasOrder()){
            $query->orderByRaw('id DESC');
        }
        $search = $configure->getSearch();
        if($search != ''){
            //$values = $search . '|' . implode('|', explode(' ', $search));
            //$query->whereRaw('(firstname REGEXP ? OR lastname REGEXP ? OR email REGEXP ?)', [$values, $values, $values]);
        }
        
        // Procesar parametros
        $configure->run($query);

        return $query->paginate($configure->getLimit(), ['*'], 'page', $configure->getPage());
    }
}
