<?php

namespace sahifedp\Profile\Console\Commands;

use Illuminate\Console\Command;
use sahifedp\MenuManager\MenuManager;

class RegisterMenus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profile:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register admin menus to SahifeDP Menu Manager';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $menu = config('profile.menu');
        foreach ($menu['groups'] as $group) {
            $group_model = MenuManager::newGroup($group["name"], $group["title"], $group["permissions"], $group["arrangement"], $group["icon"]);
            if (!isset($group_model->id)) {
                $this->error('Creating group not successful');
                return 0;
            }
            $this->line('Group created with ID: ' . $group_model->id);
            foreach ($group['items'] as $item) {
                if (MenuManager::newItem($group_model->id, $group["name"], $group["title"], $group["route"], $group["permissions"], $group["arrangement"], $group["icon"])) {
                    $this->info('Item "'.$item['name'].'" created successfully');
                } else {
                    $this->error('Creating item "'.$item['name'].'" not successful');
                }
            }
        }
    }
}
