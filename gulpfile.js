/**
 * BRC gulp tasks
 *
 * $ npm run dev = ファイルの更新を検知して、自動で更新(vagrantなし)
 * $ npm run gulp = ファイルの更新を検知して、自動で更新(vagrantあり)
 * $ npm run gulp dest = 納品用に整形してdestフォルダーへ出力
 * $ npm run gulp scssImg = 画像のサイズを取得してmixinへ出力
 */

/**
 * gulp package import
 */
// BASE
const gulp = require('gulp')
const path = require('path')
const minimist = require('minimist')
// ERROR
const plumber = require('gulp-plumber')
const notify = require('gulp-notify')
// HTML/PHP none
// IMG
const sassImage = require('gulp-sass-image')
// CSS
const gulpSass = require('gulp-sass')
const gulpAutoprefixer = require('gulp-autoprefixer')
const sourcemaps = require('gulp-sourcemaps')
const cssmin = require('gulp-cssmin')
// JS
const webpackStream = require('webpack-stream')
const webpack = require('webpack')
const gulpModernizr = require('gulp-modernizr')
const uglify = require('gulp-uglify')
const VueLoaderPlugin = require('vue-loader/lib/plugin')
// SYNC/WATCH
const browserSync = require('browser-sync')
const gulpConnect = require('gulp-connect-php')
// ENV
const dotenv = require('dotenv').config()
console.log('dotenv: ', dotenv)

/**
 * env settings
 * sync用ポート番号など各種パラメーターを設定
 * dotenvを利用して変更可能
 */
class EnvSettings {
	constructor () {
		// proxyのport設定
		this.port = process.env.PORT || 8080
		// proxyのhost設定
		this.host = process.env.HOST || 'localhost'
		// windowsまたはphpのバージョンを指定したい場合はpathを指定
		this.phpPath = process.env.PHP_PATH || 'php'
		// vagrant用のhostName(Vagrantfileの設定と合わせてください)
		this.hostName = process.env.HOST_NAME || '192.168.33.64'
		// modeを指定
		this.mode = process.env.MODE || 'development'
		// gulp task名
		this.taskName = ''
	}

	// gulpの実行タスク名を取得
	taskNameChange () {
		const argv = minimist(process.argv.slice(2))
		this.taskName = argv._[0]
	}

	// dest時は、modeをproductionへ変更
	modeChange () {
		if (!process.env.MODE) {
			if (this.taskName === 'dest') this.mode = 'production'
		}
	}
}
const envSettings = new EnvSettings()
envSettings.taskNameChange()
envSettings.modeChange()
console.log('envSettings: ', envSettings)

/**
 * paths settings
 * 開発に必要な各種パスを指定
 * dotenvを利用して変更可能
 */
class PathSettings {
	constructor () {
		this.dir = process.env.PATH_DIR || 'public/'
		this.img = process.env.PATH_IMG || `${this.dir}lib/img`
		this.css = process.env.PATH_CSS || `${this.dir}`
		this.scss = process.env.PATH_SCSS || `${this.dir}lib/_scss`
		this.js = process.env.PATH_JS || `${this.dir}lib/js`
		this.es2015 = process.env.PATH_ES2015 || `${this.dir}lib/_es2015`
		this.no = ('!**/_*', '!**/_**')
	}
}
const pathSettings = new PathSettings()
console.log('pathSettings: ', pathSettings)

/**
 * destPaths settings
 * 書き出しに必要な各種パスを指定
 * dotenvを利用して変更可能
 */
class DestSettings {
	constructor () {
		this.dir = process.env.DEST_DIR || 'dest/'
		this.img = process.env.DEST_IMG || `${this.dir}lib/img`
		this.css = process.env.DEST_CSS || `${this.dir}`
		this.js = process.env.DEST_JS || `${this.dir}lib/js`
	}
}
const destSettings = new DestSettings()
console.log('destSettings: ', destSettings)

/**
 * ERROR
 * エラーによるパイプの破損を防止
 */
const plumberErrorHandler = {
	errorHandler: notify.onError({
		message: 'Error: <%= error.message %>'
	})
}

/**
 * IMAGE
 * 画像サイズを取得しscssにmixinを出力
 */
function scssImg () {
	return gulp.src([
		pathSettings.img + '/**/*.{png,jpg,gif,svg}',
		'!' + pathSettings.img + '/thum/**/*.{png,jpg,gif,svg}',
		'!' + pathSettings.img + '/**/*@2x.{png,jpg,gif,svg}',
		pathSettings.no])
		.pipe(sassImage({
			targetFile: '__scss-img.scss',
			images_path: pathSettings.img,
			css_path: pathSettings.css,
			includeData: false,
			createPlaceholder: false
		}))
		.pipe(gulp.dest(pathSettings.scss + '/mixin/_output/'))
}

// export tasks
exports.scssImg = scssImg

/**
 * CSS
 * SCSSをCSSへ変換
 */

