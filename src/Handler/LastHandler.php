<?php

namespace Mobileia\Expressive\Notification\Handler;
/**
 * Description of ListHandler
 *
 * @author matiascamiletti
 */
class LastHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
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
        // Obtener ultimas
        $rows = \Mobileia\Expressive\Notification\Model\Notification::
                where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->take(20)
                ->get();
        // Devolvemos respuesta
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($rows->toArray());
    }
}