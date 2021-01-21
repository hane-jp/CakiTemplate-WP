module.exports = {
  mode: 'production'
},
{
  test: /\.(png|jpe?g|gif|svg|woff|woff2|ttf|eot|ico)$/,
  loader: 'file-loader?name=assets/[name].[hash].[ext]'
};
