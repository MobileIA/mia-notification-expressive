<?php

namespace Mobileia\Expressive\Notification\Handler;

/**
 * Description of MoreHandler
 *
 * @author matiascamiletti
 */
class MoreHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    /**
     * Servicio para obtener las ultimas notificaciones
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener usuario
        $user = $this->getUser($request);
        // Obtener parametro si se esta buscando notificaciones 
        $lastId = $this->getParam($request, 'id', -1);
        // Obtener ultimas
        $rows = \Mobileia\Expressive\Notification\Model\Notification::
                where('user_id', $user->id)
                ->where('id', '<', $lastId)
                ->orderBy('id', 'desc')
                ->take(20)
                ->get();
        // Devolvemos respuesta
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($rows->toArray());
    }
}