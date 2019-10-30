//CakiTemplate custom

/*

$ npm run gulp = scssやjavascriptファイルの更新を検知して、自動で更新
$ npm run gulp dest = 納品用に整形してdestフォルダーへ書き出し
$ npm run gulp css = scssをcssへ書き出し
$ npm run gulp js = es2015をjsへ書き出し
$ npm run gulp scss-img = 画像のサイズを取得してmixinへ書き出し
$ npm run gulp img-min = 書き出した画像ファイルを圧縮

*/

//--------------------- プラグイン読み込み ---------------------//

var gulp = require('gulp');
var path = require('path');
var del = require('del');

//base
var browserSync = require('browser-sync');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var watch = require('gulp-watch');

//css/scss
var sass = require('gulp-sass');
var sassImage = require('gulp-sass-image');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require("gulp-sourcemaps");
var cssmin = require('gulp-cssmin');
// var aigis = require("gulp-aigis");

//html php
var htmlbeautify = require('gulp-html-beautify');

//images
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var mozjpeg = require('imagemin-mozjpeg');

//js/es2015/modernizr
var webpacks = require('webpack-stream');
var webpack = require('webpack');
var webpackConfig = require("./webpack.config");
var modernizr = require('gulp-modernizr');
var uglify = require('gulp-uglify-es').default;

//--------------------- セッティング ---------------------//

var hostName = "http://cakitemplatewp.local/"; //browserSyncするローカルIPを記載

var basePath = ".";
var devPath = basePath + "/public";
var destPath = basePath + "/dest"

//各種パス関連
var paths = {
  "dir": devPath,
  "dir_dest": destPath,
  "img": devPath + "/lib/img",
  // "css": devPath + "/lib/css",
  "css": devPath + "",
  "js": devPath + "/lib/js",
  "scss": devPath + "/lib/_scss",
  "es2015": devPath + "/lib/_es2015",
  "no_sample": '!' + devPath + '/_sample/**',
  "no_layout": '!' + devPath + '/_layout/**',
  "no_modernizr": '!**/modernizr.js',
  "no": ("!**/_*", "!**/_**","")
}