function css () {
	return gulp.src([pathSettings.scss + '/**/*.scss', pathSettings.no])
		.pipe(plumber(plumberErrorHandler))
		.pipe(sourcemaps.init())
		.pipe(gulpSass.sync().on('error', gulpSass.logError))
		.pipe(gulpAutoprefixer({
			cascade: false,
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(pathSettings.css))
}

// export tasks
exports.css = gulp.series(
	css,
	modernizrTask
)

/**
 * JS
 * webpackでES2016〜をES2015へ変換
 * modernizrを自動出力
 */

// webpack setting
function webpackTask () {
	// JS出力先
	let webpackDestDir = pathSettings.js
	if (envSettings.taskName === 'dest') { webpackDestDir = destSettings.js }
	// return
	return plumber(plumberErrorHandler)
		.pipe(webpackStream({
			mode: envSettings.mode,
			entry: {
				scripts: './' + pathSettings.es2015 + '/scripts.js'
			},
			output: {
				filename: '[name].js',
			},
			module: {
				rules: [
					{
						test: /\.(css|scss)$/,
						use: [
							'vue-style-loader',
							'css-loader',
							{
								// for .vue:autoprefixer
								loader: 'postcss-loader',
								options: {
									plugins: [
										require('autoprefixer')({
											grid: 'autoplace'
										})
									]
								}
							},
							'sass-loader',
							{
								// for .vue:グローバルscssファイル読み込み
								loader: 'sass-resources-loader',
								options: {
									resources: [
										path.resolve(__dirname, 'public/lib/_es2015/mixin/__mixins.scss'),
									]
								}
							}
						]
					},
					{
						test: /\.vue$/,
						loader: 'vue-loader'
					},
					{
						test: /\.js$/,
						exclude: /node_modules/,
						use: ['babel-loader'],
					},
					{
						/**
						 * expose-loaderを利用して、jqueryをグローバル化
						 * See https://github.com/webpack-contrib/expose-loader#using-configuration
						 */
						test: require.resolve('jquery'),
						loader: 'expose-loader',
						options: {
							exposes: ['$', 'jQuery'],
						},
					},
				]
			},
			resolve: {
				alias: {
					/**
					 * Vueファイルを完全ビルドしたい場合は、バンドラでエイリアスを設定する必要があり
					 * See https://jp.vuejs.org/v2/guide/installation.html#ランタイム-コンパイラとランタイム限定の違い
					 */
					vue$: 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' webpack 1 用
				}
			},
			plugins: [
				// make sure to include the plugin!
				new VueLoaderPlugin()
			],
		}, webpack))
		.pipe(gulp.dest(webpackDestDir))
}

// modernizr
function modernizrTask () {
	return gulp.src([pathSettings.js + '/**/*.js', pathSettings.css + '/**/*.css', '!**/modernizr.js'])
		.pipe(gulpModernizr({
			options: [
				'setClasses',
				'addTest',
				'html5printshiv',
				'testProp',
				'fnBind',
			]
		}))
		.pipe(gulp.dest(pathSettings.js))
}

// export tasks
exports.webpack = webpackTask
exports.modernizr = modernizrTask
exports.js = gulp.series(
	webpackTask,
	modernizrTask
)

/**
 * SYNC
 * phpサーバーを立ち上げブラウザを同期
 */
function sync (done) {
	gulpConnect.server({
		port: envSettings.port,
		base: pathSettings.dir,
		stdio: 'ignore',
		bin: envSettings.phpPath
	}, () => {
		browserSync.init({
			proxy: `${envSettings.host}:${envSettings.port}`
		})
	})
	done()
}
function disconnect (done) {
	console.log('port disConnected')
	gulpConnect.closeServer()
	done()
}
// browser-sync （vagrant あり）
function syncWithVagrant (done) {
	browserSync.init({
		proxy: envSettings.hostName,
		port: envSettings.port
	})
	done()
}
// browser-syncブラウザリロード
function reload (done) {
	browserSync.reload()
	done()
}

/**
 * WATCH
 * vagrantあり/なし
 */

function watch () {
	gulp.watch(pathSettings.dir + '**/*.{html,php}', reload)
	gulp.watch(pathSettings.css + '/**/*.css', reload)
	gulp.watch(pathSettings.js + '/**/*.js', reload)
	gulp.watch(pathSettings.img + '/**/*.{png,jpg,gif,svg,ico}', scssImg)
	gulp.watch(pathSettings.scss + '/**/*.scss', gulp.series(css, modernizrTask))
	gulp.watch([pathSettings.es2015 + '/**/*.{js,scss,vue}', '!**/modernizr.js'], gulp.series(webpackTask, modernizrTask))
}

// export tasks
// vagrant なし
exports.dev = gulp.series(
	sync,
	disconnect,
	watch
)
// vagrant あり
exports.default = gulp.series(
	syncWithVagrant,
	watch
)

/**
 * DEST
 * 各種ファイルの本番用出力設定
 */

// HTML/PHP出力
function htmlDest (done) {
	return gulp.src([pathSettings.dir + '/**/*.{html,php}'])
		.pipe(gulp.dest(destSettings.dir))
}

// IMAGE出力
function imgDest () {
	return gulp.src([pathSettings.img + '/**/*.{png,jpg,gif,svg,pdf,ico}'])
		.pipe(gulp.dest(destSettings.img))
}

// CSS出力（データー圧縮付き）
function cssDest () {
	return gulp.src([pathSettings.css + '/**/*.css', pathSettings.no])
		.pipe(cssmin())
		.pipe(gulp.dest(destSettings.css))
}

// JS出力（データー圧縮付き）
// webpack変換のJSは、webpackから「直接」destディレクトリへ出力
// 現状は、modernizrのみ圧縮出力対象
function jsDest () {
	return gulp.src(pathSettings.js + '/**/modernizr.js')
		.pipe(uglify())
		.pipe(gulp.dest(destSettings.js))
}

// その他出力
function etcDest () {
	return gulp.src([pathSettings.dir + '/**/*.{eot,svg,ttf,woff,woff2,otf,txt,json,pem}', pathSettings.dir + '/**/.htaccess'])
		.pipe(gulp.dest(destSettings.dir))
}

// export tasks
exports.htmlDest = htmlDest
exports.imgDest = imgDest
exports.cssDest = cssDest
exports.jsDest = jsDest
exports.etcDest = etcDest
exports.dest = gulp.parallel(htmlDest, imgDest, cssDest, etcDest, gulp.series(webpackTask, jsDest))
