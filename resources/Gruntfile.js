module.exports = function(grunt) {

    'use strict';

    var config = {
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourceMap: false,
                //outputStyle: 'compact'
                outputStyle: 'compressed'
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: 'scss',
                    src: ['*.scss'],
                    dest: '../public/css',
                    ext: '.css'
                }]
            }
        },
        watch: {
            css: {
                files: 'scss/*.scss',
                tasks: ['sass'],
                options: {
                    spawn: true,
                    reload: true,
                }
            },
        },
        //browserSync: {
        //    dev: {
        //        bsFiles: {
        //            src: ['../css/*.css', '../*.html', '../js/*.js']
        //        },
        //        options: {
        //            watchTask: true,
        //            proxy: 'lab.gositus.com/cimbdemo',
        //            debugInfo: true,
        //            ui: false
//}               
        //    }
        //}       
    };

    //grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks('grunt-cssbeautifier');
    grunt.loadNpmTasks('grunt-sass');
    //grunt.loadNpmTasks('grunt-newer');

    // Register tasks
    grunt.initConfig(config);

    grunt.registerTask('default', ['sass','watch']);

};