// browser-sync
gulp.task('browser-sync', function () {
  browserSync.init({
    proxy: hostName,
    port: 4000 //空いているprotを選択
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

//エラー表記
var plumberErrorHandler = {
  errorHandler: notify.onError({
    message: "Error: <%= error.message %>"
  })
};

//---------------html

//納品用に整形して書き出し
gulp.task('html-dest', function () {
  gulp.src([
    paths.dir + '/**/*.{html,php}',
    // paths.no_styleguide,
    paths.no_sample,
    paths.no_layout
  ])
  .pipe(htmlbeautify({
    indent_char: ' ',
    indent_size: 2
  }))
  .pipe(gulp.dest(paths.dir_dest))
});

//---------------scss・css

//画像サイズを取得しscssに書き出し
gulp.task('scss-img', function () {
  return gulp.src(paths.img + '/**/*.{png,jpg,gif,svg}')
  .pipe(sassImage({
    targetFile: '__scss-img.scss',
    images_path: paths.img,
    css_path: paths.css,
    includeData: false,
    createPlaceholder: false
  }))
  .pipe(gulp.dest(paths.scss + '/mixin/_output'));
});

//styleguide書き出し
// gulp.task("doc", function() {
//   del(paths.styleguide).then(function(){
//     return gulp.src("./styleguide-config/aigis_config.yml")
//     .pipe(aigis());
//   });
// });

//scssをcssへ変換
gulp.task('css', function () {
  return gulp.src(paths.scss + '/**/*.scss')
  .pipe(plumber(plumberErrorHandler))
  .pipe(sourcemaps.init())
  .pipe(sass.sync().on('error', sass.logError))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest(paths.css));
});

//cssを圧縮して納品用に書き出し
gulp.task('css-dest', function () {
  return gulp.src([
    paths.dir + '/**/*.css',
    '!' + paths.scss + '/**',
    // paths.no_styleguide
  ])
  .pipe(cssmin())
  .pipe(gulp.dest(paths.dir_dest));
});

//---------------image

//納品用画像を書き出し
gulp.task('img-dest', function () {
  return gulp.src([
    paths.dir + '/**/*.{png,jpg,gif,svg,pdf,ico}',
    // paths.no_styleguide
  ])
  .pipe(gulp.dest(paths.dir_dest));
});

//書き出した画像の圧縮
gulp.task('img-min', function () {
  return gulp.src(paths.dir_dest + '/**/*.{png,jpg}')
  .pipe(imagemin(
    [
      pngquant({
        quality: '100',
        speed: 1,
        floyd:0
      }),
      mozjpeg({
        quality:85,
        progressive: true
      })
    ]
  ))
  .pipe(gulp.dest(paths.dir_dest));
});

//---------------js

//webpack設定
gulp.task('webpack', function () {
  return plumber(plumberErrorHandler)
  .pipe (webpacks( { webpackConfig,
    entry: {
      scripts: paths.es2015 + '/scripts.js'
    },
    output: {
      filename: '[name].js',
    },
    devtool: 'inline-source-map',
    module: {
      rules: [
        {
          test: /\.(css|scss)$/,
          use: [
            'style-loader',
            'css-loader',
            "sass-loader",
          ]
        },
        {
          test: /\.(jpg|gif|png)$/,
          use:[
            {loader: 'url-loader?limit=25000'}
          ]
        }
      ]
    },
    resolve: {
      alias: {
        Vue: __dirname + '/node_modules/vue/dist/vue.min.js'
      }
    },
    plugins: [
      new webpack.optimize.AggressiveMergingPlugin(),　//ファイルを細かく分析し、まとめられるところはできるだけまとめてコードを圧縮する
      new webpack.ProvidePlugin({　//jqueryはグローバルに出す設定。これでrequireせず使えるのでjqueryプラグインもそのまま動く。
        jQuery: "jquery",
        $: "jquery",
        jquery: "jquery",
        //IScroll: "fullpage.js/vendors/scrolloverflow.min"
      })
    ],
    performance: { hints: false }
  }))
  .pipe(gulp.dest(paths.js));
});

//modernizr
gulp.task('modernizr', ['webpack'], function () {
  gulp.src([
    paths.js + '/**/*.js',
    paths.css + '/**/*.css',
    paths.no_modernizr
  ])
  .pipe(modernizr({
    options: [
      'setClasses',
      'addTest',
      'html5printshiv',
      'testProp',
      'fnBind',
    ]
  }))
  .pipe(gulp.dest(paths.js));
});

//js処理簡略用
gulp.task('js', ['modernizr']);

//jsファイルを圧縮して納品用に書き出し
gulp.task('js-dest', function () {
  return gulp.src([
    paths.dir + '/**/*.js',
    '!' + paths.es2015 + "/**"
  ])
  .pipe(uglify())
  .pipe(gulp.dest(paths.dir_dest))
});

//---------------その他

//納品用書き出し
gulp.task('etc-dest', function () {
  return gulp.src([
    paths.dir + '/**/*.{eot,svg,ttf,woff,woff2,otf,txt,json,pem}',
    paths.dir + '/**/.htaccess',
    paths.no_sample,
    paths.no_layout
  ])
  .pipe(gulp.dest(paths.dir_dest))
});

//------------納品ファイル書き出し

gulp.task('dest', ['img-dest', 'js-dest', 'css-dest', 'html-dest', 'etc-dest']);

//gulp watchタスク
gulp.task('default', ['browser-sync', 'watch']);
gulp.task('watch', function () {

  watch([
    paths.dir + '/**/*.{html,php}',
    // paths.no_styleguide
  ]).on("change", browserSync.reload);

  watch(paths.scss + '/**/*.scss',function(event){
    gulp.start(['css']);
  });

  watch([
    paths.css + '/**/*.css'
  ]).on("change", browserSync.reload);

  watch([
    paths.img + '/**/*.{png,jpg,gif,svg}',
    // paths.no_styleguide
  ],function(event){
    gulp.start(['scss-img']);
  });

  watch(paths.es2015 + '/**/*.{js,scss}',function(event){
    gulp.start(['js']);
  });
  watch([
    paths.js + '/**/modernizr.js',
  ]).on("change", browserSync.reload);

});
