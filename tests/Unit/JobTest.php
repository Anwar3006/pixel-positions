<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    // 1. Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        "employer_id" => $employer->id
    ]);

    // 2. Act  &  3. Assert
    expect($job->employer->is($employer))->toBeTrue();
});

it('has a tags relationship', function () {
    //Arrange
    $job = Job::factory()->create();

    //Act
    $job->tag("Frontend");

    //Assert
    expect($job->tags)->toHaveCount(1);
});
