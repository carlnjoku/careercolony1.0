module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

cssmin: {
  target: {
    files: [{
      expand: true,
      cwd: 'assets/css/skins',
      src: ['*.css', '!*.min.css'],
      dest: 'assets/css/skins',
      ext: '.min.css'
    }]
  }
}
  });

  // Load the plugin that provides the "uglify" task.
  
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  // Default task(s).
  grunt.registerTask('default', ['cssmin']);

};


