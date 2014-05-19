# config valid only for Capistrano 3.1
lock '3.2.1'

set :application, 'dota2best'
set :repo_url, 'git@github.com:oroshnivskyy/DotaBest.git'
set :deploy_to, '/var/www/dota2best/data/www/dota2best.com/deploy'
set :scm, :git

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, %w{app/config/database.php}

# Default value for linked_dirs is []
set :linked_dirs, %w{vendor}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do
  task :update_composer do
      on roles(:web) do
          execute "cd #{release_path};php composer.phar update"
      end
  end
  after "deploy", "deploy:update_composer"
end
