<?php

use Core\BoundedContext\Course\Infrastructure\Controllers\CourseCreatePostController;
use Core\BoundedContext\Course\Infrastructure\Controllers\CourseListGetController;

Route::post("courses", CourseCreatePostController::class);
Route::get("courses", CourseListGetController::class);
