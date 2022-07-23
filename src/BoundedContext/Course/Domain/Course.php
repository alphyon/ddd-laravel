<?php
declare(strict_types=1);

namespace Core\BoundedContext\Course\Domain;

use Core\BoundedContext\Course\Domain\ValueObjects\{CourseId, CourseName};

class Course
{
    /**
     * @param CourseId $id
     * @param CourseName $name
     */
    public function __construct(private CourseId $id, private CourseName $name)
    {
    }

    /**
     * @param string $id
     * @param string $name
     * @return static
     */
    public static function fromPrimitives(string $id, string $name): self
    {
        return new self(new CourseId($id), new CourseName($name));
    }

    /**
     * @param CourseId $id
     * @param CourseName $name
     * @return static
     */
    public static function create(CourseId $id, CourseName $name): self
    {
        return new self($id, $name);
    }

    /**
     * @return CourseId
     */
    public function id(): CourseId
    {
        return $this->id;
    }

    /**
     * @return CourseName
     */
    public function name(): CourseName
    {
        return $this->name;
    }


}
