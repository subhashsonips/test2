<?php

namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('repository', 'git@bitbucket.org:sapna_laccheta/job_tinder.git');

add('shared_files', [
    'logs',
    'var'
]);
add('shared_dirs', []);

add('writable_dirs', []);

// Servers

server('staging', 'dev.promarkup.co')
        ->user('pixelspeaks')
        ->password('Random@123')
        ->set('deploy_path', '/home/pixelspeaks/public_html/dev/test2');


// Tasks

task('deploy:staging', function() {
    $deployPath = get('deploy_path');
    cd($deployPath);
    writeln($deployPath);
    run('pwd');
    $status = run("git status");
    writeln($status);
    $result = run("git pull --rebase");
    writeln($result);
    //run("chown -R www-data:www-data app/storage");
    //set('writable_dirs', ['app/storage']);
})->desc('Deploy application to staging.');

task('deploy:started', function() {
    writeln('<info>Deploying...</info>');
});

task('deploy:done', function() {
    writeln('<info>Deployment is done.</info>');
});

before('deploy:staging', 'deploy:started');
after('deploy:staging', 'deploy:done');