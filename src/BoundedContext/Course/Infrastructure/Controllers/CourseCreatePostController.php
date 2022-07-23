<?php
declare(strict_types=1);

namespace Core\BoundedContext\Course\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Core\BoundedContext\Course\Application\Actions\CreatedCourse;
use Core\BoundedContext\Course\Domain\CourseExistsException;
use Core\BoundedContext\Course\Domain\CourseRepositoryContract;
use Core\Shared\Domain\UuidGeneratorContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class CourseCreatePostController extends Controller
{
    public function __construct(private UuidGeneratorContract $uuidGenerator, private CourseRepositoryContract $repository)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws CourseExistsException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $id = $request->get('id', $this->uuidGenerator->generate());
        $courseResponse = (new CreatedCourse($this->repository))($id, $request->get('name'));

        return new JsonResponse(['course' => $courseResponse->toArray()], Response::HTTP_OK);

    }

}
