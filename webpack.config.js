
module.exports = {
  mode: process.env.NODE_ENV, // NODE_ENVプロパティ？。このオブジェクトにproductionかdevelopmentか参照させる。
  // mode: 'development',
  // mode: 'production',
  // devtool: false,
  entry: {
    main: './src/js/main.js',
    // vendor: './src/js/sub.js',
  },
  output: {
    filename: 'bundle.js',
  },

  // ローダー
  module: {
    rules: [
      { // .eslint  .eslintrcに設定。prettierは.prettierrc.jsに設定
        enforce: 'pre',
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
        options: {
          fix: true,
        },
      },
      { // JSトランスパイル
        test: /\.js$/,
          // 除外設定にswiperは含めないようにする。
        exclude: /node_modules\/(?!(dom7|ssr-window|swiper)\/).*/,
        loader: 'babel-loader',
      },
    ],
  },
};
