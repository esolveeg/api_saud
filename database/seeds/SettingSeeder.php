<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'logo',
                'value_ar' => 'settings/logo.png',
                'type' => 'image',
                'value' => 'settings/logo.png'
            ],
            [
                'key' => 'address',
                'value' => 'طريق الملك فهد، العليا، الرياض 11564، المملكة العربية السعودية',
                'value_ar' => 'طريق الملك فهد، العليا، الرياض 11564، المملكة العربية السعودية',
                'type' => 'text',
            ],
            [
                'key' => 'phone',
                'value_ar' => '+966 55 656 0101',
                'type' => 'text',
                'value' => ' +966 55 656 0101 '
            ],
            [
                'key' => 'email',
                'value_ar' => 'info@saud.com',
                'type' => 'email',
                'value' => ' info@saud.com'
            ],
            [
                'key' => 'about',
                'value' => 'أجمل للعطور، 69 عاماً من صناعة الذكريات.العطرهو كل ما تحتاجه للسفر عبر الزمان ، هذه هي الصلة بين الذاكرة والرائحة',
                'value_ar' =>"أجمل للعطور، 69 عاماً من صناعة الذكريات.العطرهو كل ما تحتاجه للسفر عبر الزمان ، هذه هي الصلة بين الذاكرة والرائحة",
                'type' => 'textarea',
            ],
            [
                'key' => 'facebook',
                'value_ar' => 'https://www.facebook.com/',
                'type' => 'text',
                'value' => 'https://www.facebook.com/'
            ],
            [
                'key' => 'instagram',
                'value_ar' => 'https://www.instagram.com/',
                'type' => 'text',
                'value' => 'https://www.instagram.com/
                '
            ],

        ];
        Setting::insert($settings);
    }
}
