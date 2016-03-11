'use strict';
/* ======= Setup Project ======= */

const syncUrl = 'projects.beetroot.se/provideit/apl'; // Livereload URL

const sftpUser = 'apl_roma'; // SFTP Login
const sftpPass = 'CyCJ-KG!hA4TaB-T'; // SFTP Password

const sftpFolder = '/wp-content/themes/bootstrap'; // SFTP upload folder

/* Set browser support prefixes
See more at: https://github.com/ai/browserslist#queries  */

const autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR', 'ie 9']
};

/* ======= Enable Plugins ======= */

var gulp = require('gulp'); // Core Gulp

var sass = require('gulp-sass'); // SCSS compiler
var autoprefixer = require('gulp-autoprefixer'); // CSS Autoprefix from Can I Use
var sourcemaps = require('gulp-sourcemaps'); // Write sourcemaps

var imagemin = require('gulp-imagemin'); // Compress images
var pngquant = require('imagemin-pngquant'); // $ npm i -D imagemin-pngquant

var sftp = require('gulp-sftp'); // SFTP

var watch = require('gulp-watch'); // Watcher
var browserSync = require("browser-sync"); // Browser Sync

/* ===== Plugins Variables ===== */

var localFilesGlob = ['js/*.js', '**/*.php', 'css/*.css', 'css/*.map', 'images/*']; // Files glob for sftp-upload task

var reload = browserSync.reload; // Manual BrowserSync reload

/* ======= Tasks ======= */

// SCSS Compile
gulp.task('sass', function() {
  watch('**/*.scss', function() {
    return gulp.src('scss/style.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        style: 'compact'
      }).on('error', sass.logError))
      .pipe(autoprefixer(autoprefixerOptions))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./css'));
  })
});

// Image Min
gulp.task('imgmin', function() {
  watch('src/images/*', function() {
    return gulp.src('src/images/*')
      .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{
          removeViewBox: false
        }],
        use: [pngquant()]
      }))
      .pipe(gulp.dest('images'))
  })
});

// Browser Sync Server
gulp.task('browser-sync', function() {
  browserSync({
    notify: false,
    ui: false,
    proxy: syncUrl
  });
});

// Deploy changed files and reload browser
gulp.task('sftp-upload', function() {
  gulp.watch(localFilesGlob)
    .on('change', function(event) {
      console.log('Changes detected! Uploading file "' + event.path + '", ' + event.type);

      return gulp.src([event.path], {
          base: '.',
          buffer: false
        })
        .pipe(sftp({
          host: 'projects.beetroot.se',
          remotePath: sftpFolder,
          port: 2222,
          callback: reload,
          user: sftpUser,
          pass: sftpPass
        }))
    });
});

// Watch tasks
gulp.task('default', ['sass', 'imgmin', 'sftp-upload', 'browser-sync'], function() {
  process.stdout.write('\n ----------------------------------\n Ready. Waiting for changes... \n ----------------------------------\n');
});
