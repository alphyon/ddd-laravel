<?php
declare(strict_types=1);

namespace Core\BoundedContext\Course\Application\Actions;

use Core\BoundedContext\Course\Application\Responses\CourseResponse;
use Core\BoundedContext\Course\Domain\Course;
use Core\BoundedContext\Course\Domain\CourseExistsException;
use Core\BoundedContext\Course\Domain\CourseRepositoryContract;
use Core\BoundedContext\Course\Domain\ValueObjects\CourseId;
use Core\BoundedContext\Course\Domain\ValueObjects\CourseName;

final class CreatedCourse
{
    public function __construct(private CourseRepositoryContract $repository)
    {
    }

    public function __invoke(string $id, string $name): CourseResponse
    {
        $id = new CourseId($id);
        $course = $this->repository->find($id);
        if ($course !== null) {
            throw new CourseExistsException();
        }

        $name = new CourseName($name);

        $course = Course::create($id, $name);
        $this->repository->save($course);
        return CourseResponse::fromCourse($course);
    }


}
