<?php

namespace Core\BoundedContext\Course\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Core\BoundedContext\Course\Application\Actions\ListCourses;
use Core\BoundedContext\Course\Domain\CourseRepositoryContract;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourseListGetController extends Controller
{
    public function __construct(private CourseRepositoryContract $repository)
    {
    }

    public function __invoke():JsonResponse
    {
        $courses = (new ListCourses($this->repository))();

        return new JsonResponse(['courses'=>$courses->toArray()],Response::HTTP_OK);
    }

}
