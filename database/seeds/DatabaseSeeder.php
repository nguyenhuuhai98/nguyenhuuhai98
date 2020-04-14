<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ActivitiesTableSeeder::class,
            AnswersTableSeeder::class,
            CategoriesTableSeeder::class,
            CoursesTableSeeder::class,
            FollowingTableSeeder::class,
            LessionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            PermissionsTableSeeder::class,
            QuestionsTableSeeder::class,
            RolesTableSeeder::class,
            TestTableSeeder::class,
            TestQuestionTableSeeder::class,
            UserCourseTableSeeder::class,
            UserLessionTableSeeder::class,
            UserWordTableSeeder::class,
            WordsTableSeeder::class,
        ]);
    }
}
