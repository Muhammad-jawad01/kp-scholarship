<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            ['name' => 'Higher Education', 'status' => true, 'gives_scholarship' => true],
            ['name' => 'Elementary & Secondary Education', 'status' => true, 'gives_scholarship' => true],
            ['name' => 'Health', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Agriculture', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Sports & Youth Affairs', 'status' => true, 'gives_scholarship' => true],
            ['name' => 'Science & Technology', 'status' => true, 'gives_scholarship' => true],
            ['name' => 'Social Welfare', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Tourism', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Culture', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Industries', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Information Technology', 'status' => true, 'gives_scholarship' => true],
            ['name' => 'Finance', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Law', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Transport', 'status' => true, 'gives_scholarship' => false],
            ['name' => 'Environment', 'status' => true, 'gives_scholarship' => false],
        ];
        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
