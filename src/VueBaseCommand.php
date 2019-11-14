<?php

namespace VueBase;

use Illuminate\Console\Command;
use Artisan;

class VueBaseCommand extends Command
{
    protected $signature = 'vue-base:create {--dry}';
    protected $description = 'Creates a vue scaffolding';
    protected $myPath = './vendor/fashionphile/vue-base/src/Boilerplates';
    protected $path = '';
    protected $name = '';
    protected $className = '';
    protected $libraries = [
        'routes' => false,
        'store' => false
    ];
    protected $files = [
        'app.js' =>  '/MinimumBuild/app.js',
        'Base.vue' => '/MinimumBuild/Base.vue',
        'store.js' => false,
        'routes.js' => false,
    ];

    public function handle()
    {
        $this->path = config('vue-base.path');
        $withPost = false;
        $this->name = $this->ask('What is the name of the new component?');
        $this->className = str_replace(' ', '', ucwords($this->name));

        foreach ($this->libraries as $library => $value) {
            $this->libraries[$library] = $this->confirm("Will you be using {$library}?");
        }

        $this->getBuilds();
        $this->createNewFolder();
        $this->addFilesToFolder();
    }

    private function getBuilds()
    {
        if ($this->libraries['routes']) {
            $this->files['app.js'] = '/RouteBuild/app.js';
            $this->files['routes.js'] = '/RouteBuild/routes.js';
        }

        if ($this->libraries['store']) {
            $this->files['app.js'] = '/StoreBuild/app.js';
            $this->files['store.js'] = '/StoreBuild/store.js';
        }

        if ($this->libraries['routes'] && $this->libraries['store']) {
            $this->files['app.js'] = '/FullBuild/app.js';
        }
    }

    private function createNewFolder()
    {
        if ($this->option('dry')) {
            return;
        }

        $this->path .= '/' . $this->className;
        mkdir($this->path);
    }

    private function addFilesToFolder()
    {
        foreach($this->files as $file => $boilerplate) {
            if (!$boilerplate) {
                continue;
            }
            $contents = str_replace("vue-base-app", \Str::slug($this->name), file_get_contents($this->myPath . $boilerplate));
            $file = fopen($this->path . '/' . $file, "w");
            fwrite($file, $contents);
            fclose($file);
        }
    }
}
