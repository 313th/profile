<?php

namespace sahifedp\Profile\Console\Commands;

use Illuminate\Console\Command;
use sahifedp\MenuManager\MenuManager;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Register extends Command
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
        $permissions = config('profile.permissions');
        $superAdmin = Role::where(['name'=>'Super Admin'])->first();
        foreach ($permissions as $name=>$value){
            $permission = Permission::firstOrNew([
                "name" => $name,
            ]);
            $permission->title = $value['title'];
            $permission->save();
            $superAdmin->givePermissionTo($permission);
        }
        $menu = config('profile.menu');
        foreach ($menu['groups'] as $group) {
            $group_model = MenuManager::newGroup($group["name"], $group["title"], $group["permissions"], $group["arrangement"], $group["icon"]);
            if (!isset($group_model->id)) {
                $this->error('Creating group not successful');
                return 0;
            }
            $this->line('Group created with ID: ' . $group_model->id);
            foreach ($group['items'] as $item) {
                if (MenuManager::newItem($group_model->id, $item["name"], $item["title"], $item["route"], $item["permissions"], $item["arrangement"], $item["icon"])) {
                    $this->info('Item "'.$item['name'].'" created successfully');
                } else {
                    $this->error('Creating item "'.$item['name'].'" not successful');
                }
            }
        }
    }
}
