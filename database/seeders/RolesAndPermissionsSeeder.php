<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        $roles = ['admin', 'moderator', 'user', 'vendor', 'Front office', 'Back office'];
        $dashboardPermissions = ['Business Statistics','Front Office','Back Office'];
        $archivePermissions = ['Archives'];
        // $payeePermissions = ['Payee View', 'Payee Add'];
        $billPermissions = ['Add Bill','View Bills', 'Update Bill Status','Recurring Bills','Recycle'];
        // $recurringPermissions = ['Recurring Bills', 'Recurring Edit', 'Recurring Remove'];
        // $dropboxPermissions = ['Dropbox'];
        $financePermissions = ['Adjustments','Create Cheque','Bank Reconciliation','Monthly Statement','Transactions'];
        $userPermissions = ['Add User','View Users','Deposit'];
        // $categoryPermissions = ['Manage Categories'];
        $notificationsPermissions = ['Notification View'];
        // $recyclebinPermissions = ['Recycle Bin View'];
        // $recyclebinPermissions = ['Recycle Bin View'];
        // $rolePermissions = ['Role View', 'Role Create', 'Role Edit', 'Role Delete'];
        $vendorPermissions = ['Add Account', 'View Account'];
        $contactsPermissions = ['Add Contact', 'View Contact', 'Edit Contact', 'Delete Contact'];
        $leadsPermissions = [ 'Add Lead','View Lead', 'Edit Lead', 'Delete Lead'];
        $referralsPermissions = [ 'Add Referral','View Referral', 'Edit Referral', 'Delete Referral'];
        $reportsPermissions = [ 'Add Report','View Report', 'Edit Report', 'Delete Report'];
        $settingPermissions = ['Profile Setting','Roles&Permissions','Manage Categories','Manage Types','Payee List','Follow ups','Drop Box','Logs'];
        // $medicaidPermissions = ['Medicaid View'];
        // $documentsPermissions = ['Document View'];
        $permissions = [];
        array_push($permissions, $dashboardPermissions, $archivePermissions, $billPermissions, $financePermissions, $userPermissions,
            $vendorPermissions, $contactsPermissions, $leadsPermissions, $referralsPermissions, $reportsPermissions,
            $settingPermissions,$notificationsPermissions
        );
        $categories = ['Dashboard', 'Archive', 'Bill', 'Finance','User',
            'Account', 'Contact', 'Lead', 'Referral', 'Report', 'Settings','Notifications'
        ];
        foreach ($permissions as $key => $permission) {
            foreach ($permission as $singlePermission) {
                Permission::create(['name' => $singlePermission, 'category' => $categories[$key]]);
            }

        }

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }
        foreach ($permissions as $key => $permission) {
            $permits[] = Permission::whereIn('name', $permissions[$key])->get();
        }

        $role1 = Role::where('name', 'admin')->first();
        $role2 = Role::where('name', 'user')->first();
        $role3 = Role::where('name', 'moderator')->first();
        $role4 = Role::where('name', 'vendor')->first();
        $role5 = Role::where('name', 'Front office')->first();
        $role6 = Role::where('name', 'Back office')->first();
        $role1->givePermissionTo($permits);
        $role2->givePermissionTo(['View Bills', 'Add Bill', 'Profile Setting', 'Notification View', 'Back Office']);
        $role3->givePermissionTo(['View Users', 'Back Office', 'View Bills', 'Recurring Bills', 'Profile Setting']);
        $role4->givePermissionTo(['Back Office', 'Profile Setting']);
        $role5->givePermissionTo(['Front Office', 'Add Account','View Account','Add Contact','View Contact','Edit Contact','Delete Contact','Add Lead','View Lead','Edit Lead','Delete Lead',
        'Add Referral','View Referral','Edit Referral','Delete Referral','Add Report','View Report','Edit Report','Delete Report','Profile Setting','Manage Types']);
        $role6->givePermissionTo(['Back Office','Archives','Profile Setting','Add Bill','View Bills', 'Update Bill Status','Recurring Bills','Recycle'
        ,'Adjustments','Create Cheque','Bank Reconciliation','Monthly Statement','Transactions','Add User','View Users','Deposit','Manage Categories','Payee List','Drop Box','Logs']);

        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole(strtolower($user->role));
        }

    }
}
