<?php

namespace sahifedp\Profile;

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
        $group = MenuManager::newGroup("Test.Name","Title","Perm1|Perm2",5,"circle");
        if(!isset($group->id)){
            $this->error('Creating group not successful');
            return 0;
        }
        $this->line('Group created with ID: '.$group->id);
        if(MenuManager::newItem($group->id,"Test.Name","Title","admin.dashboard","Perm1|Perm2",2,'mail')){
            $this->info('All items created successfully');
        }else{
            $this->error('Creating one or more items not successful');
        }
    }
}
