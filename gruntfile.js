module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        compass: {
            dist: {
                options: {
                    sassDir: 'library/css/sass/',
                    cssDir: 'library/css/',
                    outputStyle: 'expanded'
                },
            },
        },
        concat: {   
            dist: {
              files: {
                'library/js/app.js': ['library/js/**/*.js'],
              },
            },
        },
        uglify: {
            options: {
              mangle: false
            },
            dist: {
                files: {
                    'library/js/app.min.js': ['library/js/app.js'],
                },
            },
        },
        cssmin: {
          combine: {
            files: {
              'library/css/style.min.css': ['library/css/style.css']
            }
          }
        },
        watch: {
            scripts: {
                files: ['library/js/**/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['library/css/sass/**/*.sass', 'library/css/sass/**/*.scss'],
                tasks: ['compass', 'cssmin'],
                options: {
                    spawn: false,
                },
            },
        },
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'compass', 'cssmin']);
};