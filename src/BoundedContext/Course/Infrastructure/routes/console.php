<?php

use Core\BoundedContext\Course\Application\Actions\ListCourses;
use Core\BoundedContext\Course\Domain\CourseRepositoryContract;

Artisan::command("dd:list-courses", function(CourseRepositoryContract $repositoryContract) {
    $data = (new ListCourses($repositoryContract))();
    $headers = ['ID','Course'];
    $this->table($headers,$data->toArray());
});
