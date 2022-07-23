<?php
declare(strict_types=1);
namespace Core\BoundedContext\Course\Application\Actions;

use Core\BoundedContext\Course\Application\Responses\CoursesResponse;
use Core\BoundedContext\Course\Domain\CourseRepositoryContract;

class ListCourses
{
    public function __construct(private CourseRepositoryContract $repository)
    {
    }

    public function __invoke(): CoursesResponse
    {
        return CoursesResponse::fromCourses($this->repository->list());
    }

}
