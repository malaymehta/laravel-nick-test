<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $userModel, $websiteModel, $email;

    public function __construct()
    {
        $this->userModel = new User();
        $this->websiteModel = new Website();
        $this->email = config('mail.from.address'); // Replace this default email with your actual email address
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->userModel->newQuery()->truncate();
        $this->websiteModel->newQuery()->truncate();
        $this->userModel->factory(10)
            ->sequence(function ($sequence) {
                $count = $sequence->index + 1;
                $email_address = str_replace('@', "+$count@", $this->email);
                return ['email' => $email_address];
            })
            ->create();
        $this->websiteModel->factory(10)->create();
        $websitesId = $this->websiteModel->newQuery()->pluck('id')->toArray();
        $this->userModel->newQuery()->each(function ($query) use ($websitesId) {
            $query->websites()->sync(array_rand(array_values($websitesId)));
        });
    }
}
