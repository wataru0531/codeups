const {src, dest, watch, series, parallel, lastRun} = require('gulp'); // 分割代入。
// Sassコンパイル
const sass = require('gulp-dart-sass');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer'); // .browserslistrcファイルに対応ブラウザを設定必須。
const cssDeclarationSorter = require('css-declaration-sorter');
const mqpacker = require('css-mqpacker');
const sourcemaps = require('gulp-sourcemaps');
const groupCssMediaQueries = require('gulp-group-css-media-queries'); // メディアクエリを纏める
const mode = require('gulp-mode')(); // モード切替
// webpack
const webpack = require('webpack');
const webpackStream = require('webpack-stream'); // gulpでwebpackと使用する際に必要。
const webpackConfig = require('./webpack.config');
// 画像圧縮
const imagemin = require('gulp-imagemin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const imageminPngquant = require('imagemin-pngquant');
const imageminSvgo = require('imagemin-pngquant');
const gulpChanged = require('gulp-changed'); // 再圧縮を無くす。
//ローカルサーバー立ち上げ、ブラウザリロード
const browserSync = require('browser-sync');
// webp画像
const webp = require('gulp-webp');


// テーマ名...テーマによって改名する。
const themeName = "codeups";

// 参照先
const srcPath = {
  css: './src/sass/**/*.scss',
  js: './src/js/**/*.js',
  img: './src/img/**/*.{png,jpg,jpeg,gif,svg,ico}', // favicon.icoも通す。
};

// 出力先
const destPath = {
  css: `${themeName}/assets/css`,
  js: `${themeName}/assets/js`,
  img: `${themeName}/assets/img`,
};


// 開発・商用環境の設定。
// const env = process.env.NODE_ENV ? process.env.NODE_ENV.trim() : '';

if(process.env.NODE_ENV === 'development'){ //　開発
   // thisCssStyle = 'compressed'; // 圧縮
   thisCssStyle = 'expanded'; // 圧縮しない

   thisCssMap = true; // マップあり
   // thisCssMap = false; // マップなし
  
   thisBundleJs = true; // バンドルする
  //  thisBundleJs = false; // バンドルしない
}else if(process.env.NODE_ENV === 'production'){  // 商用
  thisCssStyle = 'compressed'; // 圧縮
  // thisCssStyle = 'expanded'; // 圧縮しない

  // thisCssMap = true; // マップあり
  thisCssMap = false; // マップなし

  thisBundleJs = true; // バンドルする
  // thisBundleJs = false; // バンドルしない
};

// JavaScriptバンドル+トランスパイル
// 設定： webpack.config.js、.browserslistrcファイル
const bundleJs = done => {
  if(thisBundleJs){ 
    webpackStream(webpackConfig, webpack)
    .on('error', function(e){
      console.log(e);
      this.emit('end');
    })
    .pipe(dest(destPath.js));

    done();
  }else{ // そのままjsフォルダにコピー
    src(srcPath.js)
    .pipe(dest(destPath.js));

    done();
  }
}


// Sassのコンパイル
const compileSass = done => {
  // postcss
  const postcssPlugins =  [
    mqpacker(), // メディアクエリをまとめる。
    autoprefixer({
      grid: "autoplace",
      cascade: true,
    }),
    cssDeclarationSorter({
      order: "alphabetical",
    }),
  ];

  src(srcPath.css, {
    sourcemaps: thisCssMap,
  })
  // .pipe(mode.development(sourcemaps.init())) // 開発時のみソースマップ
  .pipe(
    plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
  )
  .pipe(sass({outputStyle: thisCssStyle}))
  .pipe(postcss(postcssPlugins))
  // .pipe(mode.production(groupCssMediaQueries())) // 商用の場合のみメディアクエリを纏める。

  // .pipe(mode.development(sourcemaps.write('./sourcemaps')))
  .pipe(dest(destPath.css, {
    sourcemaps: './sourcemaps',
  }));
  
  done();
};

// 画像圧縮 srcに入れ圧縮してsrcに保存
const imgImagemin = done => {
  src(srcPath.img)
  .pipe(gulpChanged(destPath.img)) // 一度圧縮した画像を再度圧縮しない。無限に圧縮され続けてしまう。
  .pipe(
    imagemin([
      imageminMozjpeg({
        quality: 80,
      }),
      imageminPngquant(),
      imageminSvgo({
        plugins: [{
        // viewBox属性を削除する(widthとheight属性がある場合)、表示が崩れる原因になるので削除しない。
          removeViewbox: false,
        }],
      }),
    ],
    {
      // 処理したすべての画像のログをターミナルに出力。
      verbose: true,
    },
    )
  )
  .pipe(dest('./src/img'));

  done();
};

// 画像コピー
const copyImage = done => {
  src(srcPath.img)
  .pipe(dest(destPath.img));

  done();
};

// webp画像生成 画像出力先で出力する。
const generateWebp = done => {
  src(`${themeName}/assets/img/**/*` ,{since: lastRun(generateWebp)}) // watchの際に一度行った処理をスキップしてくれる。書いておかないと無限ループとなる。
  .pipe(webp())
  .pipe(dest(destPath.img));

  done();
};

// ローカルサーバー立ち上げ
// const buildServer = done => {
//   browserSync.init({
//     port: 8080, // localhost: 8080を開く。好きな数字でOK。デフォルトは3000
//     files: ["**/*"], // すべてのファイルを監視

//     // 静的サイト
//     server: {baseDir: './'}, // index.htmlの場所。baseDir...変数？ディレクトリまでのurlを格納
//     // 動的サイト...WordPressサイト構築などの場合
//     // proxy: "http://localsite.local", // ローカルサーバーのurlを設定
//     // files: ["../**/*.php"], // 全てのファイルを監視

//     open: true, // 自動でブラウザを開く
//     watchOptions: {
//       debounceDelay: 1000, // 1秒間タスクの連続実行を抑制。
//     },
//   });

//   done();
// };

// ブラウザリロード
const browserReload = done => {
  browserSync.reload();

  done();
};

// 変更を監視
const watchFiles = () => {
  watch(srcPath.css, series(compileSass, browserReload)); //  browserReloadをを後に付ける。
  watch(srcPath.js, series(bundleJs, browserReload));
  watch(srcPath.img, series(imgImagemin, copyImage, browserReload));
};


module.exports = {
  sass: compileSass,
  bundle: bundleJs,
  webp: generateWebp, // webp画像生成
  image: series(imgImagemin, copyImage),
  
  build: series(parallel(compileSass, bundleJs), imgImagemin, copyImage),
  default: parallel(watchFiles),
};



// npm run dev...build、gulpを実行。
// npm run build...build、--productionで実行。
// npm run webp...　webp画像生成

// ※一度生成された要素は削除されない。
// 画像圧縮は処理が重いので圧縮される前にコピーされるのか、コピーされたdestフォルダの画像は２回めの処理で圧縮される。

// 納品時
// ・cssのソースマップは削除する。
// ・必ずnpm run buildをして、Javascriptを圧縮して納品。
