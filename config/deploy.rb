# config valid only for Capistrano 3.1
lock '3.2.1'

set :application, 'dota2best'
set :repo_url, 'git@github.com:oroshnivskyy/DotaBest.git'
set :deploy_to, '/var/www/dota2best/data/www/dota2best.com/deploy'
set :scm, :git

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do

end
