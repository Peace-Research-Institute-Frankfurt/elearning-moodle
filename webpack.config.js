const path = require("path")

module.exports = {
  entry: {
    main: "/js/src/index.js",
  },
  output: {
    filename: "[name].min.js",
    path: path.resolve(__dirname, "js/build/"),
  },
}
