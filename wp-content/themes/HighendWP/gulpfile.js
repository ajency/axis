var gulp          = require('gulp');
var plumber       = require('gulp-plumber');
var notify        = require('gulp-notify');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');
var cleancss      = require('gulp-clean-css');
var cssbeautify   = require('gulp-cssbeautify');
var jshint        = require('gulp-jshint');
var optimizejs    = require('gulp-optimize-js')
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var imagemin      = require('gulp-imagemin');
var wpot          = require('gulp-wp-pot');
var potomo        = require('gulp-potomo');
var zip           = require('gulp-zip');

var plumberErrorHandler = {
  errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

// Compile Sass, Autoprefix, Clean and Minify
gulp.task( 'main_sass', function () {
  gulp.src( 'css/style.css' )
    .pipe( autoprefixer({
      browsers: [
        '> 1%',
        'last 2 versions',
        'IE 9',
        'IE 10',
        'IE 11',
      ],
      cascade: false
    }))
   .pipe( cleancss({
     compatibility: 'ie9',
      level: 2, // staviti na 1 ako ima problem sa CSS-om
    }))
    //.pipe(cssbeautify())
    .pipe( gulp.dest( './' ) )
    .pipe( notify( "Main CSS Files Changed!" ) );

  gulp.src( 'css/dev/*.css' )
    .pipe( autoprefixer({
      browsers: [
        '> 1%',
        'last 2 versions',
        'IE 9',
        'IE 10',
        'IE 11',
      ],
      cascade: false
    }))
   .pipe( cleancss({
     compatibility: 'ie9',
      level: 2, // staviti na 1 ako ima problem sa CSS-om
    }))
    //.pipe(cssbeautify())
    .pipe( gulp.dest( 'css' ) ).pipe( notify( "Bla CSS Files Changed!" ) );;
});


// Compile Sass, Autoprefix, Clean and Minify
gulp.task( 'admin_sass', function () {
  gulp.src( 'hbframework/assets/css/dev/*.scss' )
    .pipe( plumber( plumberErrorHandler ) )
    .pipe( sass() )
    .pipe( autoprefixer({
      browsers: [
        '> 1%',
        'last 2 versions',
        'IE 9',
        'IE 10',
        'IE 11',
      ],
      cascade: false
    }))
   /*.pipe( cleancss({
     compatibility: 'ie9',
      level: 2, // staviti na 1 ako ima problem sa CSS-om
    }))*/
    .pipe(cssbeautify())
    .pipe( gulp.dest( 'hbframework/assets/css' ) )
    .pipe( notify( "Admin CSS Files Changed!" ) );
});

// Lint, Optimize, Concatenate and Minify
gulp.task('admin_js', function () {
  gulp.src(['hbframework/assets/js/dev/*.js'])
    .pipe(plumber(plumberErrorHandler))
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(jshint.reporter('fail'))
    .pipe(optimizejs())
    //.pipe(uglify())
    .pipe(gulp.dest('hbframework/assets/js'))
    .pipe(notify("Admin JS Files Changed!"))
});

// Optimize Images
gulp.task('img', function () {
  gulp.src('config/screenshots/raw/**/*')
    .pipe(imagemin())
    .pipe(gulp.dest('config/screenshots'))
});

// Generate POT Files
gulp.task('pot', function () {
  gulp.src('**/*.php')
    .pipe(wpot( {
            domain: 'hbthemes',
            package: 'Highend'
        } ))
    .pipe(gulp.dest('languages/en_US.po'))
    .pipe(potomo())
    .pipe(gulp.dest('./languages/'))
    .pipe(notify("Translation Files Changed!"))
});

// Prepare Deployment
gulp.task('prepare', function () {
  gulp.src(['./**', '!./css/style.css', '!./css/dynamic-styles.css', '!./css/dev', '!./css/dev/**', '!./config/demos/**/*', '!./config/screenshots/raw/' ,'!./config/screenshots/raw/**', '!./node_modules/' ,'!./node_modules/**', '!**/.DS_Store', '!./assets/images/raw/', '!./assets/images/raw/**', '!./hbframework/assets/css/dev/', '!./hbframework/assets/css/dev/**', '!./hbframework/assets/js/dev/', '!./hbframework/assets/js/dev/**' ] )
    .pipe(zip('HighendWP.zip'))
    .pipe(gulp.dest('../deploy'))
    .pipe(notify("Archive File Created!"))
});

// Deploy Theme
gulp.task('deploy', ['pot', 'prepare']);

// Default
gulp.task('default', ['main_sass', 'admin_sass', 'admin_js', 'img', 'watch']);

// Watch for Changes
gulp.task('watch', function () {
  gulp.watch('hbframework/assets/js/dev/*.js', ['admin_js']);
  gulp.watch('hbframework/assets/css/dev/*.scss', ['admin_sass']);
});