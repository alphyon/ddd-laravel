<?php
declare(strict_types=1);
namespace Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    use HasFactory;

    protected $table='course';
    protected $keyType = 'string';

    public function __construct(array $attributes = [])
    {
        $this->setConnection(env('DB_CONNECTION','mysql'));
        parent::__construct($attributes);
    }

    protected static function newFactory(): Factory
    {
        return CourseModelFactory::new();
    }

}
