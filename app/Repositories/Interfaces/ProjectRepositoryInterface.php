<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface{

    public function store($request);

    public function update($request, $project);
}
