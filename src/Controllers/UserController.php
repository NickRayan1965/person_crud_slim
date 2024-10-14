<?php
namespace App\Controllers;
use App\Services\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class UserController {
    private $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    function getAll(Request $request, Response $response): Response {
        $users = $this->userService->getAll();
        $payload = json_encode($users, JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    function getById(Request $request, Response $response, array $args): Response {
        $userId = (int)$args['id'];
        $user = $this->userService->getById($userId);
        $payload = json_encode($user, JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    function create(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $user = $this->userService->create($data);
        $payload = json_encode($user, JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
        
}