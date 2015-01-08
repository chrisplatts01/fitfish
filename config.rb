require 'compass/import-once/activate'

http_path = "/"
css_dir = "_/css"
sass_dir = "_/sass"
images_dir = "_/img"
javascripts_dir = "_/js"

relative_assets = true
disable_warnings = true
sourcemap = true

preferred_syntax = :sass
environment = :development

line_comments = (environment == :production) ? false : false
output_style  = (environment == :production) ? :compressed : :expanded
