<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Spatie\Permission\Models\Permission;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $records = [
            [
                'title' => 'user',
                'permissions' => [
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete'
                ],
            ],
            [
                'title' => 'role',
                'permissions' => [
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                ],
            ],
            [
                'title' => 'setting',
                'permissions' => [
                    'setting-list',
                    'setting-create',
                    'setting-edit',
                    'setting-delete',
                ],
            ],
            [
                'title' => 'slide',
                'permissions' => [
                    'slide-list',
                    'slide-create',
                    'slide-edit',
                    'slide-delete',
                ],
            ],
            [
                'title' => 'notification',
                'permissions' => [
                    'notification-list',
                    'notification-create',
                    'notification-edit',
                    'notification-delete',
                ],
            ],
            [
                'title' => 'download',
                'permissions' => [
                    'download-list',
                    'download-create',
                    'download-edit',
                    'download-delete',
                ],
            ],
            [
                'title' => 'team',
                'permissions' => [
                    'team-list',
                    'team-create',
                    'team-edit',
                    'team-delete',
                ],
            ],
            [
                'title' => 'project',
                'permissions' => [
                    'project-list',
                    'project-create',
                    'project-edit',
                    'project-delete',
                ],
            ],
            [
                'title' => 'alert',
                'permissions' => [
                    'alert-list',
                    'alert-create',
                    'alert-edit',
                    'alert-delete',
                ],
            ],
            [
                'title' => 'hospital',
                'permissions' => [
                    'hospital-list',
                    'hospital-create',
                    'hospital-edit',
                    'hospital-delete',
                ],
            ],
            [
                'title' => 'news',
                'permissions' => [
                    'news-list',
                    'news-create',
                    'news-edit',
                    'news-delete',
                ],
            ],
            [
                'title' => 'gallary',
                'permissions' => [
                    'gallary-list',
                    'gallary-create',
                    'gallary-edit',
                    'gallary-delete',
                ],
            ],
            [
                'title' => 'link',
                'permissions' => [
                    'link-list',
                    'link-create',
                    'link-edit',
                    'link-delete',
                ],
            ],
            [
                'title' => 'page',
                'permissions' => [
                    'page-list',
                    'page-create',
                    'page-edit',
                    'page-delete',
                ],
            ],
            [
                'title' => 'category',
                'permissions' => [
                    'category-list',
                    'category-create',
                    'category-edit',
                    'category-delete',
                ],
            ],
            [
                'title' => 'achievement',
                'permissions' => [
                    'achievement-list',
                    'achievement-create',
                    'achievement-edit',
                    'achievement-delete',
                ],
            ],
            [
                'title' => 'Contact-Us-Form',
                'permissions' => [
                    'contact-list',
                    'contact-create',
                    'contact-edit',
                    'contact-delete',
                ],
            ],
            [
                'title' => 'district',
                'permissions' => [
                    'district-list',
                    'district-create',
                    'district-edit',
                    'district-delete',
                ],
            ],
            [
                'title' => 'facility',
                'permissions' => [
                    'facility-list',
                    'facility-create',
                    'facility-edit',
                    'facility-delete',
                ],
            ],
            [
                'title' => 'event',
                'permissions' => [
                    'event-list',
                    'event-create',
                    'event-edit',
                    'event-delete',
                ],
            ],
            [
                'title' => 'competition-categories',
                'system_id' => '2',
                'permissions' => [
                    'competition-categories-list',
                    'competition-categories-create',
                    'competition-categories-edit',
                    'competition-categories-delete',
                ],
            ],

            [
                'title' => 'Scholarship',
                'permissions' => [
                    'scholarship-list',
                    'scholarship-create',
                    'scholarship-edit',
                    'scholarship-delete',
                ],
            ],
            [
                'title' => 'ScholarshipApplied',
                'permissions' => [
                    'Scholarship-applied-list',
                    'Scholarship-applied-create',
                    'Scholarship-applied-edit',
                    'Scholarship-applied-delete',
                ],
                'title' => 'Statistics',
                'permissions' => [
                    'Scholarship-applied-statistics',

                ],
            ],
            [
                'title' => 'report',
                'permissions' => [
                    'report-list',
                    'report-create',
                    'report-edit',
                    'report-delete',
                ],
            ],





        ];

        foreach ($records as $record) {
            $data = $record;
            unset($data['permissions']);
            $menu = Menu::firstOrCreate($data);

            foreach ($record['permissions'] as $permission) {
                Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web', 'menu_id' => $menu->id]);
            }
        }
    }
}
