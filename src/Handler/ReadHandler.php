<?php

namespace Mobileia\Expressive\Notification\Handler;

/**
 * Description of ReadHandler
 *
 * @author matiascamiletti
 */
class ReadHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    /**
     * Servicio para guardar que se abrio una notificacion
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener usuario
        $user = $this->getUser($request);
        // Obtener parametro si se esta buscando notificaciones 
        $notId = $this->getParam($request, 'id', -1);
        // Obtener notificación
        $not = \Mobileia\Expressive\Notification\Model\Notification::find($notId);
        // Verificar si existe
        if($not === null){
            return new \Mobileia\Expressive\Diactoros\MiaJsonResponse(false);
        }
        // Verificar si la notificación es del usuario
        if($not->user_id != $user->id){
            return new \Mobileia\Expressive\Diactoros\MiaJsonResponse(false);
        }
        // Guardar que se vio.
        $not->is_read = 1;
        $not->save();
        // Devolvemos respuesta
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse(true);
    }
}