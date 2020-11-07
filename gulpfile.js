

let projectFolder = 'dist',
	sourceFolder = '#src',
	fs = require('fs'),
	path = {
		build: {
			html: projectFolder + '/',
			css: projectFolder + '/css/',
			js: projectFolder + '/js/',
			img: projectFolder + '/img/',
			fonts: projectFolder + '/fonts/',
		},
		src: {
			html: [sourceFolder + '/*.html', "!" + sourceFolder + '/_*.html'],
			css: sourceFolder + '/scss/styles.scss',
			js: sourceFolder + '/js/scripts.js',
			img: sourceFolder + '/img/**/*.{jpg,png,svg,gif,ico,webp}',
			fonts: sourceFolder + '/fonts/*.ttf',
		},
		watch: {
			html: sourceFolder + '/**/*.html',
			css: sourceFolder + '/scss/**/*.scss',
			js: sourceFolder + '/js/**/*.js',
			img: sourceFolder + '/img/**/*.{jpg,png,svg,gif,ico,webp}',
		},
		clean: './' + projectFolder + '/'
	};

let { src, dest } = require('gulp'),
	gulp = require('gulp'),
	browserSync = require('browser-sync').create(),
	fileinclude = require('gulp-file-include'),
	del = require('del'),
	scss = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	groupMedia = require('gulp-group-css-media-queries'),
	cleanCss = require('gulp-clean-css'),
	rename = require('gulp-rename'),
	uglify = require('gulp-uglify-es').default,
	imagemin = require('gulp-imagemin'),
	webp = require('gulp-webp'),
	webphtml = require('gulp-webp-html'),
	webpcss = require('gulp-webp-css'),
	svgSprite = require('gulp-svg-sprite'),
	ttf2woff = require('gulp-ttf2woff'),
	ttf2woff2 = require('gulp-ttf2woff2');




function browsersync(params) {
	browserSync.init({
		server: {
			baseDir: './' + projectFolder + '/'
		},
		port: 3000,
		notify: false
	})
};

function html() {
	return src(path.src.html)
		.pipe(fileinclude())
		.pipe(webphtml())
		.pipe(dest(path.build.html))
		.pipe(browserSync.stream())
};

function css() {
	return src(path.src.css)
		.pipe(scss({
			outputStyle: "expanded"
		}))
		.pipe(groupMedia())
		.pipe(autoprefixer({
			overrideBrowsersList: ["last 5 versions"],
			cascade: true
		}))
		.pipe(webpcss())
		.pipe(dest(path.build.css))
		.pipe(cleanCss())
		.pipe(rename({
			extname: ".min.css"
		}))
		.pipe(dest(path.build.css))
		.pipe(browserSync.stream())
};

function js() {
	return src(path.src.js)
		.pipe(fileinclude())
		.pipe(dest(path.build.js))
		.pipe(uglify())
		.pipe(rename({
			extname: ".min.js"
		}))
		.pipe(dest(path.build.js))
		.pipe(browserSync.stream())
};

function images() {
	return src(path.src.img)
		.pipe(webp({
			quality: 70
		}))
		.pipe(dest(path.build.img))
		.pipe(src(path.src.img))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{ removeViewBox: false }],
			interlaced: true,
			optimizationLevel: 3 // max - 7
		}))
		.pipe(dest(path.build.img))
		.pipe(browserSync.stream())
};

function fonts() {
	src(path.src.fonts)
		.pipe(ttf2woff())
		.pipe(dest(path.build.fonts));
	return src(path.src.fonts)
		.pipe(ttf2woff2())
		.pipe(dest(path.build.fonts));
}

gulp.task('svgSprite', function () {
	return gulp.src([sourceFolder + '/iconsprite/*.svg'])
		.pipe(svgSprite({
			mode: {
				stack: {
					sprite: "../icons/icons.svg",
					// example: true
				}
			},
		}))
		.pipe(dest(path.build.img))
});

function fontsStyle(params) {

	let file_content = fs.readFileSync(sourceFolder + '/scss/fonts.scss');
	if (file_content == '') {
		fs.writeFile(sourceFolder + '/scss/fonts.scss', '', cb);
		return fs.readdir(path.build.fonts, function (err, items) {
			if (items) {
				let c_fontname;
				for (var i = 0; i < items.length; i++) {
					let fontname = items[i].split('.');
					fontname = fontname[0];
					if (c_fontname != fontname) {
						fs.appendFile(sourceFolder + '/scss/fonts.scss', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb);
					}
					c_fontname = fontname;
				}
			}
		})
	}
}

function cb() { }

function watchFiles(params) {
	gulp.watch([path.watch.html], html)
	gulp.watch([path.watch.css], css)
	gulp.watch([path.watch.js], js)
	gulp.watch([path.watch.img], images)
};

function clean(params) {
	return del(path.clean);
};

let build = gulp.series(clean, gulp.parallel(js, css, html, images, fonts), fontsStyle);
let watch = gulp.parallel(build, watchFiles, browsersync);


exports.fontsStyle = fontsStyle;
exports.fonts = fonts;
exports.images = images;
exports.js = js;
exports.css = css;
exports.build = build;
exports.html = html;
exports.watch = watch;
exports.default = watch;


