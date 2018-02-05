// Gulp.js configuration


// Gulp and plugins
const
    gulp = require('gulp'),
    noop = require('gulp-noop'),
    newer = require('gulp-newer'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    concat = require('gulp-concat')
;

// Browser-sync
var browsersync = false;



// Directory Settings
const dir = {
    src: 'src/',
    build: 'dist/'
};

// PHP settings
const php = {
    src: dir.src + '/**/*.php',
    build: dir.build
};

// Javascript Settings
const js = {
    src: dir.src + '/js/*.js',
    build: dir.build + 'js/'
};

// CSS settings
var css = {
    src: dir.src + 'scss/style.scss',
    watch: dir.src + 'scss/**/*.scss',
    build: dir.build,
    sassOpts: {
        outputStyle: 'nested',
        precision: 3,
        errLogToConsole: true
    },
    processors: [
        require('autoprefixer')({
            browsers: ['last 2 versions', '> 2%']
        })
    ]
};

// Browsersync settings
const syncOpts = {
    proxy: 'piercestarre.local',
    files: dir.build + '**/*',
    open: true,
    notify: false,
    ghostMode: false,
    ui: {
        port: 8001
    }
};



// copy PHP files
gulp.task('php', () => {
    return gulp.src(php.src)
    .pipe(newer(php.build))
    .pipe(gulp.dest(php.build));
});

// copy JavaScript files
gulp.task('js', () => {
    return gulp.src(js.src)
    .pipe(newer(js.build))
    .pipe(gulp.dest(js.build));
});

// CSS processing
gulp.task('css', () => {
    return gulp.src(css.src)
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(gulp.dest(css.build))
    .pipe(browsersync
        ? browsersync.reload({ stream: true }) 
        : noop()
    );
});


// browser-sync
gulp.task('browsersync', () => {
    if (browsersync === false) {
    browsersync = require('browser-sync').create();
    browsersync.init(syncOpts);
    }
});



// watch for file changes
gulp.task('watch', ['browsersync'], () => {

    // page changes
    gulp.watch(php.src, ['php'], browsersync ? browsersync.reload : {});

    // CSS changes
    gulp.watch(css.watch, ['css']);

    // JavaScript main changes
    gulp.watch(js.src, ['js']);

});


// Default Task
gulp.task('default', ['php', 'js', 'css']);