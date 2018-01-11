var gulp = require('gulp'),
    connect = require('gulp-connect'),
    browserSync = require('browser-sync'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    ignore = require('gulp-ignore'),
    changed = require('gulp-changed'),
    uglifyjs = require('uglify-es'),
    composer = require('gulp-uglify/composer'),
    minify = composer(uglifyjs, console);
    source = 'css/',
    dest = 'dist/';


var scss = {
    in: source + 'scss/site.scss',
    out: dest + 'css/',
    watch: source + 'scss/**/*',
    sassOpts: {
        outputStyle: 'nested',
        precison: 3,
        errLogToConsole: true,
    }
};


gulp.task('sass', function () {
    return gulp.src(scss.in)
        .pipe(sass(scss.sassOpts))
        .pipe(gulp.dest(scss.out))
        .pipe(cleanCSS())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest(scss.out));
});

gulp.task('minifyJs', function () {
    gulp.src(source + 'js/**/*')
        .pipe(changed(dest + 'js'))
    //    .pipe(minify({}))
        .pipe(rename({ extname: '.min.js' }))
        .pipe(gulp.dest(dest + 'js'));
});
gulp.task('js-watch', function () {
    gulp.watch(source + 'js/**/*.js', ['minifyJs']);
});


gulp.task('browser-sync', function () {
    if (browserSync.active) {
        return;
    }
    var options = {
        proxy: "http://localhost:8080",
        port: 8081,
        files: [
            source + 'scss/**/*',
            source + 'js/**/*'
        ],
        ghostMode: {
            clicks: true,
            location: false,
            forms: true,
            scroll: true
        },
        injectChanges: true,
        logFileChanges: true,
        logLevel: 'debug',
        logPrefix: 'gulp-patterns',
        notify: true,
        reloadDelay: 1000
    };
    browserSync(options);
});


// default task
gulp.task('default', ['sass', 'minifyJs','js-watch'], function () {
    gulp.watch(scss.watch, ['sass']);
});
