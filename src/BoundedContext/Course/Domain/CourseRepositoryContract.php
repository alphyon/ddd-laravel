<?php

namespace Core\BoundedContext\Course\Domain;

use Core\BoundedContext\Course\Domain\ValueObjects\CourseId;

interface CourseRepositoryContract
{
    public function list(): Courses;
    public function save(Course $course): void;
    public function find(CourseId $id): ?Course;
    public function delete(CourseId $id): void;
}
