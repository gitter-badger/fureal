

module.exports = function(grunt) {

    var bannerTemplate = function(options){

        options = options || {};

        var name = options.name || "MDE";
        var version = " v"+options.version || "";
        var css = options.css || false;

        var banner = "";

        if(css){
            banner += '@charset "UTF-8";\n';
        }

        banner += '/*!\n' +
            ' * '+name+version+' - <%=grunt.template.today("yyyy-mm-dd HH:MM")%>\n' +
            ' * http://www.fureal.de/\n' +
            ' * Copyright (c) <%=grunt.template.today("yyyy")%> Fureal\n'+
            ' */\n';

        return banner;
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /*
         * Image Optimization
         * Documentation: https://github.com/gruntjs/grunt-contrib-imagemin
         */
        imagemin: {
            build: {
                options: {
                    optimizationLevel: 3
                },
                files: [
                ]
            }
        },

        /*
         * Sass Task
         * Documentation: https://github.com/gruntjs/grunt-contrib-sass
         */
        sass: {
            /*
             * Task to create bundle for deployment on test or production server
             */
            admin: {
                options: {
                    style: "expanded"
                },
                files: {
                    'public/themes/admin/assets/css/admin.css': 'public/themes/admin/assets/_sass/admin.scss'
                }

            },

            /*
             * Frozen Theme CSS for production
             */
            frozenDist: {
                options: {
                    banner: bannerTemplate({name:"Fureal - Frozen Theme CSS", version:"<%=pkg.version%>"}),
                    style: "compressed"
                },
                files: {
                    'public/themes/frozen/assets/css/main.css': 'public/themes/frozen/assets/_sass/main.scss',
                    'public/themes/frozen/assets/css/ie.css': 'public/themes/frozen/assets/_sass/ie.scss'
                }
            },

            /*
             * Frozen Theme CSS for development
             */
            frozenDev: {
                options: {
                    banner: bannerTemplate({name:"Fureal - Frozen Theme CSS", version:"<%=pkg.version%>"}),
                    style: "expanded",
                    debugInfo: true
                },
                files: {
                    'public/themes/frozen/assets/css/main.css': 'public/themes/frozen/assets/_sass/main.scss',
                    'public/themes/frozen/assets/css/ie.css': 'public/themes/frozen/assets/_sass/ie.scss'
                }
            }
        },

        /*
         * Combines the precompiled templates with the runtime and custom helpers
         * Documentation: https://github.com/gruntjs/grunt-contrib-concat
         */
        concat: {
            // templates-task
            frozenTemplates: {
                options: {
                    banner: bannerTemplate({name: "Frozen JS Templates", version:"<%=pkg.version%>"})
                },
                src: [
                    'node_modules/handlebars/dist/handlebars.runtime.min.js',
                    'public/themes/default/assets/js/handlebars.helper.js',
                    'public/themes/frozen/assets/js/templates.precompiled.js'
                ],
                dest: 'public/themes/frozen/assets/js/hb.js'
            },

            // Already minimized libraries
            frozenLibs: {
                options: {
                    banner: bannerTemplate({name: "Frozen JS Lib", version:"<%=pkg.version%>"})
                },
                src: [
                    // JQuery
                    'public/js/libs/jquery/jquery.min.js',
                    'public/js/libs/jquery/jquery-ui-1.10.3.custom.min.js',
                    "public/js/libs/jquery/jquery.placeholder.min.js",
                    "public/js/libs/jquery/jquery.sort.min.js",
                    "public/js/libs/jquery/jquery.transit.min.js",

                    // Bootstrap
                    "application/js/libs/bootstrap/bootstrap-3.0.3.min.js",

                    // Modernizr
                    'application/js/libs/modernizr/modernizr-min.js',

                    // Debug Library
                    'application/js/libs/debug/javascript-debug.js',
                    'application/js/libs/debug/debug.dev.js',
                    'application/js/libs/swfobject/swfobject.js',

                    // Flux Slider
                    'application/js/flux.min.js',

                    // Some prototype overwrites
                    'application/js/prototypes.js'

                    // Used by TS Viewer
                    //'application/js/wz_tooltip.js'
                ],
                dest: 'public/themes/frozen/assets/js/libs.js'
            }
        },

        handlebars: {
            dist: {
                options: {
                    wrapped: true,
                    namespace: 'Handlebars.templates',
                    /*
                     * Remove the filePath and the extension from the function name
                     */
                    processName: function(filePath){
                        var pieces = filePath.split('/');
                        return pieces[pieces.length - 1].split('.')[0];
                    }
                },
                files: {
                    "application/js/templates.js": "application/js/templates/*"
                }
            }
        },

        /*
         * Watches for changes in files and executes the tasks
         */
        watch: {
            frozenCss: {
                files: [
                    'public/themes/frozen/assets/_sass/**/*.scss'
                ],
                tasks: ['sass:frozenDev']
            }
        }
    });

    // Each of these should be installed via npm
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-handlebars');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Jade Template Compilation
    grunt.loadNpmTasks('grunt-contrib-jade');

    // Used during development
    grunt.registerTask('default', [
        "jshint",
        'sass:admin',
        'sass:dev',
        'handlebars:dist',
        'concat:libs',
        'concat:templates'
    ]);

    grunt.registerTask('css', [
        'sass:reliveDist'
    ]);

    grunt.registerTask('frozen', [
        'sass:frozenDev'
    ]);

    grunt.registerTask('scripts', [
        'handlebars:dist',
        'concat:libs',
        'concat:templates'
    ]);

    grunt.event.on('watch', function(action, filepath) {
        grunt.log.writeln(filepath + ' has ' + action);
    });
};