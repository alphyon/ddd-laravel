<?php
declare(strict_types=1);

namespace Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent;

use Core\Shared\Infrastructure\Persistence\Eloquent\EloquentException;
use Core\BoundedContext\Course\Domain\{Course, CourseRepositoryContract, Courses, ValueObjects\CourseId};
use DB;
use Exception;
use Throwable;

class CourseRepository implements CourseRepositoryContract
{
    /**
     * @param CourseModel $model
     */
    public function __construct(private CourseModel $model)
    {
    }


    /**
     * @return Courses
     */
    public function list(): Courses
    {
        $eloquentCourses = $this->model->all();
        $courses = $eloquentCourses->map(fn(CourseModel $courseModel) => $this->toDomain($courseModel))->toArray();
        return new Courses($courses);
    }

    /**
     * @param CourseModel $eloquentCourseModel
     * @return Course
     */
    private static function toDomain(CourseModel $eloquentCourseModel): Course
    {
        return Course::fromPrimitives($eloquentCourseModel->id, $eloquentCourseModel->name);
    }

    /**
     * @param Course $course
     * @return void
     * @throws EloquentException
     * @throws Throwable
     */
    public function save(Course $course): void
    {
        $courseModel = $this->model->find($course->id()->value());
        if ($courseModel === null) {
            $courseModel = new CourseModel();
            $courseModel->id = $course->id()->value();
        }

        $courseModel->name = $course->name()->value();

        DB::beginTransaction();
        try {
            $courseModel->save();
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            throw new EloquentException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }


    }

    /**
     * @param CourseId $id
     * @return Course|null
     */
    public function find(CourseId $id): ?Course
    {
        $courseModel = $this->model->find($id->value());
        if ($courseModel === null) {
            return null;
        }

        return $this->toDomain($courseModel);
    }

    /**
     * @param CourseId $id
     * @return void
     * @throws Exception
     */
    public function delete(CourseId $id): void
    {
        $courseModel = $this->model->find($id->value());
        if($courseModel === null){
            throw new Exception("Model not foud");
        }
        $courseModel->delete();

    }
}
