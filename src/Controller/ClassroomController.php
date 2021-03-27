<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\CreateClassroomParams;
use App\DTO\GetClassroomListParams;
use App\DTO\UpdateClassroomParams;
use App\Exception\InvalidParamsException;
use App\Interfaces\ClassroomServiceInterface;
use App\Response\OkResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ClassroomController
 * @package App\Controller
 */
class ClassroomController extends AbstractController
{
    /** @var ClassroomServiceInterface */
    private ClassroomServiceInterface $service;

    /** @var ValidatorInterface */
    private ValidatorInterface $validator;

    /**
     * ClassroomController constructor.
     *
     * @param ClassroomServiceInterface $service
     * @param ValidatorInterface        $validator
     */
    public function __construct(ClassroomServiceInterface $service, ValidatorInterface $validator)
    {
        $this->service = $service;
        $this->validator = $validator;
    }

    /**
     * @Route("/classrooms/{id}", methods={"GET","HEAD"})
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function read(int $id): JsonResponse
    {
        return new OkResponse($this->service->getById($id));
    }

    /**
     * @Route("/classrooms", methods={"GET","HEAD"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $params = new GetClassroomListParams();
        $request->query->has('page') ? $params->setPage($request->query->getInt('page')) : false;
        $request->query->has('itemsPerPage') ? $params->setLimit($request->query->getInt('itemsPerPage')) : false;
        $this->validateParams($params);

        return new OkResponse($this->service->list($params));
    }

    /**
     * @Route("/classrooms", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $params = new CreateClassroomParams();
        $request->request->has('name') ? $params->setName($request->request->get('name')) : false;
        $request->request->has('active') ? $params->setActive($request->request->getBoolean('active')) : false;
        $this->validateParams($params);
        $this->service->create($params);

        return new OkResponse();
    }

    /**
     * @Route("/classrooms/{id}", methods={"PUT"})
     *
     * @param int     $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $params = new UpdateClassroomParams();
        $request->request->has('name') ? $params->setName($request->request->get('name')) : false;
        $request->request->has('active') ? $params->setActive($request->request->getBoolean('active')) : false;
        $this->validateParams($params);
        $this->service->update($id, $params);

        return new OkResponse();
    }

    /**
     * @Route("/classrooms/{id}", methods={"DELETE"})
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->service->delete($id);

        return new OkResponse();
    }

    /**
     * @Route("/classrooms/{id}", methods={"PATCH"})
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function patch(int $id): JsonResponse
    {
        $this->service->toggleActive($id);

        return new OkResponse();
    }

    /**
     * @param object $params
     */
    private function validateParams(object $params): void
    {
        $errors = $this->validator->validate($params);
        if (count($errors) > 0) {
            throw new InvalidParamsException();
        }
    }
}
