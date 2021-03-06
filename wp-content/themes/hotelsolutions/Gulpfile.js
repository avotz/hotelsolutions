var gulp        = require('gulp'),
    uglify      = require('gulp-uglify'),
    stripDebug  = require('gulp-strip-debug'),
    minifyCSS   = require('gulp-clean-css'),
    stylus      = require('gulp-stylus'),
    nib         = require('nib'),
    concat      = require('gulp-concat'),
    browserSync = require('browser-sync');
    var reload      = browserSync.reload;

  // Dynamic server
 gulp.task('browser-sync', function() {
       browserSync({
         /* server: {
            baseDir: "./"
          }*/
          proxy: "hotelsolutions.dev"
      });
      
  });




gulp.task('js', function () {
  gulp.src([
      './assets/js/vendor/jquery-1.11.1.min.js',
      './assets/js/vendor/typewriter.js',
      './assets/js/vendor/owl.carousel.js',
      './assets/js/vendor/bootstrap.min.js',
      './assets/js/vendor/jquery.hoverIntent.minified.js',
      /*'./assets/js/vendor/jquery.contentcarousel.js',*/
      './assets/js/vendor/jwow.min.js',
      /*'./assets/js/vendor/imagesloaded.min.js',*/
      /*'./assets/js/vendor/jquery.isotope.min.js',*/
      /*'./assets/js/vendor/isotope.pkgd.min.js',*/
      
      /*'./assets/js/vendor/jquery.magnific-popup.min.js',*/
      /*'./assets/js/vendor/jquery.cycle2.min.js',*/
      /*'./assets/js/vendor/chosen.jquery.min.js',
      './assets/js/vendor/wow.min.js',*/
      /*'./assets/js/vendor/jquery.uniform.js',*/
      './assets/js/vendor/flatpickr.js',
      './assets/js/vendor/jquery.onepagenav.js',
     /*'./assets/js/vendor/grid.js',*/

      './assets/js/main.js'

    ])
    //.pipe(browserify())
    .pipe(uglify({ compress: true }))
    //.pipe(stripDebug())
    .pipe(concat('bundle.js'))
    .pipe(gulp.dest('./js'))
    .pipe(reload({stream:true}));

});

// Get and render all .styl files recursively
gulp.task('stylus', function () {
  gulp.src('./assets/stylus/main.styl')
    .pipe(stylus({use: [nib()]}))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('css', function () {
  gulp.src(['./assets/css/main.css','./assets/css/owl.carousel.css','./assets/css/animate.css','./fonts/font-awesome-4.1.0/css/font-awesome.min.css','./assets/css/flatpickr.min.css'/*,'./fonts/eleganticons/et-icons.css'*/])
    /*.pipe(minifyCSS({ keepSpecialComments: '*', keepBreaks: '*'}))*/
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./'))
    .pipe(reload({stream:true}));
});




gulp.task('watch', function () {
    gulp.watch(['./assets/js/**/*.js'],['js']);
    gulp.watch(['./assets/stylus/**/*.styl'],['stylus']);
    gulp.watch(['./assets/css/**/*.css'],['css']);
    gulp.watch("./**/*.html").on('change', reload);
    gulp.watch("./**/*.php").on('change', reload);

});

gulp.task('default', [ 'js','stylus','css','browser-sync', 'watch' ]);
