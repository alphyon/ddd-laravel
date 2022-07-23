<?php

namespace Core\BoundedContext\Course\Application\Responses;

use Core\BoundedContext\Course\Domain\Courses;

final class CoursesResponse
{
    public function __construct(private array $courses)
    {
    }

    public static function fromCourses(Courses $courses): self
    {
        $coursesResponse = array_map(fn($course) => CourseResponse::fromCourse($course), $courses->all());

        return new self($coursesResponse);

    }

    public function toArray(): array
    {
        return array_map(fn(CourseResponse $courseResponse)=>$courseResponse->toArray(),$this->courses);
    }

}
