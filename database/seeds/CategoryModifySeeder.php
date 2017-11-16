<?php

use Illuminate\Database\Seeder;

class CategoryModifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->orderBy('id')->chunk(10000, function($posts) {
            foreach ($posts as $post) {

                $maincategory = DB::table('categories')->where('type', $post->type)->first();

                DB::table('posts')
                    ->where('id', $post->id)
                    ->update(['categories' => '["'.$maincategory->id.','.$post->category_id.',"]']);

                DB::table('posts')
                    ->where('id', $post->id)
                    ->update(['shared' => '']);

            }
        });


        DB::table('categories')->where('type', 'news')->update([
            'icon' => '<i class=material-icons>library_books</i>'
        ]);
        DB::table('categories')->where('type', 'list')->update([
            'icon' => '<i class=material-icons>&#xE1DB;</i>'
        ]);
        DB::table('categories')->where('type', 'quiz')->update([
            'icon' => '<i class=material-icons>&#xE834;</i>'
        ]);
        DB::table('categories')->where('type', 'poll')->update([
            'icon' => '<i class=material-icons>&#xE837;</i>'
        ]);
        DB::table('categories')->where('type', 'video')->update([
            'icon' => '<i class=material-icons>&#xE038;</i>'
        ]);


        writeConfig('CurrentTheme', 'modern');
        writeConfig('sitedefaultlanguage', 'en');
        writeConfig('Siteactive', 'yes');
        writeConfig('MAIL_DRIVER', env('MAIL_DRIVER'));
        writeConfig('MAIL_HOST', env('MAIL_HOST'));
        writeConfig('MAIL_PORT', env('MAIL_PORT'));
        writeConfig('MAIL_USERNAME', env('MAIL_USERNAME'));
        writeConfig('MAIL_PASSWORD', env('MAIL_PASSWORD'));
        writeConfig('MAIL_ENCRYPTION', env('MAIL_ENCRYPTION'));


        DB::table('settings')->orderBy('id')->chunk(10000, function($settings) {
            foreach ($settings as $setting) {

                writeConfig($setting->key, str_replace('"', '', $setting->value));

            }
        });

        writeConfig('T_1_googlefont', 'Lato:400,500,600,700&subset=latin,latin-ext');
        writeConfig('T_1_sitefontfamily', 'Lato, Helvetica, Arial, sans-serif');
        writeConfig('T_1_SiteHeadlineStyle', '1');




        $this->rrmdir(base_path("resources/views/_forms"));

        $this->rrmdir(base_path("resources/views/_particles"));

        $this->rrmdir(base_path("resources/views/_widgets"));

        $this->rrmdir(base_path("resources/views/emails"));

        $this->rrmdir(base_path("resources/views/pages"));

        $this->rrmdir(base_path("resources/views/posts"));

        unlink(base_path("resources/views/app.blade.php"));
        unlink(base_path("resources/views/_contact/contactpage.blade.php"));


    }

    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir"){
                        rrmdir($dir."/".$object);
                    }else{
                        unlink($dir."/".$object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }

    }
}