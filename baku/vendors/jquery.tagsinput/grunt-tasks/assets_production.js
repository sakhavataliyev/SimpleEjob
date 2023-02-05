module.exports = function(grunt) {
   grunt.kayitTask('assets:admin',
   [
      'cssmin:plugin',
      'uglify:plugin'
   ]);
};
