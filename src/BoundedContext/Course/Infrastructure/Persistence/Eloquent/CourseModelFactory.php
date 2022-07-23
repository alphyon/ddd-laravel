<?php
declare(strict_types=1);
namespace Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseModelFactory extends Factory
{
    protected $model = CourseModel::class;

    public function definition(): array
    {
        return [
            'uuid'=>$this->faker->uuid,
            'name'=>"Course ".strtoupper($this->faker->randomLetter)
        ];
    }
}
